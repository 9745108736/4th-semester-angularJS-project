<?php                   
session_start();   
/*                                       //////////*****deposit money/////////***
if($_SESSION['password']==0)
{
echo "<script> document.location.href='http://localhost/PROJECT%2021/secretory/index.php' </script>";
echo "<script>alert('please login')</script>";
exit;	
}*/
if(!isset($_SESSION['secretery_username'])){
                    echo "<script>alert('Please login') </script>";
echo "<script> document.location.href='kindex.php' </script>";
					}
?>
<!DOCTYPE html>
<html>
<head>
	<title> kudumbashree-deposit amount</title>
 	<?php
	
include 'includes/secretory_header.php';
	?>
</head>
<body class="pad_top" style="padding-top: 60px;">
	<div class="container">
	<h3>Deposit amount</h3>
		<?PHP
include("includes/db_connection.php");
if(!$connection)
{
	echo "<script>alert('bbbbnot connected')</script>";
}
?>



<?PHP
if(isset($_POST['submit']))
								{
$m_id = $_POST['m_id'];
$damount = $_POST['damount'];
$k_id=$_SESSION['k_id'];//////////k_id
$m_name = $_POST['m_name'];
$spassword = $_POST['txtpassword'];//////secretory password from login/*************
$s_k_id=$_SESSION['k_id'];////k_id for password
$sespas=$_SESSION['password'];///password from login

//////////M_ID CHECKING FROM DATABASE***********
$idquery="select m_id from member_add where m_id=$m_id and k_id=$k_id";
$idresult=mysqli_query($connection,$idquery);
$idcount = mysqli_num_rows($idresult);
if($idcount==0)
{		
	//	echo "<script>alert('NAME DID NOT EXIST')</script>";

	echo "<script>alert('THE member id  DID NOT EXIST PLEASE enter a valid number')</script>";
	echo "<script>document.location.href='k_deposit_amount.php'</script>";
	exit;
	}
					///////////*************NAME CHECKING FROM DATABASE***********
$nmquery="select name from member_add where m_id=$m_id and name='$m_name'";
$nmresult=mysqli_query($connection,$nmquery);
$nmcount = mysqli_num_rows($nmresult);
if($nmcount==0)
{		
	echo "<script>alert('THE NAME DID NOT EXIST PLEASE CORRECT SPELLING ERROR')</script>";
	echo "<script>document.location.href='k_deposi_amount.php'</script>";
	EXIT;
}

if($spassword != $sespas)
	{
	echo "<script>alert('enter secretory password')</script>";
	echo "<script>document.location.href='deposi_amount.php'</script>";
	exit;
	}
	
				/////////////INSERT MONEY////////////
$dquery="insert into member_deposit(m_id,amount,k_id,m_name,date)values($m_id,'$damount',$k_id,'$m_name',now())";
$dresult =  mysqli_query($connection,$dquery);
if(!$dresult)
{
	echo "<script>alert('not connection')</script>";
}
else
{
	echo "<script>alert('insert successfull')</script>";
	echo "<script>document.location.href='ks_index.php'</script>";	
}

								}////first closing
?>


<?php
				/////////////*************PRINT KUDUMBASHREE NAME///////////******
$_SESSION['k_id'];
$nmquery="select name from sign_up_kudumbashree where k_id=$_SESSION[k_id]";
$nm_result=mysqli_query($connection,$nmquery);
while($kkname=mysqli_fetch_assoc($nm_result))
{
	$kname=$kkname['name'];//////////***********m_id
}	
?>

<style>
a 
{
    text-decoration: none;
}
</style>

<center>
<body>
<form method="POST" action="">

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Member_id:</label>
	<div class="col-sm-10">
        <input type="text" class="form-control" name="m_id" placeholder="enter m id number" required>
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Deposit amount:</label>
	<div class="col-sm-10">
        <input type="number" class="form-control" name="damount" placeholder="deposit amount" required>
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Member name:</label>
	<div class="col-sm-10">
        <input type="text" class="form-control" name="m_name" placeholder="name of the member" required> 
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Password:</label>
	<div class="col-sm-10">
        <input type="password" class="form-control" name="txtpassword" placeholder="enter the password" required>
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label"></label>
	<div class="col-sm-10">
        <input type="submit" class=" form-control btn btn-primary btn-lg btn-block"  name="submit" value="PROCEED">
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