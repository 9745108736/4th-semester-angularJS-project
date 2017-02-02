<?php 
session_start();   
if(!isset($_SESSION['password'])){
                    echo "<script>alert('Please login') </script>";
	//echo "<script> document.location.href='http://localhost/PROJECT_2_SEM_3/mindex.php' </script>";
					}

      /////////*********member checking********//////////
include("includes/db_connection.php");
	//$kname=$_SESSION['kname'];
	//echo $kname;
?>









<!DOCTYPE html>
<html>
<head>
	<title>Check me detail</title>
 	<?php
	
include 'includes/m_header.php';
	//$kname=$_SESSION['kname'];
	$m_id=$_SESSION['checkm_id'];
	?>
</head>

<body class="pad_top" style="padding-top: 60px;">
	<div class="container">
		<h3>Member_detail's</h3>
		<?php
echo "<title>loan_repay detail</title>";
//echo $_SESSION['k_id'];
$query = "select * from member_add where m_id=$m_id";
$result = mysqli_query($connection,$query);
if($result)
{
echo "<center>";
echo "<table class='table' border='1'>";
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

echo "</br>";
	echo "<h3 id='MEMBER_DEPOSIT'>MEMBER_DEPOSIT</h3>";



	/////////////////**********member_deposit/////////********
$query = "select * from member_deposit where m_id=$m_id";
$result = mysqli_query($connection,$query);
if($result)
{
echo "<table class='table' border='1'>";
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
}
	echo "</tr>";
	echo "<tr>";
	echo "<tr></tr>";
	
		echo "<td colspan=1 cellpadding=3>";////////////////////////////include it to a table////////////

		///////*********select sum from total depsit OF EACH member*****	
	$smquery="select sum(amount) from member_deposit where m_id=$m_id";
$smresult=mysqli_query($connection,$smquery);
////print the result
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_deposit=$smrow['sum(amount)'];
		//echo $sum_deposit;///////************sum of each member_Deposit******
		echo "<br/>"." DEPOSIT_SUM:";
	}
	echo "</td>";
	
	echo "<td>";
	echo $smsum_deposit;
	echo "</td><td>is tottal</td>";
	echo "</tr>";

echo "</table>";
}
echo "</br>";
ECHO "</BR>";
ECHO "<h3 id='LOAN REPAY DETAILS'>LOAN REPAY DETAILS</h3>";




					///// LOAN REPAY/////////////////////*/*/*/*/*/*
$query = "select * from loan_repay where m_id=$m_id";
$result = mysqli_query($connection,$query);
	if(!$result)
	{
		echo "<script>alert(' no first connection')</script>";
	}
	else
	{
echo "<table  class='table' border='1'>";
	ECHO "<tr>";
	echo "<TH>"."L_ID"."</TH>";
	echo "<th>"."AMOUNT"."</th>";
	echo "<th>"."date"."</th>";
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

}
	echo "</tr>";
	echo "<tr>";
	echo "</tr>";
	echo "<td COLSPAN=1 cellpadding=3>";
		
		///////*********select sum from total depsit OF EACH member*****	
	$smquery="select sum(amount) from loan_repay where m_id=$m_id";
$smresult=mysqli_query($connection,$smquery);
////print the result
while($smrow=mysqli_fetch_array($smresult))
	{
		$sm_repay=$smrow['sum(amount)'];
		//echo $sum_deposit;///////************sum of each member_Deposit******
		echo "<br/>"."LOAN_REPAY_SUM:";
	}
	echo "</td>";
	echo "<td>";
	echo $sm_repay;
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	}
echo "</center>";
/*
		echo "total loan of you=".$smof_loan;/////total loan//
	echo "<br/>"."the sum of repay=".$sm_repay;
echo "<h1>balance to pay after loan</h1>.</br>";
echo $smof_loan-$sm_repay;

*/
//$loan_balance=$smof_loan-$sm_repay;
/////LASTE TABLES/////////	

?>

	</div>

<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>