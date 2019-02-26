<?php session_start();

?>
<div class="one">

<div class="infos">
<div class="yeta">
</div>
</div>
<div class="action">
<?PHP 
include 'db.inc.php';
$user = $_SESSION['username'];
$query = mysql_query("SELECT status from soosal_ads WHERE username= '$user'");
$fetch = mysql_fetch_assoc($query);
$status = $fetch['status'];

switch ($status)
{
case 0:
echo "<div class='uta'></div>";
break;
case 1:
echo "<div class='uta1'></div>";
break;
case 2:
echo "<div class='uta2'></div>";
break;
case 3:
echo "<div class='uta3'></div>";
break;
case 4:
echo "<div class='uta4'></div>";
break;

}

?>

</div>
</div>
<div class="one">

<div class="infos2">
<span class="yeta">
</span>
</div>
<div class="action">
<?PHP 
include 'db.inc.php';
$user = $_SESSION['username'];
$query = mysql_query("SELECT status from soosal_ads WHERE username= '$user'");
$fetch = mysql_fetch_assoc($query);
$status = $fetch['status'];
if ($status == 1 || $status == 4)
{
switch ($status)
{
case 1:
echo "<form action='' method='post'>
      <input type='submit' name='change' value='' class='ads'>
</form>";
$change = $_POST['change']; 
if (isset($change))
{
mysql_query("UPDATE soosal_ads SET status = '4' where username  = '$user'");
$query = mysql_query("select username from approved ads where username = '$user'");
$rows = mysql_num_rows($query);
if ($rows < 1){
mysql_query("DELETE FROM approved_ads WHERE username = '$user'");
echo "<div class='hint' ><div class='close' onclick='popup();'>X</div><p class='hints'>Message</p>
Your ads will stopped soon!
</div>";}
else
{
echo "<div class='hint' ><div class='close' onclick='popup();'>X</div><p class='hints'>Message</p>
Your ads are already stopped!
</div>";
}
}

break;

case 4:
echo "<form action='' method='post'>
      <input type='submit' name='changes' value='' class='ads2'>
</form>";
$changes = $_POST['changes']; 
if (isset($changes))
{
mysql_query("UPDATE soosal_ads SET status = '1' where username  = '$user'");
$insert = mysql_query("SELECT * FROM soosal_ads WHERE username = '$user'");
$infetch = mysql_fetch_array($insert);
$insertbanner = $infetch['banner'];
$inserturl = $infetch['url'];
$insertcredits = $infetch['ads_credit'];
$insertid= $infetch['ads_id'];
$date = date("Y-m-d");
$checkquery = mysql_query("SELECT ads_id from approved_ads WHERE username = '$user'");
$checkrows = mysql_num_rows($checkquery);
if ($checkrows < 1){
mysql_query("INSERT INTO approved_ads VALUES ('','$insertid','$insertbanner','$insertcredits','$user','$date','$inserturl')");}
echo "<div class='hint' ><div class='close' onclick='popup();'>X</div><p class='hints'>Message</p>
Your ads will be active soon!
</div>";
}
break;
default:
echo "<form action='' method='post'>
      <input type='submit' name='changess' value='' class='ads3'>
</form>";
$changess = $_POST['changess']; 
if (isset($changess))
{
mysql_query("UPDATE soosal_ads SET status = '0' where username  = '$user'");
echo "<div class='hint' ><div class='close' onclick='popup();'>X</div><p class='hints'>Message</p>
Your ads request has been sucessfull.we will take review of your website and as soon as it will approved your ads will run sucessfully!
</div>";
}
break;
	  
	  
}	
}
else
{
echo "<form action='' method='post'>
      <input type='submit' name='changess' value='' class='ads3'>
</form>";
$changess = $_POST['changess']; 
if (isset($changess))
{
mysql_query("UPDATE soosal_ads SET status = '0' where username  = '$user'");
echo "<div class='hint' ><div class='close' onclick='poup();'>X</div><p class='hints'>Message</p>
Your ads request has been sucessfull.we will take review of your website and as soon as it will approved your ads will run sucessfully!
</div>";
}

}  

?>

</div>
</div>