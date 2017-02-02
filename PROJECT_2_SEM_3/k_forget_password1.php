<h1>
change your password
</h1>

<?php
session_start();
//if(!isset($_SESSION['secretery_username'])){
  //                  echo "<script>alert('Please login') </script>";
//echo "<script> document.location.href='kindex.php' </script>";

					//}
?>
<?php
include("includes/db_connection.php");

if(isset($_POST['submit']))
			{
$password = $_POST['password'];
$password1 = $_POST['password1'];
if ($password!=$password1) {
			echo "<script>alert('Error Enter same password')</script>";
					  echo "<script>document.location.href='k_forget_password1.php'</script>";
exit;

}

$id = $_SESSION['id'];

$first = "update user_password set password = '$password' where k_id='$id' and  designate='secre_presi'";
//update user_password set password = 123 where k_id=87 and designate='secre_presi';
$result = mysqli_query($connection,$first);
if(! $result)
{
		echo "<script>alert('Error while changing')</script>";
		  echo "<script>document.location.href='k_forget_password.php'</script>";

		exit;
}
else
{
echo "<script>alert('Success change password')</script>";
  echo "<script>document.location.href='kindex.php'</script>";

		exit;	
}
		}
?>			

<form method="post" action="" name="login" class="form-horizontal">
<div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
            <input type="password" class="form-control" style="height:30px;" name="password" placeholder="enter the password" required>

    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Re-enter password</label>
    <div class="col-sm-10">
            <input type="password" class="form-control" style="height:30px;" name="password1" placeholder="enter the password" required>

    </div>
  </div>
  
    <div class="form-group">
    	<label for="inputPassword" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
      	<input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="submit">
    </div>
   </div>
  </form>
