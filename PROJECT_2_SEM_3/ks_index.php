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
	<title> Kudumbashree-Home	</title>
 	<?php
	
include 'includes/secretory_header.php';
	?>
</head>

<div class="container">
<div class="pad_top">
 <?php include 'includes/main_content.php'; ?>

</div>
</div>


<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>