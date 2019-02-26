<h1>Your website page views</h1>
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
$cquery = mysql_query("SELECT sum(impression) FROM adv WHERE username = '$user' AND date = '$datess'");
$ccquery = mysql_query("SELECT sum(impression) FROM adv WHERE username = '$user' AND date = '$echo'");
$cfetch = mysql_fetch_array($cquery);
$ccfetch = mysql_fetch_array($ccquery);
$showc = $ccfetch[0];
$showcc = $cfetch[0];

if ($showcc === NULL)
{
echo "0";
}
else
{
echo "$showcc";
}?>
</p></div>
<div class="hijo"><p><?php echo "$showc"; ?></p></div>
<div class="hapta"><p>4</p></div>
<div class="maina"><p>4</p></div>
<div class="total"><p><?php echo "$show_my_impression"; ?></p></div>
<div class="google">
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

}?></div>
<div class="ads"><?php echo "$show_week";?></div>
</div>
