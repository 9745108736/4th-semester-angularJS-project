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
$affiliation_number = $_POST['affiliation_number'];
$phone = $_POST['phone'];
$id=$_POST['id'];

$first = "select affiliation_number from sign_up_kudumbashree where phone = '$phone'";
$result = mysqli_query($connection,$first);
$count = mysqli_num_rows($result);    
if($count == 0)
{

	echo "<script>alert('ERROR : ! it is not a Registeredaffiliation_number')</script>";
 echo "<script>document.location.href='k_forget_password.php'</script>";
	exit;
}
else
{
	$affiliation_number =$affiliation_number;
}

$first = "select phone from sign_up_kudumbashree where affiliation_number= '$affiliation_number'";
$result = mysqli_query($connection,$first);
$count = mysqli_num_rows($result);    
if($count == 0)
{

	echo "<script>alert('ERROR : ! it is not a registered phone number')</script>";
  echo "<script>document.location.href='k_forget_password.php'</script>";
	exit;
}
else
{
	$phone =$phone;
}

$first = "select k_id from sign_up_kudumbashree where phone= '$phone'";
$result = mysqli_query($connection,$first);
$count = mysqli_num_rows($result);    
if($count ==0)
{

	echo "<script>alert('it is not registered kudumbashree id')</script>";
 	echo "<script>document.location.href='k_forget_password.php'</script>";
exit;
}
else
{
	$_SESSION['id']=$id;
	echo "<script>alert('Directing to password change page')</script>";
  	echo "<script>document.location.href='k_forget_password1.php'</script>";
	exit;
}


// $first = "select k_id from sign_up_kudumbashree where affiliation_number = '$affiliation_number'";
// $result = mysqli_query($connection,$first);
// $count = mysqli_num_rows($result);
// if($count == 0)
// {
// echo "<script>alert('Directing to password change page')</script>";
//   echo "<script>document.location.href='k_forget_password1.php'</script>";
// 	exit;
// }
// else
// {
// echo "<script>alert('it is not a registered id')</script>";
//   echo "<script>document.location.href='k_forget_password.php'</script>";
// 	exit;	
// }


			}
?>
<form method="post" action="" name="login" class="form-horizontal">
<div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Affiliation number</label>
    <div class="col-sm-10">
            <input type="number" class="form-control" style="height:30px;" name="affiliation_number" placeholder="enter the affiliation number that given by panchayath" required>

    </div>
  </div>

   <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Phone:</label>
    <div class="col-sm-10">
  	<input type="number" class="form-control" style="height:30px;" maxlength='10' placeholder="phone number" name="phone" required>

    </div>
  </div>

   <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Id:</label>
    <div class="col-sm-10">
  	<input type="number" class="form-control" style="height:30px;" maxlength='10' placeholder="Enter kudumbashree id" name="id" required>

    </div>
  </div>

   <div class="form-group">
    	<label for="inputPassword" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
      	<input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="submit">
    </div>
   </div>
   </form>