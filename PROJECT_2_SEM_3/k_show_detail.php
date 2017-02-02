<?php
session_start();
if(!isset($_SESSION['secretery_username'])){
                    echo "<script>alert('Please login') </script>";
echo "<script> document.location.href='kindex.php' </script>";

					}

echo "<title>show details</title>";
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
	<title>kudumbashree-show detail</title>
	<?php		
		include 'includes/secretory_header.php';
	?>
</head>
<body class="pad_top">
<div class="container">
<h3>All member's</h3>
<?php
$query = "select * from member_add where k_id=$_SESSION[k_id]";
$result = mysqli_query($connection,$query);
if($result)
{
	echo "<center>";
	echo "<table class='table' border='1'>";
	ECHO "<tr>";
	echo "<TH>"."M_ID"."</TH>";
//	echo "<th>"."K_ID"."</th>";
		echo "<th>"."NAME"."</th>";
	echo "<th>"."PARENT_NAME"."</th>";
	echo "<th>"."BLOOD_GROUP"."</th>";
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
	/*echo "<td>";
echo $user['k_id'];
echo "</td>";*/
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
echo "<a href='k_checkmember2.php?id=".$user['m_id']."'>check</a>";
echo "</td>";

	echo "</tr>";
}
echo "</table>";
}
//echo "<a href='http://localhost/PROJECT%2021/MAIN/main.php'>main page</a>";
?>
</div>
<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>