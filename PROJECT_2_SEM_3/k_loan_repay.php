<?php
session_start();
if(!isset($_SESSION['secretery_username'])){
                    echo "<script>alert('Please login') </script>";
echo "<script> document.location.href='kindex.php' </script>";

					}

include("includes/db_connection.php");
/////////////*************PRINT KUDUMBASHREE NAME///////////******
$_SESSION['k_id'];
$nmquery="select name from sign_up_kudumbashree where k_id=$_SESSION[k_id]";
$nm_result=mysqli_query($connection,$nmquery);
while($kkname=mysqli_fetch_assoc($nm_result))
{
	$kname=$kkname['name'];//////////***********m_id
}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>kudumbashree-loan_repay</title>
 	<?php
	
include 'includes/header.php';
	?>
</head>
<body class="pad_top">
	<div class="container">

<form method="POST" action="">
<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Member_id:</label>
	<div class="col-sm-10">
<input type="text" class="form-control" name="m_id"  placeholder="member_id" required>
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Loan_amount:</label>
	<div class="col-sm-10">
<input type="text"  name="lamount" class='form-control'  placeholder="enter amount" required>
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
<input type="password" class="form-control" name="txtpassword" style="height:27px;"  placeholder="enter the password" required>
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

if(!$connection)
{
	echo "<script>alert('bbbbnot connected')</script>";
}

if(isset($_POST['submit']))
	{
$m_id=$_POST['m_id'];
//$_SESSION['m_id']=$m_id;
$lamount = $_POST['lamount'];
$k_id=$_SESSION['k_id'];//////////k_id
$m_name = $_POST['m_name'];
$spassword = $_POST['txtpassword'];//////secretory password from login/*************
$s_k_id=$_SESSION['k_id'];////k_id for password
$sespas=$_SESSION['password'];///password from login
//////////M_ID CHECKING FROM DATABASE***********
$idquery="select m_id from member_add where m_id=$m_id and k_id=$k_id";
$idresult=mysqli_query($connection,$idquery);
$idcount = mysqli_num_rows($idresult);
if($idcount==0)
{		
	echo "<script>alert('THE member id  DID NOT EXIST PLEASE enter a valid number')</script>";
	EXIT;
	}
///////////*************NAME CHECKING FROM DATABASE***********
$nmquery="select name from member_add where m_id=$m_id and name='$m_name'";
$nmresult=mysqli_query($connection,$nmquery);
$nmcount = mysqli_num_rows($nmresult);
if($nmcount==0)
{		
	echo "<script>alert('THE NAME DID NOT EXIST PLEASE CORRECT SPELLING ERROR')</script>";
	EXIT;
}
if($spassword != $sespas)
	{
		echo "<script>alert('enter secretory password')</script>";
	exit;
	}
	
	/*{
		echo "<br/>";
		echo "loan amount".$lamount;
		echo "<br/>";
		$a=0;
		$b=0;
		$a=$smcan_tack-$lamount;
	echo "balance to pay rs".$a;
//	echo "<script>alert('loan repay is successfully')</script>";

	}*/

	
	///////*********select sum from total member_loan OF EACH member*****	
	$smquery="select sum(amount) from member_loan where k_id=$k_id and m_id=$m_id";
$smresult=mysqli_query($connection,$smquery);
////print the result
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_deposit=$smrow['sum(amount)'];
		//echo $sum_deposit;///////************sum of each member_Deposit******
	$smcan_tack=$smsum_deposit;
	//echo "the sum of total loan".$smcan_tack;
	}
	/////for substraction//////************SUM OF AMOUNT FROM LOAN REPAY***********//////
	$lsmquery="select sum(amount) from loan_repay where k_id=$k_id and m_id=$m_id";
$lsmresult=mysqli_query($connection,$lsmquery);
////print the result
while($lsmrow=mysqli_fetch_array($lsmresult))
	{
		$lsmsum_deposit=$lsmrow['sum(amount)'];
	///////************sum of each member_Deposit******
	$lsmcan_tack=$lsmsum_deposit;
	}

	$difference=$smcan_tack-$lsmcan_tack;
	
	if($lamount>$difference)
	{
		echo "<script>alert('the amount is greater than')</script>";
		/*$lquery="insert into member_deposit(m_id,amount,k_id,m_name,date)values($m_id,'$lamount',$k_id,'$m_name',now())";

$lresult = mysqli_query($connection,$lquery);
if(!$lresult)
{
	echo "<script>alert('not connection')</script>";

}*/
	exit;
	}
	else
	{
$lquery="insert into loan_repay(m_id,amount,k_id,m_name,date)values($m_id,'$lamount',$k_id,'$m_name',now())";
//$lquery="insert into member_deposit(m_id,amount,k_id,m_name,date)values($m_id,'$lamount',$k_id,'$m_name',now())";

$lresult = mysqli_query($connection,$lquery);
if(!$lresult)
{
	echo "<script>alert('not connection')</script>";

}
else
{
		echo "<script>alert('amount inserted')</script>";

	///////*********select sum from total member_loan OF EACH member*****	
	$smquery="select sum(amount) from member_loan where k_id=$k_id and m_id=$m_id";
$smresult=mysqli_query($connection,$smquery);
////print the result
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_deposit=$smrow['sum(amount)'];
		//echo $sum_deposit;///////************sum of each member_Deposit******
	$smcan_tack=$smsum_deposit;
	echo "the sum of total loan:".$smcan_tack;
	}
	/////for substraction//////************SUM OF AMOUNT FROM LOAN REPAY***********//////
	$lsmquery="select sum(amount) from loan_repay where k_id=$k_id and m_id=$m_id";
$lsmresult=mysqli_query($connection,$lsmquery);
////print the result
while($lsmrow=mysqli_fetch_array($lsmresult))
	{
		$lsmsum_deposit=$lsmrow['sum(amount)'];
		//echo $sum_deposit;///////************sum of each member_Deposit******
	$lsmcan_tack=$lsmsum_deposit;
	echo "<br/>"."the sum of repay:".$lsmcan_tack;
	}

	$difference=$smcan_tack-$lsmcan_tack;
	echo "</br>"."the balance:".	$difference;
//$_SESSION['$diff']=$difference;//////////difference
echo "<script>alert('complete everything')</script>";
echo "<script>document.location.href='ks_index.php'</script>";

		
		}
		
		
		
	}
	
	/*
	if($difference>=0)
	{
$lquery="insert into loan_repay(m_id,amount,k_id,m_name)values($m_id,'$lamount',$k_id,'$m_name')";
$lresult = mysqli_query($connection,$lquery);
if(!$lresult)
{
	echo "<script>alert('not connection')</script>";
}

		
	}

else
{
	//echo "no nee of repay";
$dquery="insert into member_deposit(m_id,amount,k_id,m_name)values($m_id,'$lamount',$k_id,'$m_name')";
$dresult =  mysqli_query($connection,$dquery);
if(!$dresult)
{
	echo "<script>alert('not connection')</script>";
}
else
	{
		echo "<script>alert('NO NEED OF REPAY THE AMOUNT IS insert successfull TO YOUR DEPOSIT')</script>";

	}	
}
//$lamount = $_POST['lamount'];	
$_SESSION['$lamnt']=$lamount;////k_id for password
//echo $_SESSION['$lamnt'];
$_SESSION['$lamnt']=0;
	
	*/
	}////first closing
?>



<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>