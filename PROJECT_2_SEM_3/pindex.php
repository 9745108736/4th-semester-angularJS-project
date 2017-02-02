<!DOCTYPE html>
<html>
<head>
	<title>punchayath-index</title>
 	<?php
	
include 'includes/header.php';
	?>
</head>
<body>




<?php session_start(); 
//database connection
include("includes/db_connection.php");
if(isset($_POST['submit'])){
		

		$username = $_POST['username'];

		$password = $_POST['password'];
		
		
		$query = "select * from punchayath_login";
		$query .= " where username = '{$username}' ";
		$query .= "and password='{$password}' ";

		//execute query

		$result = mysqli_query($connection,$query);

		// get number of rows in result
		$count=mysqli_num_rows($result);   

		if($count !=0){

				$_SESSION['Pusername'] = $username;
//ECHO $_SESSION['Pusername'];
				

$id_query = "select id from punchayath_login where username = '{$username}' and password='{$password}'";
$id_result = mysqli_query($connection,$id_query);
while($id_user = mysqli_fetch_assoc($id_result))
	{
	 
$_SESSION['login_id']=$id_user['id'];	
	//echo $_SESSION['login_id'];
	}

// 		echo "
// 			<script>
// alert('going');
// 			</script>
// 		";
		

		echo "<script> 
		document.location.href='pan_index.php' 
		</script>";

		}else{

	echo "
			<script>
alert('not correct');
			</script>
		";
			echo "Invalid Username or password";
		}

	}

	


echo "<br/>";
//echo "<a href='http://localhost/PROJECT%2021/MAIN/main.php'>main page</a>";
	?>












<div class="row">
<div class="container pad_top">
<div class="col-md-12">
<h1>Login </h1>

<form method="post" action="" name="login" class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" placeholder="username" value="" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" placeholder="password" value="" required>
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
</div>
</div>





<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>