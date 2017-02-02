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
	<title>kudumbshree-deposit detail</title>
 	<?php
	
include 'includes/secretory_header.php';
	?>
</head>
<body class="pad_top" style="padding-top: 60px;">
	<div class="container">
		<h3>Deposit_detail's</h3>
		<?php
echo "<title>loan_repay detail</title>";
//echo $_SESSION['k_id'];
$query = "select * from member_deposit where k_id=$_SESSION[k_id]";
$result = mysqli_query($connection,$query);
if($result)
{
echo "<center>";
echo "<table class='table' border='1'>";
	ECHO "<tr>";
	echo "<TH>"."D_ID"."</TH>";
	echo "<th>"."Member id"."</th>";
		echo "<th>"."AMOUNT"."</th>";
	echo "<th>"."K_ID"."</th>";
	echo "<th>"."m_name"."</th>";
	echo "<th>"."date"."</th>";
	echo "</tr>";
while($user = mysqli_fetch_assoc($result)) 
{

	echo "<tr>";
	
	echo "<td>";
	echo $user['d_id'];
	echo "</td>";
	echo "<td>";
echo $user['m_id'];
echo "</td>";
	echo "<td>";
echo $user['amount'];
echo "</td>";
	echo "<td>";
echo $user['k_id'];
echo "</td>";
echo "<td>";
echo $user['m_name'];
echo "</td>";
echo "<td>";
echo $user['date'];
echo "</td>";
	echo "</tr>";
}
echo "</table>";
}
?>

	</div>

<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>