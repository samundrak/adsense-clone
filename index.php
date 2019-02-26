<?php session_start(); include 'db.inc.php'; $user = $_SESSION['username']; include 'userdetail.php';
if (!$user){header ("Location: /soosal/login.php?return_url=/soosal/ads");
error_reporting(0);
}
?>
<html>
<head>
<style>
.nav ul {list-style:none;margin:0;padding:0;}
.nav li {float:left;width:100px;
background-color:black;
text-align:center;
border-right:1px solid white;
position:relative;
height:30px;
line-height:30px;
color:green;
cursor:pointer;
font-weight:bold;
}
.nav li ul li {float:none;
width:150px; 
text-align:left;
padding-left:5px;
border-top:1px solid white;
}
.nav a {text-decoration:none;}
.nav li ul{position:absolute; top:30px; left:0px;
visibility:hidden;
}.nav li:hover ul{position:absolute; top:30px; left:0px;
visibility:visible;
}
.nav li:hover
{
background-color:maroon;
}
</style>
<link href="ads.css" rel="stylesheet" type="text/css"/>
<link href="style.css" rel="stylesheet" type="text/css"/>
<script src="jquery.js" type="text/javascript"></script>
<script>
function poup()
{


$(document).ready(function(){
 
  $("#jquery").hide(1000);
 
 });}
 
 function showme()
 {
$(document).ready(function(){
 
  $("#header").fadeToggle(1000);
 
 });
 }
</script>
</head>
<body>

<div id='header'>Soosal.Com Free Domain for you</div>
<div id='menu'>

<div class="nav">
<ul>
<li><a href="/soosal/ads">AdsZone</a>

</li>
<li>Clicks
<ul>
<li><a href="home.php?p=my-ads">My ads clicks</a></li>
<li><a href="home.php?p=page-clicks">My page clicks</a></li>
</ul></li>
<li>Impression
<ul>
<li><a href="home.php?p=ads-impression">My ads Impression</a></li>
<li><a href="home.php?p=page-impression">My page Impression</a></li>
</ul>
</li>
<li><a href="home.php?p=visits">Visits</a>
</li>
<li>Credits
<ul>
<li><a href="home.php?p=credits-spent">Spent credits</a></li>
<li><a href="home.php?p=credits-earn">Earn credits</a></li>
</ul></li>
<li><a href="/soosal/index.php?=home">Home</a></li>
<li><a href="/soosal/ads/home.php?p=setup">Settings</a></li>
<li><a href="/soosal/logout.php">Exit</a></li>
</ul>
</div>
</div>

<div id="all">
<div class="details"><img src="images/pik.png" width="50px" height="50xp"/><div class="username">
<?php 
//$image_query = mysql_query("SELECT image FROM members WHERE username = '$user'");
//$image_fetch = mysql_fetch_array($image_query);
//$photo = $image_fetch[''];
echo "$user
<hr class='whr'/><i><q>$pdomain</q></i></div>";?>
<?php $today = date("Y-m-d"); echo "<div class='date'>$today</div>"; ?>
</div>
<div class="board">
<div class="myweb">
My website Data<sup class="what" ><acronym title="All details about <?php echo "$user";?>'s Website like <?php echo "$user";?>'s website pageviews,ads click and unique visits.">(?)</acronym></sup>
</div>
<div class="credit">
My credits<sup class="what"><acronym title="All details about <?php echo "$user";?>'s credits spented and earned.">(?)</acronym></sup>
</div>
<div class="myads">
My Ads<sup class="what"><acronym title="All details about <?php echo "$user";?>'s ads.">(?)</acronym></sup>
</div>
</div>
<div class="pageviews">
<?php
$datess = date("Y-m-d");
$date = new DateTime("$datess");
$date->modify("-1 day");
$echo = $date->format("Y-m-d");
$yquery = mysql_query("SELECT sum(pageviews) FROM adv WHERE username = '$user' AND date = '$datess'");
$aquery = mysql_query("SELECT sum(pageviews) FROM adv WHERE username = '$user' AND date = '$echo'");
$afetch = mysql_fetch_array($aquery);
$yfetch = mysql_fetch_array($yquery);
$showp = $yfetch[0];
$showa = $afetch[0];

