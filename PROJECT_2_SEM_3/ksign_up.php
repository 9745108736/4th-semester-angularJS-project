<!DOCTYPE html>
<html>
<head>
	<title>kudumbashreee sign_up</title>
	<?php include 'includes/header.php'; ?>
</head>
<body class="pad_top">



<?php
session_start();
if(isset($_POST['submit']))
			{
$servername="localhost";
$username="root";
$password="";
$dbname="kudumbashree";
$connection=mysqli_connect($servername,$username,$password,$dbname);

if(!$connection)
{
echo "<script>alert('first connection error')</script>";
}

$name = $_POST['name'];
//$id_number = $_POST['id_number'];
$affiliation_number = $_POST['affiliation_number'];
$place = $_POST['place'];
//$desig=$_POST['designation'];
$pors_name = $_POST['pors_name'];
//$designation = $_POST['designation'];
$designation="secre_presi";
$phone = $_POST['phone'];
$password1 = $_POST['password'];
$re_enter = $_POST['re_enter'];

if($re_enter!=$password1)
{
	echo "<script>alert('enter same password')</script>";//password checking
    echo "<script>document.location.href='ksign_up.php'</script>";

		exit;
	}
$nextpagepas=$password1;

//CHECKING THAT THE AFFILIATION NUMBER IS CORRECT from punchayath
$first = "select affiliation_number from affiliation_number where affiliation_number = '$affiliation_number'";
$result = mysqli_query($connection,$first);
$count = mysqli_num_rows($result);    
if($count != 1)
{
	echo "<script>alert('it is not a registered number')</script>";
  echo "<script>document.location.href='ksign_up.php'</script>";
	exit;
}


/*while($user = mysqli_fetch_assoc($result))
{
if($affiliation_number != $user['affiliation_number'])
	{
	echo "<script>alert('mysqli_fetch_assoc that no affilaition ')</script>";
	}
	
}
*/

//insert into database	
////////*********CHECKING THAT ALREADY USED

$name1 = "select affiliation_number from sign_up_kudumbashree where affiliation_number = '$affiliation_number'";
$result1 = mysqli_query($connection,$name1);
$count1 = mysqli_num_rows($result1);
if($count1!=0)
	{
	echo "<Script>alert('affiliiation aleready used last eror')</script>";
  echo "<script>document.location.href='ksign_up.php'</script>";
	exit;
	}

/*
//while($user = mysqli_fetch_assoc($result))
//{
	echo $count1;
if($count1 == 1)
{
	echo "<script> alert('used affiliation number which is last error') </script>";
	exit;
	///////////	existing check
}
else
{
echo "sign up of kudumbahree work";
}
*/

//insert into sign_up.............	
	$query = "insert into sign_up_kudumbashree(name,affiliation_number,place,presi_secre_name,phone,date)VALUES('$name','$affiliation_number','$place','$pors_name','$phone',now())";
//	$last='$id_number';
	//printf(mysql_insert_k_id());
	// printf( mysqli_insert_id($connection));
	
	$dbquery = mysqli_query($connection,$query);

	$lstid="select k_id from sign_up_kudumbashree where affiliation_number='$affiliation_number'";
	$lstquery = mysqli_query($connection,$lstid);
//$lstid;
	while($lstuser=mysqli_fetch_assoc($lstquery))
	{
		$_SESSION['lstid']=$lstuser['k_id'];//////////////////*************k_id number;
	}
	$lsid=$_SESSION['lstid'];//////***********k_id
	echo "</br>";
	echo "the id is=".$_SESSION['lstid'];				
echo "<script>alert('YOUR ID IS:' + $lsid +' IT WILL NEED YOU')</script>";	
echo "<script>alert('please note:' + $lsid +' IT WILL NEED YOU')</script>";	

$psquery = "insert into user_password(username,password,designate,k_id,date)values('$affiliation_number','$password1','$designation',$lsid,now())";
	$psresul = mysqli_query($connection,$psquery);
	$lastu_p_id=mysqli_insert_id($connection);	
	
//echo "</br>"."the password id".$lastu_p_id;
$_SESSION['password']=$nextpagepas;
echo $_SESSION['k_id']=$lsid;/////////////to index for passwor
$_SESSION['username']=$affiliation_number;


echo "<script>
alert('going to after sign_up');
</script>
<script>document.location.href='kindex.php'</script>
";


// echo "<script>
// // document.location.href='http://localhost/PROJECT%2021/secretory/after%20sign_up/'

// </script>";	

}
				?>







	<div class="container">
	<h3>Sign_up</h3>
		<form method="post" action="" name="login" class="form-horizontal">
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Kudumbashree Name:</label>
    <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="kudumbashree name" required>

    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Affiliation number</label>
    <div class="col-sm-10">
            <input type="number" class="form-control" style="height:30px;" name="affiliation_number" placeholder="enter the affiliation number that given by panchayath" required>

    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Place:</label>
    <div class="col-sm-10">
            <input type="text" class="form-control" style="height:30px;" name="place" placeholder="place" required>
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Head Name:</label>
    <div class="col-sm-10">
            <input type="text" class="form-control" style="height:30px;" name="pors_name" placeholder="enter your name" required>
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Phone:</label>
    <div class="col-sm-10">
  	<input type="number" class="form-control" style="height:30px;" maxlength='10' placeholder="phone number" name="phone" required>

    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
            <input type="password" class="form-control" style="height:30px;" name="password" placeholder="password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Re-enter Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" style="height:30px;" name="re_enter" placeholder="re-enter the password" required>     
    </div>
   </div>
   <div class="form-group">
    	<label for="inputPassword" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
      	<input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="submit">
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