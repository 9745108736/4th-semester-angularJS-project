<?php    
session_start();         /////////*********punchayath checking********//////////
/*
if($_SESSION['Pusername']=="")
{
echo "<script>alert('please login')</script>";
echo "<script>document.location.href='http://localhost/PROJECT%2021/punchayath%20COMPLETE/'</script>";

exit;	
*/
if(!isset($_SESSION['Pusername'])){
                    echo "<script>alert('Please login') </script>";
echo "<script>document.location.href='pindex.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Punchayath-Home	</title>
 	<?php
	
include 'includes/punchayath_header.php';
	?>
</head>

<div class="container">
<div class="pad_top">
 <?php include 'includes/main_content.php'; ?>
</div>
<div>
	
</div>
</div>


<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>