if ($showp ===  NULL)
{
echo "<p class='points'>0</p>";
}
else
{
 echo "<p class='points'>$showp</p>"; 
 }?><p class='text'>Visits</p>
<p class="past">Yesterday: <b><?php echo "$showa"; ?></b></p>
<p class="past2">Total:    <b><?php echo "$show_pageviews"; ?></b></p>
</div>



<div class="clicks">
<?php
// about my website clicks data//
$bquery = mysql_query("SELECT sum(clicks) FROM only_clicks WHERE clicked_from = '$user' AND date = '$datess'");
$bbquery = mysql_query("SELECT sum(clicks) FROM only_clicks WHERE clicked_from = '$user' AND date = '$echo'");
$bfetch = mysql_fetch_array($bquery);
$bbfetch = mysql_fetch_array($bbquery);
$showb = $bbfetch[0];
$showbb = $bfetch[0];

if ($showbb === NULL)
{
 echo "<p class='points'>0</p>"; 
 }
 else
 {
 echo "<p class='points'>$showbb </p>"; 
 }?>
<p class='text'>Clicks </p>
<p class="past">Yesterday: <b><?php echo "$showb"; ?></b></p>
<p class="past2">Total:    <b><?php echo "$show_my_clicks"; ?></b></p>
</div>




<div class="impression">
<?php 
//about ads impression
$cquery = mysql_query("SELECT sum(impression) FROM adv WHERE username = '$user' AND date = '$datess'");
$ccquery = mysql_query("SELECT sum(impression) FROM adv WHERE username = '$user' AND date = '$echo'");
$cfetch = mysql_fetch_array($cquery);
$ccfetch = mysql_fetch_array($ccquery);
$showc = $ccfetch[0];
$showcc = $cfetch[0];

if ($showcc === NULL)
{
echo "<p class='points'>0</p>";
}
else
{
echo "<p class='points'>$showcc</p>";
}
?> 
<p class='text'>Pageviews</p>
<p class="past">Yesterday: <b><?php echo "$showc"; ?></b></p>
<p class="past2">Total:   <b><?php echo "$show_my_impression"; ?></b></p>
</div>
<div class="credits">

<?php 
$credits_query = mysql_query("SELECT sum(credit_spent) FROM credits_ WHERE  whose_ads = '$user'");
$credit_query = mysql_query("SELECT sum(credit_earn) FROM credits_ WHERE username = '$user'");
$credits_fetch = mysql_fetch_array($credits_query);
$credit_fetch = mysql_fetch_array($credit_query);
$spent_credit = $credits_fetch[0];
$earn_credit = $credit_fetch[0];

if ($show_ads_credit === NULL ){echo "<p class='points'>50</p><p class='text'> Credits</p>";}else{
echo "<p class='points'>$show_ads_credit</p><p class='text'> Credits</p>";} ?>

<p class="past6">Earn:  <b><?php if ($earn_credit === NULL){echo "0";} else{echo "$earn_credit";}?></b></p>
<p class="past5">Spent:  <b><?php if ( $spent_credit === NULL){ echo "0";} else{echo "$spent_credit"; }?></b></p>
</div>
<div class="creditsused">
<?php
$dquery = mysql_query("SELECT sum(clicks) FROM only_clicks WHERE username = '$user' AND date = '$datess'");
$ddquery = mysql_query("SELECT sum(clicks) FROM only_clicks WHERE username = '$user' AND date = '$echo'");
$dfetch = mysql_fetch_array($dquery);
$ddfetch = mysql_fetch_array($ddquery);
$showd = $dfetch[0];
$showdd = $ddfetch[0];
if ($showd === NULL)
{echo "<p class='points'>0</p>";}
else
{echo "<p class='points'>$showd</p>";}
  ?>
