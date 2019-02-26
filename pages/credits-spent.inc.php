<h1>Your credits spent details</h1>
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
$query = mysql_query("SELECT sum(credit_spent) FROM credits_ WHERE  whose_ads = '$user' AND date='$datess'");
$fetch = mysql_fetch_array($query);
$today = $fetch[0];
$yquery = mysql_query("SELECT sum(credit_spent) FROM credits_ WHERE whose_ads = '$user' AND date = '$echo'");
$yfetch = mysql_fetch_array($yquery);
$yesterday = $yfetch[0];

echo "$today";
?>
</p></div>
<div class="hijo"><p><?php echo "$yesterday"; ?></p></div>
<div class="hapta"><p>4</p></div>
<div class="maina"><p>4</p></div>
<div class="total"><p><?php
$total_query = mysql_query("SELECT credits from final_data where username = '$user' and date= '$datess'");
$total_fetch = mysql_fetch_assoc($total_query);
$total = $total_fetch['credits'];

 echo "$total"; ?></p></div>
<div class="google">
<?php
$iquery = mysql_query("SELECT * FROM `credits_` WHERE whose_ads = '$user' order by time desc");

while ($ifetch = mysql_fetch_array($iquery)){
$puser_ = $ifetch['username'];
$clicks_ = $ifetch['clicks'];
//$ppageviews_ = $ifetch['pageviews'];
//$preferer_ = $ifetch['referer'];
$pip_address_ = $ifetch['ip_address'];
$pwebsite_ = $ifetch['referer_address'];
$pdate_ = $ifetch['date'];
$ptime_ = $ifetch['time'];
echo "<div class='show_off'><i>
one Credit has been deducted after getting click from $pwebsite_ on $pdate_ at $ptime_.
</i></div><hr/>";
}?></div>
<div class="ads"><?php echo "$show_week";?></div>
</div>
