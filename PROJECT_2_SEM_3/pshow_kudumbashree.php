<?php
session_start(); 
/*if($_SESSION['Pusername']=="")
{
echo "<script>document.location.href='pindex.php'</script>";
echo "<script>alert('please login')</script>";
exit;	
}
*/
if(!isset($_SESSION['Pusername'])){
                    echo "<script>alert('Please login') </script>";
echo"<script>document.location.href='pindex.php'</script>";
					}

?>


<!DOCTYPE html>
<html>
<head>
	<title>punchayath-index</title>
	<?php	
include 'includes/punchayath_header.php';
	?>
</head>
<body class="pad_top">
<div class="container">
	<div class="row">
		<div class="col-md-12">
<h3>Show kudumbashree</h3>			
		<?php
//database connection
include("includes/db_connection.php");

$query = "select * from sign_up_kudumbashree";
$result = mysqli_query($connection,$query);
if($result)
{
echo "<table class='table'>";
	ECHO "<tr>";
	echo "<TH>"."K_ID"."</TH>";
		echo "<th>"."NAME"."</th>";
	echo "<th>"."AFFILIATION_NUMBER"."</th>";
	echo "<th>"."PLACE"."</th>";
	echo "<th>"."PRESIDENT NAME"."</th>";
	echo "<th>"."PHONE"."</th>";
	echo "<th>"."DATE"."</th>";
	echo "<th>"."CHECK"."</th>";
	
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

////EDIT
echo "<td>";
	echo "<a href='pcheck kudumbashree new.php?id=".$user['k_id']."'>check</a>";
	echo "</td>";

	
}
echo "</table>";
}
?>
		</div><!-- end of the col-md-10 -->
		
	</div>


</div>
<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>