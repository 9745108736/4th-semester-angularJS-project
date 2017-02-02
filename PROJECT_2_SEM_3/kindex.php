<!DOCTYPE html>
<html>
<head>
	<title>kudmbashree login index</title>
	<?php include 'includes/header.php'; ?>
</head>
<body class="pad_top">
	<div class="container">



<?php
session_start();
              //////////***********kudumbashree login*************


include("includes/db_connection.php");
if(isset($_POST['submit']))
{
$usernm=$_POST['usrname']; ///////*******affiliation_number
$passwrd=$_POST['pswrd'];
$k_id=$_POST['kid'];


//$designate=$_POST['designation'];

/*echo $usernm;
echo $designate;
echo $designate;
*/

$logquery="select * from user_password where username='$usernm' and password='$passwrd' and k_id=$k_id";
$logresult=mysqli_query($connection,$logquery);
$logcount=mysqli_num_rows($logresult);

//echo $logcount;
if($logcount!=0)
{
//  $id_query = "select id from punchayath_login where username = '{$username}' and password='{$password}'";
$sid_query="select u_p_id from user_password where username= '{$usernm}' and k_id = '{$k_id}' and designate = 'secre_presi'";
$sid_result = mysqli_query($connection,$sid_query);
while($sid_user = mysqli_fetch_assoc($sid_result))
  {
   
$_SESSION['slogin_id']=$sid_user['u_p_id']; /////////username_password id..........
  //echo $_SESSION['slogin_id'];
  }
//////////collecting u_p_id from user_password
  $_SESSION['password']=$passwrd;     //password to depoist
  //echo $_SESSION['password']; 
  $_SESSION['k_id']=$k_id;      ///////to member add
  echo "<script>document.location.href='ks_index.php'</script>";
  //echo $_SESSION['k_id'];
  $_SESSION['secretery_username']=$usernm;///// to depoist password checking*****affiliation_number
$_SESSION['username']=$usernm;
  //echo $_SESSION['username'];
}
else
{
  echo "<script>alert('username password not')</script>";
  echo "<script>document.location.href='k_forget_password.php'</script>";

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
            <input type="text" class="form-control" name="usrname" placeholder="enter affiliation_number" required>
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
            <input type="number" class="form-control" name="kid"  placeholder="enter your k_id" required>
    </div>
   </div>

   <div class="form-group">
    <!-- 	<label for="inputPassword" class="col-sm-2 control-label"></label> -->
        <div class="col-md-2 col-sm-2 col-xs-2"></div>
        <div class="col-md-8 col-sm-8 col-xs-5">
      	<input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Sign_in">
    </div>
    <div class="col-md-2 col-sm-2 col-xs-5">
        <!-- <input type="submit" class="btn btn-primary btn-lg btn-block" href="ksign_up.php" name="submit" value="Sign_up"> -->
       <!--  <a href="ksign_up.php">
        <button class="btn btn-primary btn-lg btn-block" >
          <!-- <a href="ksign_up.php"></a> -->
        <!-- </button></a> --> 
        <INPUT type="button" value="Sign_up" class="btn btn-primary btn-lg btn-block" onClick="window.open('ksign_up.php','windowname')">
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