 <?php
session_start();
if(!isset($_SESSION['secretery_username'])){
                    echo "<script>alert('Please login') </script>";
echo "<script> document.location.href='kindex.php' </script>";

					}

?>


<?php
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
	<title>kudumbashree-checkmember</title>
	<?php		
		include 'includes/secretory_header.php';
	?>

</head>
<body>
	<div class="container">
	<div class="row pad_top">
<h3>Check member</h3>
<form method="post" action="" name="login" class="form-horizontal">	
	<div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Member_id:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="m_id" placeholder="enter a member_id" required>
    </div>
   </div>   
   <div class="form-group">
    	<label for="inputPassword" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
      	<input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="check">
      	
    </div>
   </div>
</form>


<?php         
		/////////*********SECRETORY checking********//////////
if(isset($_POST['submit']))
{
$m_id = $_POST['m_id'];
$name1 = "select m_id from member_add where m_id=$m_id and k_id=$_SESSION[k_id]";
$result1 = mysqli_query($connection,$name1);
$count1 = mysqli_num_rows($result1);
if($count1==0)
	{
	echo "<Script>alert('m_id not valid')</script>";
	echo "<script>document.location.href='k_checkmember.php'</script>";
	}	
echo "<center>";
echo "
<table class='table'><tr><td>
<a href='#Loan_Repay'>visit Loan Repay</a></td>
<td><a href='#member_deposit'>visit member_deposit</a></td>
<td><a href='#Member_Loan'>visit Member_Loan</a></td>
</tr></table>";
		///////////////////////************show details/*////////////////////////////////*/*/*/*/*/*/
		//$k_id=$_SESSION['k_id'];
$query = "select * from member_add where m_id=$m_id and k_id=$_SESSION[k_id]";
$result = mysqli_query($connection,$query);
if($result)
{
echo "<table class='table' border='1'>";
echo "<caption>Member Details</caption>";
ECHO "<tr>";
	
	echo "<TH>"."M_ID"."</TH>";
	echo "<th>"."K_ID"."</th>";
	echo "<th>"."NAME"."</th>";
	echo "<th>"."PARENT_NAME"."</th>";
	echo "<th>"."PHONE"."</th>";
	echo "<th>"."BLOOD_GROUP"."</th>";
	echo "<th>"."CARD_TYPE"."</th>";
	echo "<th>"."CASTE"."</th>";
	echo "<th>"."DATE"."</th>";
	
echo "</tr>";

while($user = mysqli_fetch_assoc($result)) 
{
	echo "<tr>";
	
echo "<td>";
echo $user['m_id'];
	echo "</td>";
	echo "<td>";
echo $user['k_id'];
	echo "</td>";
	echo "<td>";
echo $user['name'];
	echo "</td>";
	echo "<td>";
echo $user['parent_name'];
echo "</td>";
echo "<td>";
echo $user['phone'];
echo "</td>";
echo "<td>";
echo $user['blood_group'];
echo "</td>";
echo "<td>";
echo $user['card_type'];
echo "</td>";
echo "<td>";
echo $user['caste'];
echo "</td>";
echo "<td>";
echo $user['date'];
echo "</td>";
	echo "</tr>";
}
echo "</table>";
}





$smquery="select sum(amount) from loan_repay where m_id=$m_id and k_id=$_SESSION[k_id]";
$smresult=mysqli_query($connection,$smquery);
////print the result
while($smrow=mysqli_fetch_array($smresult))
	{
		$sum_repay=$smrow['sum(amount)'];/////////sum of each member REPAY******
	//	echo " Total Repay Rs: ";
		//echo "</td>";
	}

				///////*********select sum from total loan EACH member*****	
$smquery="select sum(amount) from member_loan where m_id=$m_id and k_id=$_SESSION[k_id] ";
$smresult=mysqli_query($connection,$smquery);
////print the result
while($smrow=mysqli_fetch_array($smresult))
	{
		$sum_loan=$smrow['sum(amount)'];///////************sum of each member LOANt******
		//echo "<br/>"."the sum of loan=";
	}



$msum_balance=$sum_loan-$sum_repay;
echo "</br>";
ECHO "<table class='table' border=1 cellpadding=5>
<tr><th>TOTAL LOAN:</th><td>$sum_loan</td></tr>
<tr><th>TOTAL RE-PAY:</th><td>$sum_repay</td></tr>
<tr><th>BALANCE:</th><td>$msum_balance</td></tr>

</table>";

				///////////////sum of repay loan//////////////////
				
$query = "select * from loan_repay where m_id=$m_id and k_id=$_SESSION[k_id]";
$result = mysqli_query($connection,$query);
	if(!$result)
	{
		echo "<script>alert(' no first connection')</script>";
	}
	else
	{
		echo "</br>"."<div>";
echo "<table class='table' border='1'>";
echo "<caption><h3 id='Loan_Repay'>Loan Repay</h3></caption>";
	ECHO "<tr>";
	echo "<TH>"."Loan_Id"."</TH>";
	echo "<th>"."Amount"."</th>";
	echo "<th>"."Date"."</th>";
	echo "</tr>";

while($user=mysqli_fetch_assoc($result))
{
echo "<tr>";
	
	echo "<td>";
	echo $user['l_id'];
	echo "</td>";
	echo "<td>";
	echo $user['amount'];
	echo "</td>";
	
echo "<td>";
echo $user['date'];
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "</tr>";
echo "<tr>";
echo "</tr>";
}
	echo "<tr>";
	echo "<td>";
	////////////////////////////include it to a table////////////
	///////*********select sum from total loan OF EACH member*****	
	$smquery="select sum(amount) from loan_repay where m_id=$m_id and k_id=$_SESSION[k_id]";
$smresult=mysqli_query($connection,$smquery);
////print the result
while($smrow=mysqli_fetch_array($smresult))
	{
		$sum_repay=$smrow['sum(amount)'];/////////sum of each member REPAY******
		echo " Total Repay Rs: ";
		echo "</td>";
	}
	echo "<td>";
	echo $sum_repay;
	echo "</td><td>is tottal</td>";
	echo "</tr>";

echo "</table>";
echo "</div>";
}

echo "</br>";
echo "</br>";

/////////////////**********member_deposit/////////********
$query = "select * from member_deposit where m_id=$m_id and k_id=$_SESSION[k_id]";
$result = mysqli_query($connection,$query);
if($result)
{
echo "<table class='table' border='1'>";
echo "<caption><h3 id='member_deposit'>member_deposit</h3></caption>";
ECHO "<tr>";
	
	echo "<TH>"."D_ID"."</TH>";
	echo "<th>"."AMOUNT"."</th>";
	echo "<th>"."date"."</th>";
	
echo "</tr>";
while($user = mysqli_fetch_assoc($result)) 
{
echo "<tr>";
	
	echo "<td>";
	echo $user['d_id'];
	echo "</td>";
	echo "<td>";
echo $user['amount'];
echo "</td>";
echo "<td>";
echo $user['date'];
echo "</td>";

echo "</tr>";
}

echo "<tr>";
	echo "</tr>";
	echo "<td>";
	
					//////////////////include it to a table////////////
					///////*********select sum from total depsit OF EACH member*****	
	$smquery="select sum(amount) from member_deposit where m_id=$m_id and k_id=$_SESSION[k_id]";
$smresult=mysqli_query($connection,$smquery);
////print the result
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_deposit=$smrow['sum(amount)'];
		//echo $sum_deposit;///////************sum of each member_Deposit******
		echo "<br/>"."the sum of deposit=";
	}
	echo "</td>";
	echo "<td>";
	echo $smsum_deposit;
	echo "</td><td>is tottal</td>";
	echo "</tr>";
echo "</table>";
}
echo "</br>";
echo "</br>";

	/////////////////////////***********member_loan////////////////***********************
	$query = "select * from member_loan where m_id=$m_id and k_id=$_SESSION[k_id]";
