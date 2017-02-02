<!DOCTYPE html>
<html>
<head>
	<title>punchayath-affiliation number</title>
	<?php include 'includes/punchayath_header.php'; ?>
</head>
<body class="pad_top">
	<div class="container">
		<?php

include("includes/db_connection.php");

$query = "select * from affiliation_number";
$result = mysqli_query($connection,$query);
if($result)
{
	echo "<table class='table'>";
	ECHO "<tr>";
	echo "<TH>"."SL NO"."</TH>";
	echo "<th>"."affiliation_number"."</th>";
	
	echo "</tr>";
while($user = mysqli_fetch_assoc($result)) 
{
	
	echo "<tr>";
	
	echo "<td>";
	echo $user['id'];
	echo "</td>";
	echo "<td>";
echo $user['affiliation_number'];
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