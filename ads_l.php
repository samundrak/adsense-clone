<?php 
$url = $_GET['li'];
$ads_id = $_GET['id'];
$time = $_GET['ti'];
$referer = $_GET['ref'];
$pub  = $_GET['pubid'];


include 'db.inc.php';
$search = mysql_query("SELECT ads_id FROM approved_ads");
$rows = mysql_num_rows($search);
if ($rows < 1)
{
header ("Location: index.php");
}else{
$query = mysql_query("SELECT * FROM soosal_ads WHERE ads_id = '$ads_id'");
$fetch = mysql_fetch_array($query);
$ads_id_ = $fetch['ads_id'];
$url_ = $fetch['url'];
$banner = $fetch['banner'];
$impression = $fetch['impression'];
$clicks = $fetch['clicks'];
$pageviews = $fetch['pageviews'];
$ads_credit = $fetch['ads_credit'];
$username = $fetch['username'];
$date = $fetch['date'];
$u = md5($url);
$f = sha1($banner);
$time = date("g:i:sa");
$referer_ = $_SERVER['HTTP_REFERER'];
$ip_address = $_SERVER['REMOTE_ADDR'];
$dates = date("Y-m-d");
$iquery = mysql_query("SELECT * FROM soosal_ads  WHERE username = '$pub'");
$ifetch = mysql_fetch_assoc($iquery);
$my_clicks = $ifetch['my_clicks'];
$my_credit = $ifetch['ads_credit'];

$avoid_query = mysql_query("SELECT ip_address FROM credits_ WHERE username = '$pub' AND ip_address = '$ip_address' AND date = '$dates'");
$avoid_rows = mysql_num_rows($avoid_query);
echo "$avoid_rows";

if ($referer_){
                                                // clicked ads,clicked ads username,clicked on website,clicked ip,clicked date','clciked'time 
mysql_query("INSERT INTO only_clicks VALUES('','$ads_id','$username','1','$pub','$referer','$ip_address','$time','$dates')");

if ($avoid_rows < 3){
//echo "less then three";
mysql_query("UPDATE soosal_ads SET ads_credit = '$ads_credit' - 1 , clicks = '$clicks' +1   WHERE ads_id = '$ads_id'");
mysql_query("UPDATE soosal_ads SET ads_credit = '$my_credit' + 1 , my_clicks = '$my_clicks' +1 WHERE username = '$pub'");
mysql_query("INSERT INTO credits_ VALUES('','$pub','1','1','$referer','$ip_address','$dates','$time','$ads_id','$username')");

}
else
{
//echo "high then three";
mysql_query("UPDATE soosal_ads SET clicks = '$clicks' +1   WHERE ads_id = '$ads_id'");
mysql_query("UPDATE soosal_ads SET my_clicks = '$my_clicks' +1 WHERE username = '$pub'");

}
}
//echo "url:$url <br/> referer:$referer <br/>refer: $referer_";
}
?>