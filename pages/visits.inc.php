<h1>Your Website visits!</h1>
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
<div class="data"><p class="mc"><?php
$datess = date("Y-m-d"); //today
$date = new DateTime("$datess");
$date->modify("-1 day");
$date_week = new DateTime("$datess");

$echo = $date->format("Y-m-d");
$yquery = mysql_query("SELECT sum(pageviews) FROM adv WHERE username = '$user' AND date = '$datess'");
$aquery = mysql_query("SELECT sum(pageviews) FROM adv WHERE username = '$user' AND date = '$echo'");
$afetch = mysql_fetch_array($aquery);
$yfetch = mysql_fetch_array($yquery);
$showp = $yfetch[0];
$showa = $afetch[0];

if ($showp ===  NULL)
{
echo "0";
}
else
{
 echo "$showp"; }?>
</p></div>
<div class="hijo"><p><?php echo "$showa"; ?></p></div>
<div class="hapta"><p>4</p></div>
<div class="maina"><p>4</p></div>
<div class="total"><p><?php echo "$show_pageviews"; ?></p></div>
<div class="google">
<?php
$query = mysql_query("SELECT * FROM `adv` WHERE username = '$user' AND pageviews = '1' order by time desc");
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

?></div>
<div class="ads"><?php echo "$show_week";?></div>
</div>