<p class='text'>My ads clicks</p>
<p class="past3">Yesterday: <b><?php echo "$showdd"; ?></b></p>
<p class="past4">Total:     <b><?php echo "$show_clicks"; ?></b></p>
</div>
<div class="myimpression">
<?php
$equery = mysql_query("SELECT sum(impression) FROM adv WHERE clicked_of = '$user' AND date = '$datess'");
$eequery = mysql_query("SELECT sum(impression) FROM adv WHERE clicked_of = '$user' AND date = '$echo'");
$efetch = mysql_fetch_array($equery);
$eefetch = mysql_fetch_array($eequery);
$showe = $efetch[0];
$showee = $eefetch[0];
if ($showe === NULL)
{echo "<p class='points'>0</p>";}
else
{
echo "<p class='points'>$showe</p>";
}
 ?>
<p class='text'>My ads impression</p>
<p class="past3">Yesterday: <b><?php echo "$showee"; ?></b></p>
<p class="past4">Total:   <b><?php echo "$show_impression"; ?></b></p>
</div>
<div class="refer">
<?php

$query = mysql_query("SELECT * FROM `adv` WHERE username = '$user' order by time desc");
while ($fetch = mysql_fetch_array($query)){
$puser = $fetch['username'];
$pimpression = $fetch['impression'];
$ppageviews = $fetch['pageviews'];
$preferer = $fetch['referer'];
$pip_address = $fetch['ip_address'];
$pwebsite = $fetch['website'];
$pdate = $fetch['date'];
$times = $fetch['time'];
echo "<div class='show_off'><i>A visitor from <u>$pip_address</u>,visited <q><u><a href='$pwebsite' target='_blank'class='ili'>$pwebsite</a></u></q> refered from <q><u><a href='$preferer' target='_blank' class='ili'>$preferer</a></u></q></i>
on $pdate at $times.
</div><hr/>";

}
?>
</div>
<div class="google">
<?php 
$iquery = mysql_query("SELECT * FROM `only_clicks` WHERE username = '$user' order by time desc");

$impt_query = mysql_query("SELECT * FROM adv WHERE clicked_of = '$user' order by time desc");
while ($impt_fetch = mysql_fetch_array($impt_query)){
$show_site = $impt_fetch['referer'];

echo "<div class='show_off'><i>Your ads was shown at $show_site</i></div><hr/>";
while ($ifetch = mysql_fetch_array($iquery)){
$puser_ = $ifetch['username'];
$clicks_ = $ifetch['clicks'];
//$ppageviews_ = $ifetch['pageviews'];
//$preferer_ = $ifetch['referer'];
$pip_address_ = $ifetch['ip_address'];
$pwebsite_ = $ifetch['website'];
$pdate_ = $ifetch['date'];
echo "<div class='show_off'><i>Your ads got clicked at $pwebsite_ from a visitor of $pip_address_</i></div><hr/>";
}
}
?>
</div>

</div>
<div id="jquery"><a href="#">close</a></div>
<div class="mymenu"><p class="hidensheek" onload="poup();">menu</div></div>
<?php
$date = date("Y-m-d");
$ruery = mysql_query("SELECT date FROM final_data WHERE username =  '$user'  AND date = '$date'
");
$ows = mysql_num_rows($ruery);
if ($ows === 0 )
{
mysql_query("INSERT INTO final_data VALUES ('',
'$user', 
'$date',
'$show_ads_id',
'$showcc',
'$showd',
'$showbb',
'$showp',
'$spent_credit',
'$earn_credit',
'$showe'
)");
}
else
{
mysql_query("UPDATE final_data SET 
ads_id = '$show_ads_id',
pageviews = '$showcc',
clicks = '$showd',
clicks_sent = '$showbb',
visits = '$showp',
credits = '$spent_credit',
credits_earned= '$earn_credit',
my_ads= '$showe' 
WHERE username = '$user' AND date = '$date'");
}?>
<!--
<div class='hint' ><div class='close' onclick='poup();'>X</div><p class='hints'>Message</p>
Your ads request has been sucessfull.we will take review of your website and as soon as it will approved your ads will run sucessfully!
</div>
-->
</body>
</html>
