<?php
session_start();
if(!isset($_SESSION['secretery_username'])){
                    echo "<script>alert('Please login') </script>";
echo "<script> document.location.href='kindex.php' </script>";

					}
?>
<?php
include("includes/db_connection.php");
/////////////*************PRINT KUDUMBASHREE NAME///////////******
$_SESSION['k_id'];
$nmquery="select name from sign_up_kudumbashree where k_id=$_SESSION[k_id]";
$nm_result=mysqli_query($connection,$nmquery);
while($kkname=mysqli_fetch_assoc($nm_result))
{
	$kname=$kkname['name'];//////////***********m_id
	
}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>kudumbashree-addmember</title>
 	<?php
	
include 'includes/secretory_header.php';
	?>
</head>
<body class="pad_top">
	<div class="container">
	

<?php
if(isset($_POST['submit']))
					{
$usrname=$_POST['usrnm'];
$member_name=$_POST['member_name'];
$parent_name=$_POST['parent_name'];
$birth_day=$_POST['birth_day'];
$birth_month=$_POST['birth_month'];
$birth_year=$_POST['birth_year'];
$phone=$_POST['phone'];
$blood_group=$_POST['blood_group'];
$card_type=$_POST['card_type'];
$caste=$_POST['caste'];
$password1=$_POST['mpswrd'];
$repassword=$_POST['re_mpswrd'];

if($password1 != $repassword)
{
	echo "<script>alert('enter same password');</script>";
	echo "<script>document.location.href='k_addmember.php'</script>";
	exit;
}	

$sesk_id=$_SESSION['k_id'];
//$sesid=$_SESSION['lstid'];//**************k_id
//echo $sesid;
////////////////////////////////*/*/*/*/  THE USERNAME ALREADY USED OR NOT///////////////////////*/*/*
$usrquery="select username from user_password where username='$usrname' and k_id=$sesk_id";
$usrresult=mysqli_query($connection,$usrquery);
$usrcount = mysqli_num_rows($usrresult);
if($usrcount!=0)
	{
	echo "<Script>alert('m_id not allowed')</script>";
	echo "<script>document.location.href='k_addmember.php'</script>";
	
	exit;
	}
	/*
else
{
$mbrrquery="select  member_add from user_password where username='$usrname' and k_id=$sesk_id";
$mbrresult=mysqli_query($connection,$mbrrquery);
$mbrcount = mysqli_num_rows($mbrresult);
if($mbrcount!=0)
	{
	echo "<Script>alert('m_id not allowed from member add')</script>";
	exit;
	}*/












///////////************insert into member_add table


$query ="insert into member_add(k_id,name,parent_name,dob_day,dob_month,dob_year,phone,blood_group,card_type,caste,date)
VALUES($sesk_id,'$member_name','$parent_name','$birth_day','$birth_month','$birth_year','$phone','$blood_group','$card_type','$caste',now())";
$result = mysqli_query($connection,$query);



////////////**************insert into user_password
$last_id=mysqli_insert_id($connection);
echo "<Script>alert('member id :'+$last_id)</script>";
echo "<Script>alert('note it :'+$last_id)</script>";

//echo "m_id".$last_id;
//echo "new record id is".$last_id;
//select m_id from member_add where m_id=11;
/*	$mid_query="select m_id from member_add where k_id=$sesid and parent_name='$parent_name'";
	$mid_result=mysqli_query($connection,$mid_query);
	
echo "$mid_result";	
	*/
	
/*	while($lstuser=mysqli_fetch_assoc($lstquery))
	{
		$_SESSION['lstid']=$lstuser['k_id'];//////////////////*************k_id number;
	}
	*/
/*while($mid_see=mysqli_fetch_assoc($mid_result))
{
	$mid=$mid_see['m_id'];//////////***********m_id
	echo $mid;
}
*/
		
$psquery = "insert into user_password(username,password,designate,k_id,m_id,date)values('$usrname','$password1','member',$sesk_id,$last_id,now())";	
$psresul = mysqli_query($connection,$psquery);
echo "<script>document.location.href='ks_index.php'</script>";	

			}//////////first if
?>





	<h3>Add_member</h3>
		<form method="POST" action=" " class="form-horizontal">
	
<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">User_name:</label>
	<div class="col-sm-10">
         <input type="text" class="form-control" color="blue" name="usrnm" placeholder="enter username" required>
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Member name:</label>
	<div class="col-sm-10">
         <input type="text" class="form-control" font-color="blue" name="member_name" placeholder="member name" required>
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Parent name:</label>
	<div class="col-sm-10">
         <input type="text" class="form-control" name="parent_name" placeholder="father/husbend" required>
    </div>
</div>

<div class="form-group">
   <label for="inputPassword" class="col-sm-2 control-label">Date fo birth:</label>
	<div class="col-sm-10">
         
