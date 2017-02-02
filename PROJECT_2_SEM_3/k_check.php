<?php
session_start();
if(!isset($_SESSION['secretery_username'])){
                    echo "<script>alert('Please login') </script>";
echo "<script> document.location.href='kindex.php' </script>";

					}
?>
<!DOCTYPE html>
<html>
<head>
	<title>kudumbashree-check me</title>
 	<?php
	
include 'includes/secretory_header.php';
include 'includes/db_connection.php';
$k_id=$_SESSION['k_id'];//////////k_id
	?>
</head>
<body class="pad_top">
	<div class="container">
		<h3 style="padding-top:20px;">Current Detail's</h3>
<?php
$sdquery="select sum(amount) from member_Deposit where k_id=$k_id";   ////from member_deposit
$sdresult=mysqli_query($connection,$sdquery);
////print the result

while($drow=mysqli_fetch_array($sdresult))
	{
		$dsum_deposit=$drow['sum(amount)'];
		//echo $sum_deposit;///////************sum from member_Deposit******
	$dcan_tack=$dsum_deposit;//////////////////////////////*********************sum of deposit
//echo $dcan_tack;
	}


$slquery="select sum(amount) from member_loan where k_id=$k_id";
$slresult=mysqli_query($connection,$slquery);
while($slrow=mysqli_fetch_array($slresult))
	{
		$slsum_loan=$slrow['sum(amount)'];
		$lcan_tack=$slsum_loan;///////////////////////////******************sum of total loan*************
		//echo "sum of loan".$lcan_tack;
	}

	$lsmquery="select sum(amount) from loan_repay where k_id=$k_id";
$lsmresult=mysqli_query($connection,$lsmquery);
////print the result
while($lsmrow=mysqli_fetch_array($lsmresult))
	{
		$lsmsum_deposit=$lsmrow['sum(amount)'];
	///////************sum of each member_Deposit******
	$lsmcan_tack=$lsmsum_deposit;
	}


?>
<table class="table">
	<tr><th>Cattegory</th><th>Amount</th></tr>
	<tr><td>Total deposit</td><td><?php echo $dcan_tack;?></td></tr>
	<tr><td>Total loan</td><td><?php echo $lcan_tack;?></td></tr>
	<tr><td>Total repay amount</td><td><?php echo $lsmcan_tack; ?></td></tr>
</table>

	</div>

<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>