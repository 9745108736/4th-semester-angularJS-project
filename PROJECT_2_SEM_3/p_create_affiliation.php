<?php         /////////////////give affiliation number by panchayath*************////////
session_start();
/*if($_SESSION['Pusername']=="")
{
echo "<script>alert('please login')</script>";
echo "<script>document.location.href='http://localhost/PROJECT%2021/punchayath%20COMPLETE/'</script>";
exit;	
}*/
if(!isset($_SESSION['Pusername'])){
                    echo "<script>alert('Please login') </script>";
echo "<script>document.location.href='pindex.php'</script>";
					}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Punchayath-create affiliation</title>
 	<?php
	
include 'includes/punchayath_header.php';
include("includes/db_connection.php");
	?>
</head>
<body class="pad_top">
	<div class="container">
	<h3>Create affiliation number</h3>
		<?php
if(isset($_POST['submit']))
{
$affi_number = $_POST['affi_number'];
$query = "insert into affiliation_number(affiliation_number,date)VALUES('$affi_number',now())";
$result = mysqli_query($connection,$query);
	if(!$result)
	{
		echo "<script>alert(' no first connection')</script>";
	}
	else
	{
		$id="select id from affiliation_number where affiliation_number='$affi_number'";
		$idresul = mysqli_query($connection,$id);
		while($iduser = mysqli_fetch_assoc($idresul))
		//while($iduser=mysqli_fetch_assoc($idresul)) 
		{
		echo "<script>alert('successfully inserted'+'the id is='+$iduser[id])</script>";
		
		}
	}
	
}

//echo $_SESSION['$affiliation_number'];
//echo $_SESSION['$password'];

?>


<form method ="POST" action="">
<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Enter affiliation number:</label>
	<div class="col-sm-10">
<input type="text" class="form-control" name="affi_number" placeholder="enter affiliation number" maxlength="10" required>
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label"></label>
	<div class="col-sm-10">
        <input type="submit" class=" form-control btn btn-primary btn-lg btn-block" name="submit" value="submit">

    </div>
</div>
</form>
	</div>

<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>