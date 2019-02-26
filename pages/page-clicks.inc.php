<h1>Your website ads clicks</h1>
<?php 
session_start();
$user = $_SESSION['username'];
include 'userdetail.php';
include 'functions.php';
$week = week();
$month = month();

//echo "$show_ads_credit";
?>
<div id="color">
<div class="data"><p><?php
$datess = date("Y-m-d"); //today
$date = new DateTime("$datess");
$date->modify("-1 day");
$date_week = new DateTime("$datess");

$echo = $date->format("Y-m-d");
$bquery = mysql_query("SELECT sum(clicks) FROM only_clicks WHERE clicked_from = '$user' AND date = '$datess'");
$bbquery = mysql_query("SELECT sum(clicks) FROM only_clicks WHERE clicked_from = '$user' AND date = '$echo'");
$bfetch = mysql_fetch_array($bquery);
$bbfetch = mysql_fetch_array($bbquery);
$showb = $bbfetch[0];
$showbb = $bfetch[0];

if ($showbb === NULL)
{
 echo "0"; 
 }
 else
 {
 echo "$showbb"; 
 }?>
</p></div>
<div class="hijo"><p><?php echo "$showb"; ?></p></div>
<div class="hapta"><p>4</p></div>
<div class="maina"><p>4</p></div>
<div class="total"><p><?php echo "$show_my_clicks"; ?></p></div>
<div class="google">
<?php
$iquery = mysql_query("SELECT * FROM `only_clicks` WHERE clicked_from = '$user' order by time desc");

while ($ifetch = mysql_fetch_array($iquery)){
$puser_ = $ifetch['username'];
$clicks_ = $ifetch['clicks'];
//$ppageviews_ = $ifetch['pageviews'];
//$preferer_ = $ifetch['referer'];
$pip_address_ = $ifetch['ip_address'];
$pwebsite_ = $ifetch['website'];
$pdate_ = $ifetch['date'];
$ptime_ = $ifetch['time'];
echo "<div class='show_off'><i>Your website ads got clicked at $pwebsite_ from a visitor of $pip_address_ on $pdate_ at $ptime_</i></div><hr/>";
}?></div>
<div class="ads"><?php echo "$show_week";?></div>
</div>
