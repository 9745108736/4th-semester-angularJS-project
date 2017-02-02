<?php            /////////*********punchayath checking********//////////
session_start(); 
/*if($_SESSION['Pusername']=="")
{
echo "<script>document.location.href='http://localhost/PROJECT%2021/punchayath%20COMPLETE/'</script>";
echo "<script>alert('please login')</script>";
exit;	
}*/
if(!isset($_SESSION['Pusername'])){
                    echo "<script>alert('Please login') </script>";
echo "<script>document.location.href='pan_index.php'</script>";
					}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Punchayath -> check member</title>
	<?php
	
include 'includes/punchayath_header.php';
	?>
</head>
<body>
<div class="container">
<div class="pad_top">
<table class='table'>
<tr><td>
<a href="#member_loan">visit member_loan</a></td>
<td><a href="#loan_repay">visit loan repay</a></td>
<td><a href="#member_deposit">visit member deposit</a></td>
</tr></table>



<?php
$servername="localhost";
$username="root";
$password="";
$dbname="kudumbashree";
$connection = mysqli_connect($servername,$username,$password,$dbname);
/*
if(isset($_POST['submit']))
{*/
//$m_id = $_POST['m_id'];
$m_id = $_GET['id'];
$name1 = "select m_id from member_add where m_id=$m_id";
$result1 = mysqli_query($connection,$name1);
$count1 = mysqli_num_rows($result1);
if($count1==0)
	{
	echo "<Script>alert('m_id not valid')</script>";
	echo "<script>document.location.href='pan_index.php'</script>";
	}
$query = "select * from loan_repay where m_id=$m_id";
$result = mysqli_query($connection,$query);
	if(!$result)
	{
		echo "<script>alert(' no first connection')</script>";
	}
	else
	{
		/*
		echo "<font size=6px>";
		echo"<table border=2><tr><th>MEMBER _ID:</th><th>$m_id</th></tr></table>";
echo "</font>";
	*/
	
	
	
	
	
	
	///////////////////////************show details/*////////////////////////////////*/*/*/*/*/*/
	$query = "select * from member_add where m_id=$m_id";
$result = mysqli_query($connection,$query);
if($result)
{
echo "<table class='table'>";
echo "<caption><h3>Member Detail's</h3></caption>";

	ECHO "<tr>";
	echo "<TH>"."M_ID"."</TH>";
	echo "<th>"."K_ID"."</th>";
	echo "<th>"."NAME"."</th>";
	echo "<th>"."PARENT_NAME"."</th>";
	echo "<th>"."BLOOD_GROUP"."</th>";
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
echo "</br>";




	///////*********select sum from total loan repay OF EACH member*****	
$smquery="select sum(amount) from loan_repay where m_id=$m_id";
$smresult=mysqli_query($connection,$smquery);
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_repay=$smrow['sum(amount)'];
	//	echo "<br/>"."TOTAL RS";
	}


///////*********select sum from total loan OF EACH member*****	
$smquery="select sum(amount) from member_loan where m_id=$m_id";
$smresult=mysqli_query($connection,$smquery);
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_loan=$smrow['sum(amount)'];
		//echo "<br/>"."the sum of loan=";
	}
	
echo "</br>";
$blnc=$smsum_loan-$smsum_repay;

ECHO "<table class='table'><tr><th>TOTAL LOAN RS</th><td>$smsum_loan</td>
</tr><tr><th>TOTAL PAY:</th><td>$smsum_repay</td></tr>
<tr><TH>BALANCE</TH><td>$blnc</td></tr></table>";





echo "</br>";
			//////Loan repay details//////////////
	echo "<table class='table'>";
	echo "<caption><h3 id='loan_repay'>loan repay</h3></caption>";
	ECHO "<tr>";
	echo "<TH>"."Loan_ID"."</TH>";
	echo "<th>"."AMOUNT"."</th>";
	echo "<th>"."date"."</th>";
	echo "</tr>";
	echo "</br>";

$lquery="select * from loan_repay where m_id=$m_id";
$lresult=mysqli_query($connection,$lquery);
while($user=mysqli_fetch_assoc($lresult))
{
echo "<tr><td>";
	echo $user['l_id'];
	echo "</td>";
	echo "<td>";
	echo $user['amount'];
	echo "</td>";
	echo "<td>";
	echo $user['date'];
	echo "</td>";
	echo "</tr>";
	echo "<tr></tr>";
	echo "<tr></tr>";
	echo "<tr></tr>";

}
			////////// SUM OF RE-PAY///////////