$result = mysqli_query($connection,$query);
if($result)
{
echo "<table class='table' border='1'>";
echo "<caption><h3 id='Member_Loan'>Member_Loan</h3></caption>";
ECHO "<tr>";
	echo "<TH>"."L_ID"."</TH>";
	echo "<th>"."AMOUNT"."</th>";
	echo "<th>"."date"."</th>";
	echo "</tr>";
while($user = mysqli_fetch_assoc($result)) 
{
	echo "<tr>";
	echo "<td>";
	echo $user['l_id'];
	echo "</td>";
	
echo "<td>";
echo $user['amount'];
echo "</td>";

	echo "<td>";
	echo $user['date'];
	echo "</td>";
echo "</tr>";
}
	echo "</tr>";
echo"<tr></tr>";
	echo "<td>";
					////////////////////////////include it to a table////////////
					///////*********select sum from total loan EACH member*****	
$smquery="select sum(amount) from member_loan where m_id=$m_id and k_id=$_SESSION[k_id] ";
$smresult=mysqli_query($connection,$smquery);
////print the result
while($smrow=mysqli_fetch_array($smresult))
	{
		$sum_loan=$smrow['sum(amount)'];///////************sum of each member LOANt******
		echo "<br/>"."the sum of loan=";
	}
	echo "</td>";
	echo "<td>";
	echo $sum_loan;
	echo "</td><td>is tottal</td>";
	echo "</tr>";
echo "</table>";
}
			//////////// find balance to pay//////////////	
/*echo "<font size=12>balance to pay after loan</br>";
echo "<table border=1>";
echo "<th>";
echo $sum_loan-$sum_repay;
echo "</th>";
echo "</table>"."</font>";
*/

echo "</center>";
}			////////**********first close (if isset(submiy))**************

?>
</div>
</div>
<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>