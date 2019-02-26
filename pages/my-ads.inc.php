<h1>Your ads clicks</h1>
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
$dquery = mysql_query("SELECT sum(clicks) FROM only_clicks WHERE username = '$user' AND date = '$datess'");
$ddquery = mysql_query("SELECT sum(clicks) FROM only_clicks WHERE username = '$user' AND date = '$echo'");
$dfetch = mysql_fetch_array($dquery);
$ddfetch = mysql_fetch_array($ddquery);
$week_query = mysql_query("SELECT sum(clicks) FROM final_data WHERE username = '$user' AND date = '$datess'>$week");
$month_query = mysql_query("SELECT sum(clicks) FROM final_data WHERE username = '$user' AND date = '$echo' > $month");
$week_fetch = mysql_fetch_array($week_query);
$month_fetch = mysql_fetch_array($month_query);
$show_week = $week_fetch[0];
$show_month = $month_fetch[0];
$showd = $dfetch[0];
$showdd = $ddfetch[0];
if ($showd === NULL)
{echo "0";}
else
{echo "$showd";}?>
</p></div>
<div class="hijo"><p><?php echo "$showdd"; ?></p></div>
<div class="hapta"><p>4</p></div>
<div class="maina"><p>4</p></div>
<div class="total"><p>4</p></div>
<div class="google">
<?php
$iquery = mysql_query("SELECT * FROM `only_clicks` WHERE username = '$user' order by time desc");

while ($ifetch = mysql_fetch_array($iquery)){
$puser_ = $ifetch['username'];
$clicks_ = $ifetch['clicks'];
//$ppageviews_ = $ifetch['pageviews'];
//$preferer_ = $ifetch['referer'];
$pip_address_ = $ifetch['ip_address'];
$pwebsite_ = $ifetch['website'];
$pdate_ = $ifetch['date'];
echo "<div class='show_off'><i>Your ads got clicked at $pwebsite_ from a visitor of $pip_address_</i></div><hr/>";
}?></div>
<div class="ads"><?php echo "$show_week";?></div>
</div>