echo "</tr>";
echo "<td>";
	///////*********select sum from total loan repay OF EACH member*****	
$smquery="select sum(amount) from loan_repay where m_id=$m_id";
$smresult=mysqli_query($connection,$smquery);
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_repay=$smrow['sum(amount)'];
		echo "<br/>"."TOTAL RS";
	}
	echo "</td>";
	echo "<td>";
	echo $smsum_repay;
	echo "</td><td>is tottal</td>";
	echo "</tr>";
	}

echo "</table>";	
	
echo "</br>";
	
/////////////////**********member_deposit/////////********
$query = "select * from member_deposit where m_id=$m_id";
$result = mysqli_query($connection,$query);
if($result)
{
echo "<table class='table'>";
echo "<caption><h3 id='member_deposit'>member_deposit</h3></caption>";
	ECHO "<tr>";
	echo "<TH>"."Deposit_ID"."</TH>";
	echo "<th>"."AMOUNT"."</th>";
	echo "<th>"."date"."</th>";
	echo "</tr>";
while($user = mysqli_fetch_assoc($result)) 
{
echo "<tr>";
	echo "<td>";
	echo $user['d_id'];
	echo "</td>";
	echo "<td>";
	echo $user['amount'];
	echo "</td>";
	echo "<td>";
	echo $user['date'];
	echo "</td>";
echo "</tr>";
	echo "<tr></tr>";
	echo "<tr></tr>";
	echo "<tr></tr>";

	}
/*echo "</tr>";
	echo "<tr>";
	echo "<td>";
	echo "</td>";
	echo "</tr>";*/
	
	echo "<td>";////////////////////////////include it to a table////////////
	///////*********select sum from total depsit OF EACH member*****	
$smquery="select sum(amount) from member_deposit where m_id=$m_id";
$smresult=mysqli_query($connection,$smquery);
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_deposit=$smrow['sum(amount)'];
		echo "<br/>"."TOTTAL RS";
	}
	echo "</td>";
	echo "<td>";
	echo $smsum_deposit;
	echo "</td><td>is tottal</td>";
	echo "</tr>";
echo "</table>";
}

echo "</br>";

	/////////////////////////***********member_loan////////////////***********************
$query = "select * from member_loan where m_id=$m_id";
$result = mysqli_query($connection,$query);
if($result)
{
echo "<table class='table'>";
echo "<caption><h3 id='member_loan'>member_loan</h3></caption>";
	ECHO "<tr>";
	echo "<TH>"."L_ID"."</TH>";
	echo "<th>"."AMOUNT"."</th>";
	echo "<th>"."date"."</th>";
	echo "</tr>";
while($user = mysqli_fetch_assoc($result)) 
{
echo "<tr>";
	echo "<td>";
	echo $user['l_id'];
	echo "</td>";
	echo "<td>";
	echo $user['amount'];
	echo "</td>";
	echo "<td>";
	echo $user['date'];
	echo "</td>";
	echo "</tr>";
	
}
	echo "<tr></tr>";
	echo "<tr></tr>";
	echo "<tr></tr>";

	/*echo "</tr>";
	echo "<tr>";
	echo "<td>";
	echo "</td>";
	echo "</tr>";*/
	echo "<td>";////////////////////////////include it to a table////////////
	///////*********select sum from total loan OF EACH member*****	
$smquery="select sum(amount) from member_loan where m_id=$m_id";
$smresult=mysqli_query($connection,$smquery);
while($smrow=mysqli_fetch_array($smresult))
	{
		$smsum_loan=$smrow['sum(amount)'];
		echo "<br/>"."TOTTAL RS";
	}
	echo "</td>";
	echo "<td>";
	echo $smsum_loan;
	echo "</td><td>is tottal</td>";
	echo "</tr>";
echo "</table>";
}


echo "</br>";
//echo "<table cellspacing=5 cellpadding=5 border=1px><tr><td>TOTAL LOAN:</td><td>$smsum_loan</td></tr></table>";


//		}//////first closing


	?>
</div>
</div>


<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
	</body>
</html>