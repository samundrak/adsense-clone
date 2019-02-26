<h1>Your ads impression</h1>
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
$equery = mysql_query("SELECT sum(impression) FROM adv WHERE clicked_of = '$user' AND date = '$datess'");
$eequery = mysql_query("SELECT sum(impression) FROM adv WHERE clicked_of = '$user' AND date = '$echo'");
$efetch = mysql_fetch_array($equery);
$eefetch = mysql_fetch_array($eequery);
$showe = $efetch[0];
$showee = $eefetch[0];
if ($showe === NULL)
{echo "0";}
else
{
echo "$showe";
}
?>
</p></div>
<div class="hijo"><p><?php echo "$showee"; ?></p></div>
<div class="hapta"><p>4</p></div>
<div class="maina"><p>4</p></div>
<div class="total"><p><?php echo "$show_impression"; ?></p></div>
<div class="google">
<?php
$impt_query = mysql_query("SELECT * FROM adv WHERE clicked_of = '$user' order by time desc");
while ($impt_fetch = mysql_fetch_array($impt_query)){
$show_site = $impt_fetch['referer'];
$show_date = $impt_fetch['date'];
$show_time = $impt_fetch['time'];

echo "<div class='show_off'><i>Your ads was shown at $show_site on $show_date at $show_time</i></div><hr/>";
}?></div>
<div class="ads"><?php echo "$show_week";?></div>
</div>
