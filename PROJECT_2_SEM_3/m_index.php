<!DOCTYPE html>
<html>
<head>
	<title>member login index</title>
	<?php include 'includes/header.php'; ?>
</head>
<body class="pad_top">
	<div class="container">



<?php
session_start();
              //////////***********member login*************


include("includes/db_connection.php");
if(isset($_POST['submit']))
{
$usernm=$_POST['usrname']; ///////*******affiliation_number
	$passwrd=$_POST['pswrd'];
	$m_id=$_POST['mid'];
	
echo "<script>alert(echo $passwrd)</script>";

$logquery="select * from user_password where username='$usernm' and password='$passwrd' and m_id='$m_id'";
$logresult=mysqli_query($connection,$logquery);
$count=mysqli_num_rows($logresult);
if($count==1)
{
	
	
$sid_query="select u_p_id from user_password where username= '{$usernm}' and m_id = '{$m_id}' and designate = 'member'";
$sid_result = mysqli_query($connection,$sid_query);
while($sid_user = mysqli_fetch_assoc($sid_result))
	{
	 
$_SESSION['slogin_id']=$sid_user['u_p_id'];	/////////username_password id..........
	//echo $_SESSION['slogin_id'];
	}
	
	
	
	$_SESSION['password']=$passwrd;
	//$_SESSION['password']=$password;
	$_SESSION['checkm_id']=$m_id;///////to check me of member
	echo "<script>document.location.href='m_checkme.php'</script>";
}
else
{
echo "<script>alert('username or password not correct')</script>";
  echo "<script>document.location.href='m_forget_password.php'</script>";

}
}
?>




  
		<div class="row">
<div class="container pad_top">
<div class="col-md-12">
<h1>Login </h1>

<form method="post" action="" name="login" class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
            <input type="text" class="form-control" name="usrname" placeholder="enter username" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
            <input type="password" class="form-control" name="pswrd"  placeholder="password" required>
    </div>
   </div>

   <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Unique id</label>
    <div class="col-sm-10">
            <input type="number" class="form-control" name="mid"  placeholder="enter your k_id" required>
    </div>
   </div>

      <label for="inputPassword" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="submit">
    </div>
   </div>
</form>


</div>
</div>
</div>
	</div> <!-- end of the container -->
<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>