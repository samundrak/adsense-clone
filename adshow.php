<?php 
//ads query
include 'db.inc.php';
$query = mysql_query("SELECT id FROM approved_ads
");
$rows = mysql_num_rows($query);
$fows = $rows - 1;
$bows = $rows - $fows;
//echo "$bows";
$rand = mt_rand(1,$rows);
$time = date("g:i:sa");
$pub = $_GET['pubid'];
echo "$rand";
//echo mt_rand(1,2);
?>

<?php 

$query = mysql_query("SELECT * FROM soosal_ads WHERE username = '$pub'");
$fetch = mysql_fetch_array($query);

$url = $fetch['url'];
$banner = $fetch['banner'];
$impression = $fetch['impression'];
$my_impression = $fetch['my_impression'];
$clicks = $fetch['clicks'];
$clicks = $fetch['clicks'];
$pageviews = $fetch['pageviews'];
$ads_credit = $fetch['ads_credit'];
$username = $fetch['username'];
$date = $fetch['date'];
$u = md5($url);
$f = sha1($banner);
$time =  date("g:i:sa");
$referer = $_SERVER['HTTP_REFERER'];
$ip_address = $_SERVER['REMOTE_ADDR'];

$my = $my_impression + 1;
//$imp = $impression + 1;
$pag = $pageviews + 1;
$website = $_SERVER['PHP_SELF'];
$date = date("Y-m-d");
$higher = 5 > 1;
 


$ishow = mysql_query("SELECT * FROM soosal_ads WHERE ads_id = '$rand'");
$ifetch = mysql_fetch_array($ishow);
$ibanner = $ifetch['banner'];
$ads_id = $ifetch['ads_id'];
$iurl = $ifetch['url'];
$ibanner = $ifetch['banner'];
$iimpression = $ifetch['impression'];
$imy_impression = $ifetch['my_impression'];
$iclicks = $ifetch['clicks'];
$ipageviews = $ifetch['pageviews'];
$iads_credit = $ifetch['ads_credit'];
$iusername = $ifetch['username'];
$idate = $ifetch['date'];
$imp = $iimpression + 1;
$req = $_SERVER['REQUEST_URI'];

$checkquery = mysql_query("select ip_address from adv where username = '$username' AND ip_address = '$ip_address' AND date = '$date'");
$rows = mysql_num_rows($checkquery);
if ($rows === 0)
{
//if ip not found for todays date
mysql_query("INSERT INTO adv VALUES('','$ads_id','$username','$iusername','1','1','$referer','$ip_address','$time','$date','$website')");
mysql_query("UPDATE soosal_ads SET my_impression = '$my', pageviews = '$pag' WHERE username = '$pub'");

}
else
{
//if ip found for todays date
mysql_query("INSERT INTO adv VALUES('','$ads_id','$username','$iusername','1','0','$referer','$ip_address','$time','$date','$website')");
mysql_query("UPDATE soosal_ads SET my_impression = '$my' WHERE username = '$pub'");

}





//publishers website details
//mysql_query("UPDATE soosal_ads SET my_impression = '$my', pageviews = '$pag' WHERE username = '$pub'");

mysql_query ("UPDATE soosal_ads SET impression = '$imp' WHERE ads_id = '$rand'");//

//echo "$referer $ip_address<br/>$req<br/>$website";
echo "<a href='/soosal/ads/ads_l.php?id=$ads_id&&li=$url&&ti=$time&u=$u&fi=$f&&pubid=$pub&&ref=$referer' target='_blank'>"; 
$lastquery = mysql_query("SELECT banner FROM approved_ads WHERE ads_id ='$rand'");
$lastrow = mysql_num_rows($lastquery);
$lastfetch = mysql_fetch_assoc($lastquery);
$photo = $lastfetch['banner'];

if ($lastrow < 1)
{
echo "<a href='/soosal/ads/ads_l.php?id=1&&li=$url&&ti=$time&u=$u&fi=$f&&pubid=$pub&&ref=$referer' target='_blank'>"; 
echo "<img src='images/pik.png' width='200px' height='200px' />
</a>";

}
else
{
if ($iads_credit > 5) {
echo "<a href='/soosal/ads/ads_l.php?id=$ads_id&&li=$url&&ti=$time&u=$u&fi=$f&&pubid=$pub&&ref=$referer' target='_blank'>"; 

echo "<img src='$photo' width='200px' height='200px' />
</a>";}
else
{
echo "<a href='/soosal/ads/ads_l.php?id=1&&li=$url&&ti=$time&u=$u&fi=$f&&pubid=$pub&&ref=$referer' target='_blank'>"; 

echo "<img src='images/pik.png' width='200px' height='200px' />
</a>";
}
} ?>