<select name="birth_day">
<option value="null"> null </option>
<option value="1"> 1</option>
<option value="2"> 2</option>
<option value="3"> 3 </option>
<option value="4">  4</option>
<option value="5"> 5 </option>
<option value="6"> 6 </option>
<option value="7">  7</option>
<option value="8">  8</option>
<option value="9"> 9 </option>
<option value="10"> 10 </option>
<option value="11">  11</option>
<option value="12">  12</option>
<option value="13">  13</option>
<option value="14">  14</option>
<option value="15">  15</option>
<option value="16">  16</option>
<option value="17">  17</option>
<option value="18"> 18 </option>
<option value="19">  19</option>
<option value="20">  20</option>
<option value="21">  21</option>
<option value="22">  22</option>
<option value="23">  23</option>
<option value="24">  24</option>
<option value="25"> 25 </option>
<option value="26"> 26 </option>
<option value="27"> 27 </option>
<option value="28">  28</option>
<option value="29">  29</option>
<option value="30">  30</option>
<option value="31">  31</option>


</select>


<select name="birth_month">

<option> - Month - </option>

<option value="January">January</option>

<option value="Febuary">Febuary</option>

<option value="March">March</option>

<option value="April">April</option>

<option value="May">May</option>

<option value="June">June</option>

<option value="July">July</option>

<option value="August">August</option>

<option value="September">September</option>

<option value="October">October</option>

<option value="November">November</option>

<option value="December">December</option>

</select>


<select name="birth_year">
<option value="2004">2004</option>

<option value="2003">2003</option>

<option value="2002">2002</option>

<option value="2001">2001</option>

<option value="2000">2000</option>

<option value="1999">1999</option>

<option value="1998">1998</option>

<option value="1997">1997</option>

<option value="1996">1996</option>

<option value="1995">1995</option>


<option value="1994">1994</option>

<option value="1993">1993</option>

<option value="1992">1992</option>

<option value="1991">1991</option>

<option value="1990">1990</option>

<option value="1989">1989</option>

<option value="1988">1988</option>

<option value="1987">1987</option>

<option value="1986">1986</option>

<option value="1985">1985</option>

<option value="1984">1984</option>
<option value="1983">1983</option>

<option value="1982">1982</option>

<option value="1981">1981</option>

<option value="1980">1980</option>

<option value="1979">1979</option>

<option value="1978">1978</option>

<option value="1977">1977</option>

<option value="1976">1976</option>

<option value="1975">1975</option>

<option value="1974">1974</option>

<option value="1973">1973</option>

<option value="1972">1972</option>

<option value="1971">1971</option>

<option value="1970">1970</option>

<option value="1969">1969</option>

<option value="1968">1968</option>

<option value="1967">1967</option>

<option value="1966">1966</option>

<option value="1965">1965</option>

<option value="1964">1964</option>

<option value="1963">1963</option>

<option value="1962">1962</option>

<option value="1961">1961</option>

<option value="1960">1960</option>

<option value="1959">1959</option>

<option value="1958">1958</option>

<option value="1957">1957</option>

<option value="1956">1956</option>

<option value="1955">1955</option>

<option value="1954">1954</option>

<option value="1953">1953</option>

<option value="1952">1952</option>

<option value="1951">1951</option>

<option value="1950">1950</option>

<option value="1949">1949</option>

<option value="1948">1948</option>

<option value="1947">1947</option>

<option value="1946">1946</option>

<option value="1945">1945</option>

<option value="1944">1944</option>

<option value="1943">1943</option>

<option value="1942">1942</option>

</select>
    </div>
</div>

   <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Phone :</label>
    <div class="col-sm-10">
            <input type="number" class="form-control"name="phone" maxlength="13" required>
    </div>
   </div>

<div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Blood Group:</label>
    <div class="col-sm-10">
            <select name="blood_group" class ="form-control">
				<option>A+</option>
				<option>A+ </option>
				<option>O </option>
				<option> O+</option>
				<option> B+</option>
				<option> B-</option>
				<option> AB+</option>
				<option>AB-</option>
			</select>
    </div>
   </div>

	<div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Card Type:</label>
    <div class="col-sm-10">
            <select name="card_type" class="form-control">
<option>APL</option>
<option>BPL</option>
			</select>
    </div>
   </div>


<div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Cast/Reliegien:</label>
    <div class="col-sm-10">
            <select name="caste" class="form-control">
<option>hindu</option>
<option>muslim</option>
<option>christian</option>
<option>sikhim</option>
<option>buddhism</option>
<option>jainism</option>
<option>zoroastrianism</option>
<option>judaism</option>
		</select> 
    </div>
   </div>


  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-10">
            <input type="password" class="form-control" name="mpswrd" placeholder="password" required>
    </div>
   </div>

<div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Re-type password:</label>
    <div class="col-sm-10">
            <input type="password" class="form-control" name="re_mpswrd" placeholder="password" required>
    </div>
   </div>

<div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
            <input type="submit" class="form-control" style="height:30px;width:160px;" name="submit"value="submit">
    </div>
   </div>


<!--<?php
echo $_SESSION['$affiliation_number'];
echo $_SESSION['$password'];

?>-->
</form>






	</div>

<?php
include 'includes/footer.php';
include 'includes/script.php';
?>
</body>
</html>