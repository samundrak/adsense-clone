<?php session_start(); include 'db.inc.php'; $user = $_SESSION['username']; include 'userdetail.php'; include 'data.php';
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
background-color:PURPLE;
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

<div id='header'>~~ADMIN PANEL~~</div>
<div id='menu'>

<div class="nav">
<ul>
<li><a href="/soosal/ads/admin">Home</a>

</li>
<li>Members
<ul>
<li><a href="home.php?p=publishers">Publisher members</a></li>
<li><a href="home.php?p=advertisers">Advertiser members</a></li>
</ul></li>
<li>Clicks
<ul>
<li><a href="home.php?p=clicks">Publishers clicks</a></li>
<li><a href="home.php?p=adv">Advertisers clicks</a></li>
</ul></li>
<li>Impression
<ul>
<li><a href="home.php?p=ads-impression">Publishers ads</a></li>
<li><a href="home.php?p=page-impression">Advertisers ads </a></li>
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
<div class="details"><img src="/images/pik.png" width="50px" height="50xp"/><div class="username">
<?php 
//$image_query = mysql_query("SELECT image FROM members WHERE username = '$user'");
//$image_fetch = mysql_fetch_array($image_query);
//$photo = $image_fetch[''];
echo "ADMIN
<hr class='whr'/><i><q>N/A</q></i></div>";?>
<?php $today = date("Y-m-d"); echo "<div class='date'>$today</div>"; ?>
</div>
<div class="board">
<div class="myweb">
Publisher website's Data<sup class="what" ><acronym title="All details about Website like  website pageviews,ads click and unique visits.">(?)</acronym></sup>
</div>
<div class="credit">
Total credits<sup class="what"><acronym title="All details about credits spented and earned.">(?)</acronym></sup>
</div>
<div class="myads">
About Ads<sup class="what"><acronym title="All details about ads.">(?)</acronym></sup>
</div>
</div>
<div class="pageviews">
<?php
$datess = date("Y-m-d");
$date = new DateTime("$datess");
$date->modify("-1 day");
$echo = $date->format("Y-m-d");
$yquery = mysql_query("SELECT sum(pageviews) FROM adv WHERE date = '$datess'");
$aquery = mysql_query("SELECT sum(pageviews) FROM adv WHERE date = '$echo'");
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
<p class="past2">Total:    <b><?php echo visit(); ?></b></p>
</div>



<div class="clicks">
<?php
// about my website clicks data//
$bquery = mysql_query("SELECT sum(clicks) FROM only_clicks WHERE date = '$datess'");
$bbquery = mysql_query("SELECT sum(clicks) FROM only_clicks WHERE date = '$echo'");
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
<p class="past2">Total:    <b><?php echo clicks(); ?></b></p>
</div>




<div class="impression">
<?php 
//about ads impression
$cquery = mysql_query("SELECT sum(impression) FROM adv WHERE date = '$datess'");
$ccquery = mysql_query("SELECT sum(impression) FROM adv WHERE date = '$echo'");
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
<p class="past2">Total:   <b><?php echo my_impression(); ?></b></p>
</div>
<div class="credits">

<?php 
$credits_query = mysql_query("SELECT sum(credit_spent) FROM credits_ ");
$credit_query = mysql_query("SELECT sum(credit_earn) FROM credits_ ");
$credits_fetch = mysql_fetch_array($credits_query);
$credit_fetch = mysql_fetch_array($credit_query);
$spent_credit = $credits_fetch[0];
$earn_credit = $credit_fetch[0];

if ($show_ads_credit === NULL ){echo "<p class='points'>50</p><p class='text'> Credits</p>";}else{
echo "<p class='points'>".total_credits()."</p><p class='text'> Credits</p>";} ?>

<p class="past6">Earn:  <b><?php if ($earn_credit === NULL){echo "0";} else{echo "$earn_credit";}?></b></p>
<p class="past5">Spent:  <b><?php if ( $spent_credit === NULL){ echo "0";} else{echo "$spent_credit"; }?></b></p>
</div>
<div class="creditsused">
<?php
$dquery = mysql_query("SELECT sum(clicks) FROM only_clicks WHERE date = '$datess'");
$ddquery = mysql_query("SELECT sum(clicks) FROM only_clicks WHERE date = '$echo'");
$dfetch = mysql_fetch_array($dquery);
$ddfetch = mysql_fetch_array($ddquery);
$showd = $dfetch[0];
$showdd = $ddfetch[0];
if ($showd === NULL)
{echo "<p class='points'>0</p>";}
else
{echo "<p class='points'>$showd</p>";}
  ?>
