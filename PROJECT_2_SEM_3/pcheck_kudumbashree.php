			
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
	<title>punchayath-index</title>
 	<?php
	
include 'includes/punchayath_header.php';
	?>
</head>
<body class="pad_top">
<div class="container">
<h3>Check kudumbashree</h3>
<form method="post" action="" name="login" class="form-horizontal">	
	<div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Enter kudumbashre id</label>
    <div class="col-sm-10">
      <input type="number" name="k_id" class="form-control" placeholder="enter a kudumbashree_id" required>
    </div>
   </div>   
   <div class="form-group">
    	<label for="inputPassword" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
      	<input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="check">
      	
    </div>
   </div>
</form>




<?php


include("includes/db_connection.php");

if(isset($_POST['submit']))
{
echo "	
<center>
			<table><tr><td>
<a href='#MEMBER DETAIL'>visit member_details</a></td>
</table>
</center>	
";	
$k_id=$_POST['k_id'];
						/////// checking kudumbashree id
						try
						{
$name1 = "select k_id from  sign_up_kudumbashree where k_id=$k_id";
$result1 = mysqli_query($connection,$name1);
$count1 = mysqli_num_rows($result1);
						}
						catch(Exception $e)
						{
							echo "<script>alert('invalid entry')</script>";
						}
if($count1==0)
	{
	echo "<Script>alert('k_id not valid')</script>";
	echo "<script>document.location.href='pcheck_kudumbashree.php'</script>";
	}


///////////////////////////////////////////*/****************show the kudumbashree detail***********/*/*
//$kudk_id=$_GET['id'];
$query = "select * from sign_up_kudumbashree where k_id=$k_id";
$result = mysqli_query($connection,$query);
echo "<center>";
if($result)
{
	echo "<table class='table table-bordered'>";
	echo "<caption>KUDUMBASHREE DETAIL'S</caption>";
	ECHO "<tr>";
	echo "<TH>"."K_ID"."</TH>";
	echo "<th>"."NAME"."</th>";
	echo "<th>"."AFFILIATION_NUMBER"."</th>";
	echo "<th>"."PLACE"."</th>";
	echo "<th>"."PRESIDENT NAME"."</th>";
	echo "<th>"."PHONE"."</th>";
	echo "<th>"."DATE"."</th>";
	//echo "<th>"."$kudk_id"."</th>";
	echo "</tr>";
while($user = mysqli_fetch_assoc($result)) 
{
	echo "<tr>";
	echo "<td>";
	echo $user['k_id'];
	echo "</td>";
	echo "<td>";
	echo $user['name'];
	echo "</td>";
	echo "<td>";
	echo $user['affiliation_number'];
	echo "</td>";
	echo "<td>";
	echo $user['place'];
	echo "</td>";
	echo "<td>";
	echo $user['presi_secre_name'];
	echo "</td>";
	echo "<td>";
	echo $user['phone'];
	echo "</td>";echo "<td>";
	echo $user['date'];
	echo "</td>";
}
echo "</table>";
echo "</br>";









///////*********select sum from total DEPOSIT*****	
$smquery="select sum(amount) from member_deposit where k_id=$k_id";
$smresult=mysqli_query($connection,$smquery);
while($smrow=mysqli_fetch_array($smresult))
	{
		$pdeposit_kudumbashree=$smrow['sum(amount)'];
	//	echo "<br/>"."TOTAL RS";
	}

	///////*********select sum from total loan repay*****	
$smquery="select sum(amount) from loan_repay where k_id=$k_id";
$smresult=mysqli_query($connection,$smquery);
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_repay=$smrow['sum(amount)'];
	//	echo "<br/>"."TOTAL RS";
	}


///////*********select sum from total loan*****	
$smquery="select sum(amount) from member_loan where k_id=$k_id";
$smresult=mysqli_query($connection,$smquery);
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_loan=$smrow['sum(amount)'];
		//echo "<br/>"."the sum of loan=";
	}
	
echo "</br>";
$blnc=$smsum_loan-$smsum_repay;

ECHO "<table class='table table-condensed'><tr><th>TOTAL DEPOSIT</th><td>$pdeposit_kudumbashree</td></tr>
<tr><th>TOTAL LOAN RS</th><td>$smsum_loan</td>
</tr><tr><th>TOTAL RE-PAY:</th><td>$smsum_repay</td></tr>
<tr><TH>BALANCE</TH><td>$blnc</td></tr></table>";

echo "</br>";
//////////////////******************check all member from member_add////////////**/*/*/*/*/*/*//*/**/
$query = "select * from member_add where k_id=$k_id";
$result = mysqli_query($connection,$query);
if($result)
{
	echo "<table class='table'>";
	echo "<caption>MEMBER DETAIL'S</caption>";
	ECHO "<tr>";
	echo "<TH>"."M_ID"."</TH>";
	echo "<th>"."K_ID"."</th>";
	echo "<th>"."NAME"."</th>";
	echo "<th>"."PARENT_NAME"."</th>";
	echo "<th>"."PHONE"."</th>";
	echo "<th>"."BLOOD_GROUP"."</th>";
	echo "<th>"."CARD_TYPE"."</th>";
	echo "<th>"."CASTE"."</th>";
	echo "<th>"."DATE"."</th>";
	echo "</tr>";
while($user = mysqli_fetch_assoc($result)) 
{
	echo "<tr>";
	echo "<td>";
	echo $user['m_id'];
	echo "</td>";
	echo "<td>";
	echo $user['k_id'];
	echo "</td>";
	echo "<td>";
	echo $user['name'];
	echo "</td>";
	echo "<td>";
	echo $user['parent_name'];
	echo "</td>";
	echo "<td>";
	echo $user['phone'];
	echo "</td>";
	echo "<td>";
	echo $user['blood_group'];
	echo "</td>";
	echo "<td>";
	echo $user['card_type'];
	echo "</td>";
	echo "<td>";
	echo $user['caste'];
	echo "</td>";
	echo "<td>";
	echo $user['date'];
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
}


}
echo "</center>";	
/*
echo "<br/>";
	///////*********select sum from total member_loan OF EACH member*****	
$smquery="select sum(amount) from member_loan where k_id=$k_id";
$smresult=mysqli_query($connection,$smquery);
														////print the result
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_deposit=$smrow['sum(amount)'];
		//echo $sum_deposit;///////************sum of each member_Deposit******
		$smcan_tack=$smsum_deposit;
		//echo "the sum of total loan".$smcan_tack;
	}



///////*********select sum from total depsit OF EACH member*****	

$smquery="select sum(amount) from member_deposit where k_id=$k_id";
$smresult=mysqli_query($connection,$smquery);
////print the result
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_deposit=$smrow['sum(amount)'];
		//echo $sum_deposit;///////************sum of each member_Deposit******
	//	echo "<br/>"."the sum of total deposit=".$smsum_deposit;
	}
	*/
	}
?>







</div>

<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>