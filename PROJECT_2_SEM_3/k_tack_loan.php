<?php
session_start();
if(!isset($_SESSION['secretery_username'])){
                    echo "<script>alert('Please login') </script>";
echo "<script> document.location.href='kindex.php' </script>";
					}
include("includes/db_connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>kudumbashree-tack_loan</title>
 	<?php
	
include 'includes/secretory_header.php';
	?>
</head>
<body class="pad_top">
	<div class="container">
	<h3>Tack_loan</h3>
		<form method="POST" action="">

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Member_id:</label>
	<div class="col-sm-10">
<input type="text" class='form-control' name="m_id" style="height:27px;" placeholder="enter m id number" required>
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Loan_amount:</label>
	<div class="col-sm-10">
<input type="text"  class='form-control' name="lamount" style="height:27px;" placeholder="loan amount" required>
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Member_name:</label>
	<div class="col-sm-10">
<input type="text" class='form-control' name="m_name" style="height:27px;" placeholder="name of the member" required>
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Password:</label>
	<div class="col-sm-10">
<input type="password" class='form-control' name="txtpassword" style="height:27px;" placeholder="enter the password" required>
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label"></label>
	<div class="col-sm-10">
<input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="PROCEED">
    </div>
</div>
</form>
	</div>

<?php 
$k_id=$_SESSION['k_id'];//////////k_id

?>
<?php
if(!$connection)
{
	echo "<script>alert('bbbbnot connected')</script>";
}
if(isset($_POST['submit']))
								{
$m_id = $_POST['m_id'];
$lamount = $_POST['lamount'];
$k_id=$_SESSION['k_id'];//////////k_id
$m_name = $_POST['m_name'];
$spassword = $_POST['txtpassword'];//////secretory password from login/*************

$s_k_id=$_SESSION['k_id'];////k_id for password

$sespas=$_SESSION['password'];///password from login
//echo $sespas;

/////////////////*************CHECKING THAT THE LOAN CAN TACK******************/*/*/*/*/

$sdquery="select sum(amount) from member_Deposit where k_id=$k_id";   ////from member_deposit
$sdresult=mysqli_query($connection,$sdquery);
////print the result

while($drow=mysqli_fetch_array($sdresult))
	{
		$dsum_deposit=$drow['sum(amount)'];
		//echo $sum_deposit;///////************sum from member_Deposit******
	$dcan_tack=$dsum_deposit;//////////////////////////////*********************sum of deposit
	}

	
///////////////////////////////****************sum from member_loan*******************/*/*/
$slquery="select sum(amount) from member_loan where k_id=$k_id";
$slresult=mysqli_query($connection,$slquery);
while($slrow=mysqli_fetch_array($slresult))
	{
		$slsum_loan=$slrow['sum(amount)'];
		$lcan_tack=$slsum_loan;///////////////////////////******************sum of total loan*************
		//echo $lcan_tack;
	}
	
$total_balance_amount=	$dcan_tack-$lcan_tack;
echo "YOU CAN TACK ONLY RS:".$total_balance_amount;

if($lamount>$total_balance_amount)
{
	echo "<script>alert('this amount can not tacken'+' RS='+$total_balance_amount+' '+'can tack')</script>";
	exit;
}


//////////M_ID CHECKING FROM DATABASE***********
$idquery="select m_id from member_add where m_id=$m_id and k_id=$k_id";
$idresult=mysqli_query($connection,$idquery);
$idcount = mysqli_num_rows($idresult);
if($idcount==0)
{		
	//	echo "<script>alert('NAME DID NOT EXIST')</script>";

	echo "<script>alert('THE member id  DID NOT EXIST PLEASE enter a valid number')</script>";
	EXIT;
}
///////////*************NAME CHECKING FROM DATABASE***********

$nmquery="select name from member_add where m_id=$m_id and name='$m_name'";
$nmresult=mysqli_query($connection,$nmquery);
$nmcount = mysqli_num_rows($nmresult);
if($nmcount==0)
{		
	//	echo "<script>alert('NAME DID NOT EXIST')</script>";

	echo "<script>alert('THE NAME DID NOT EXIST PLEASE CORRECT SPELLING ERROR')</script>";
	EXIT;
}


///////////////////////////////////password checking*************
if($spassword != $sespas)
	{
		echo "<script>alert('enter secretory password')</script>";
	exit;
	}

///////*********select sum from total member_Deposit*****
$squery="select sum(amount) from member_Deposit where k_id=$k_id";
$sresult=mysqli_query($connection,$squery);
////print the result

while($row=mysqli_fetch_array($sresult))
	{
		$sum_deposit=$row['sum(amount)'];
		//echo $sum_deposit;///////************sum from member_Deposit******
	$can_tack=$sum_deposit;
	}
	///////*********select sum from total DEPOSIT OF EACH member*****
$smquery="select sum(amount) from member_Deposit where k_id=$k_id and m_id=$m_id";
$smresult=mysqli_query($connection,$smquery);
////print the result

while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_deposit=$smrow['sum(amount)'];
		//echo $sum_deposit;///////************sum of each member_Deposit******
	$smcan_tack=$smsum_deposit*2;
	}


//////////check the amount can tack

//echo $can_tack;
	if($lamount>$can_tack)
	{
//echo "<script>alert('YOU CAN NOT TACK THIS AMOUNT')</script>";
		
				echo "<script>alert('RS:'+$lamount+'   is NOT AVAILABLE and available balance  RS:'+$can_tack)</script>";
 exit;
	}
	else if($lamount>$smcan_tack)
	{
//echo "<script>alert('YOU CAN NOT TACK THIS AMOUNT')</script>";
		
				echo "<script>alert('RS:'+$lamount+'   is NOT AVAILABLE for this member and available loan amount  RS:'+$smcan_tack)</script>";
 exit;
	}
	else
	{
		
		echo "<script>alert('the amount is available')</script>";
	}
	




	
	//echo $spassword;
$s_k_id=$_SESSION['k_id'];////k_id for password

$sespas=$_SESSION['password'];///password from login
//echo $sespas;

if($spassword != $sespas)
	{
		echo "<script>alert('enter secretory password')</script>";
	exit;
	}

//echo  "the k_id".$s_k_id;
	//password checking from table punchayath_password
	//$lstuid=$_SESSION['lstid']///u_p_id****************
	
	//$lstuid=$_SESSION['sesuid'];	////////u_p_id from login (it is tacken from user_password)
//echo "the u_p_id".$lstuid;
		


$lquery="insert into member_loan(m_id,amount,k_id,m_name,date)values($m_id,'$lamount',$k_id,'$m_name',now())";
$lresult =  mysqli_query($connection,$lquery);
if(!$lresult)
{
	echo "<script>alert('not connection')</script>";
}
else
	{
		echo "<script>alert('loan is tack successfully')</script>";
		echo "<script>document.location.href='ks_index.php'</script>";

	}

						}////first closing
						
						
//////////////////////////////////////////////alert box message program						
$sdquery="select sum(amount) from member_Deposit where k_id=$k_id";   ////from member_deposit
$sdresult=mysqli_query($connection,$sdquery);
////print the result

while($drow=mysqli_fetch_array($sdresult))
	{
		$dsum_deposit=$drow['sum(amount)'];
		//echo $sum_deposit;///////************sum from member_Deposit******
	$dcan_tack=$dsum_deposit;//////////////////////////////*********************sum of deposit
	}						
						
						
						
						
						
						///////////////////////////////****************sum from member_loan*******************/*/*/
$slquery="select sum(amount) from member_loan where k_id=$k_id";
$slresult=mysqli_query($connection,$slquery);
while($slrow=mysqli_fetch_array($slresult))
	{
		$slsum_loan=$slrow['sum(amount)'];
		$lcan_tack=$slsum_loan;///////////////////////////******************sum of total loan*************
		//echo $lcan_tack;
	}
	
$total_balance_amount=	$dcan_tack-$lcan_tack;
echo "<script>alert('can tack'+' '+':'+$total_balance_amount)</script>";
echo "YOU CAN TACK ONLY RS:".$total_balance_amount;

						?>

<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>