<p class='text'>Ads clicks</p>
<p class="past3">Yesterday: <b><?php echo "$showdd"; ?></b></p>
<p class="past4">Total:     <b><?php echo ads_clicks(); ?></b></p>
</div>
<div class="myimpression">
<?php
$equery = mysql_query("SELECT sum(impression) FROM adv WHERE  date = '$datess'");
$eequery = mysql_query("SELECT sum(impression) FROM adv WHERE  date = '$echo'");
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
<p class='text'>Ads impression</p>
<p class="past3">Yesterday: <b><?php echo "$showee"; ?></b></p>
<p class="past4">Total:   <b><?php echo my_ads_impression(); ?></b></p>
</div>
<!---------------------SECOND ROW STARTS FROM HERE-------------------------------->
<!---------------------SECOND ROW STARTS FROM HERE-------------------------------->
<!---------------------SECOND ROW STARTS FROM HERE-------------------------------->
<!---------------------SECOND ROW STARTS FROM HERE-------------------------------->
<div class="board">
<div class="myweb2">
Ads details<sup class="what"><acronym title="All details about ads that are in pending,approved and stopped">(?)</acronym></sup>

</div>
<div class="credit2">
Total Ads<sup class="what"><acronym title="All details about ads that are running.">(?)</acronym></sup>
</div>
<div class="myads2">

Ads details<sup class="what"><acronym title="All details about ads that are in pending,approved and stopped">(?)</acronym></sup>
</div>
</div>
<div class="pageviews">

 <?php echo "<p class='points'>".pending()."</p>"; ?>
 <p class='text'>Pending</p>
<p class="past">Yesterday: <b><?php echo pending_y(); ?></b></p>
<p class="past2">Total:    <b><?php echo pending_t(); ?></b></p>
</div>



<div class="clicks">
<?php

 echo "<p class='points'>".approved()."</p>"; 
 ?>
<p class='text'>Approved </p>
<p class="past">Yesterday: <b><?php echo approved_y(); ?></b></p>
<p class="past2">Total:    <b><?php echo approved_t(); ?></b></p>
</div>




<div class="impression">
<?php 

echo "<p class='points'>".rejected()."</p>";

?> 
<p class='text'>Rejected</p>
<p class="past">Yesterday: <b><?php echo rejected_y(); ?></b></p>
<p class="past2">Total:   <b><?php echo rejected_t(); ?></b></p>
</div>
<div class="credits">

<?php 

echo "<p class='points'>".running()."</p><p class='text'> Running ads</p>"; ?>

<p class="past6">Yesterday:  <b><?php echo running_y();?></b></p>
<p class="past5">Total:  <b><?php echo running_t(); ?></b></p>
</div>
<div class="creditsused">
<?php

echo "<p class='points'>".advertisers()."</p>";
  ?>
<p class='text'>Advertisers</p>
<p class="past3">Yesterday: <b><?php echo advertisers_y(); ?></b></p>
<p class="past4">Total:     <b><?php echo advertisers_t(); ?></b></p>
</div>
<div class="myimpression">
<?php

echo "<p class='points'>".publishers()."</p>";

 ?>
<p class='text'>publishers</p>
<p class="past3">Yesterday: <b><?php echo publishers_y(); ?></b></p>
<p class="past4">Total:   <b><?php echo publishers_t(); ?></b></p>
</div>
<?php 
$running = running();
$approved = approved();
$pending = pending();
$rejected = rejected();
$suspended = suspended();
$stopped = stopped();
$publishers = publishers();
$advertisers = advertisers();
$total_credits = total_credits();

$ruery = mysql_query("SELECT date FROM admin_data WHERE date = '$today'");
$ows = mysql_num_rows($ruery);
if ($ows === 0 )
{
mysql_query("INSERT INTO `admin_data` 
(`id`, `running_ads`, `approved_ads`, `pending_ads`, `rejected_ads`, `suspended_ads`, `stopped_ads`, `publishers`, `advertisers`, `visits`, `clicks`, `impression`, `credits`, `credits_earn`, `credits_spent`, `date`) 
VALUES (NULL, '$running', '$approved', '$pending', '$rejected', '$suspended', '$stopped', '$publishers', '$advertisers', '$showp', '$showbb', '$showcc', '$total_credits', '$earn_credit', '$spent_credit', '$today')");
}
else
{
mysql_query("UPDATE admin_data SET 
running_ads = '$running',
approved_ads = '$approved',
pending_ads = '$pending',
rejected_ads = '$rejected',
suspended_ads = '$suspended',
stopped_ads = '$stopped',
publishers = '$publishers',
advertisers = '$advertisers',
visits = '$showp',
clicks = 'showbb',
impression = '$showcc',
credits = '$total_credits',
credits_earn = '$earn_credit',
credits_spent = '$spent_credit',
date = '$today'
WHERE date = '$today'");
} ?>
</div>
</div>

</body>
</html>
