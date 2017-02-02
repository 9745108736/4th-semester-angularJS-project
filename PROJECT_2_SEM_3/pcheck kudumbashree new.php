<?php    
session_start();         /////////*********punchayath checking********//////////
/*
if($_SESSION['Pusername']=="")
{
echo "<script>alert('please login')</script>";
echo "<script>document.location.href='http://localhost/PROJECT%2021/punchayath%20COMPLETE/'</script>";
exit;	
}
*/
if(!isset($_SESSION['Pusername'])){
                    echo "<script>alert('Please login') </script>";
echo "<script>document.location.href='pindex.php'</script>";
					}
?>

<!DOCTYPE html>
<html>
<head>
	<title>punchayath-index</title>
 	<?php
	include 'includes/punchayath_header.php';
	include 'includes/db_connection.php';
	$kudk_id=$_GET['id'];
	?>
</head>
<body class="pad_top">
<div class="container">
<?php
$query = "select name from sign_up_kudumbashree where k_id = $kudk_id";
$result = mysqli_query($connection,$query);
while($user = mysqli_fetch_assoc($result)) 
{	
$kudu_name=$user['name'];
}
echo "<script>alert('  $kudu_name kudumbashree')</script>";
echo "<h2>kudumbashree Detils(<b>$kudu_name</b>)</h2>";
$query = "select * from sign_up_kudumbashree where k_id=$kudk_id";
$result = mysqli_query($connection,$query);
echo "<center>";
if($result)
{
	echo "<table class='table' border='1' cellspacing=10px>";
	echo "<caption>KUDUMBASHREE DETAIL'S</caption>";
	ECHO "<tr>";
	echo "<TH>"."K_ID"."</TH>";
	echo "<th>"."NAME"."</th>";
	echo "<th>"."AFFILIATION_NUMBER"."</th>";
	echo "<th>"."PLACE"."</th>";
	echo "<th>"."PRESIDENT NAME"."</th>";
	echo "<th>"."PHONE"."</th>";
	echo "<th>"."DATE"."</th>";
	//echo "<th>"."$kudk_id"."</th>";
	echo "</tr>";
while($user = mysqli_fetch_assoc($result)) 
{
	echo "<tr>";
	echo "<td>";
	echo $user['k_id'];
	echo "</td>";
	echo "<td>";
	echo $user['name'];
	echo "</td>";
	echo "<td>";
	echo $user['affiliation_number'];
	echo "</td>";
	echo "<td>";
	echo $user['place'];
	echo "</td>";
	echo "<td>";
	echo $user['presi_secre_name'];
	echo "</td>";
	echo "<td>";
	echo $user['phone'];
	echo "</td>";echo "<td>";
	echo $user['date'];
	echo "</td>";
}}
echo "</table>";
echo "</br>";









///////*********select sum from total DEPOSIT*****	
$smquery="select sum(amount) from member_deposit where k_id=$kudk_id";
$smresult=mysqli_query($connection,$smquery);
while($smrow=mysqli_fetch_array($smresult))
	{
		$pdeposit_kudumbashree=$smrow['sum(amount)'];
	//	echo "<br/>"."TOTAL RS";
	}

	///////*********select sum from total loan repay*****	
$smquery="select sum(amount) from loan_repay where k_id = $kudk_id";
$smresult=mysqli_query($connection,$smquery);
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_repay=$smrow['sum(amount)'];
	//	echo "<br/>"."TOTAL RS";
	}


///////*********select sum from total loan*****	
$smquery="select sum(amount) from member_loan where k_id=$kudk_id";
$smresult=mysqli_query($connection,$smquery);
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_loan=$smrow['sum(amount)'];
		//echo "<br/>"."the sum of loan=";
	}
	
echo "</br>";
$blnc=$smsum_loan-$smsum_repay;

ECHO "<table class='table' border=1 cellspacing=5 cellpadding=5><tr><th>TOTAL DEPOSIT</th><td>$pdeposit_kudumbashree</td></tr>
<tr><th>TOTAL LOAN RS</th><td>$smsum_loan</td>
</tr><tr><th>TOTAL RE-PAY:</th><td>$smsum_repay</td></tr>
<tr><TH>BALANCE</TH><td>$blnc</td></tr></table>";

echo "</br>";
//////////////////******************check all member from member_add////////////**/*/*/*/*/*/*//*/**/
$query = "select * from member_add where k_id=$kudk_id";
$result = mysqli_query($connection,$query);
if($result)
{
	echo "<table class='table' border='1'cellpadding=5px>";
	echo "<caption><h3 id='MEMBER DETAIL'>MEMBER DETAIL'S</h3></caption>";
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
	echo "<th>"."CHECK"."</th>";
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
	echo "<td>";
	echo "<a href='pcheck_member2.php?id=".$user['m_id']."'>check</a>";
	echo "</td>";

	echo "</tr>";
}
echo "</table>";
}


?>
</div>
</body>
</html>	