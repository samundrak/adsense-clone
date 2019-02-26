<?php
//session_start();
include 'db.inc.php';
$user = $_SESSION['username'];
error_reporting(0);
// members details
$query = mysql_query("SELECT * FROM members WHERE username='$user'");
$fetch = mysql_fetch_assoc($query);
$rdomain = $fetch['requestdomain'];
$pdomain = $fetch['presentdomain'];
$username = $fetch['username'];
$lastname = $fetch['lastname'];
$firstname = $fetch['firstname'];
$pending = $fetch['pending'];
$approved = $fetch['approved'];
$reject = $fetch['reject'];

//ads details and statistics
$adsquery = mysql_query("SELECT * FROM adv WHERE username='$user'");
$adsfetch = mysql_fetch_assoc($adsquery);
$ads_id = $adsfetch['ads_id']; 
$ads_pageviews = $adsfetch['pageviews']; 
$ads_username = $adsfetch['username']; 
$ads_impression = $adsfetch['impression']; 
$ads_refer = $adsfetch['referer']; 
$ads_ip_address = $adsfetch['ip_address']; 
$ads_time = $adsfetch['time']; 
$ads_date = $adsfetch['date']; 
$ads_website = $adsfetch['website']; 
 
//earn points 
$pointsquery = mysql_query("SELECT * FROM earn_points WHERE username='$user'"); 
$pointsfetch = mysql_fetch_array($pointsquery);
$points_user_id = $pointsfetch['user_id'];
$points_id = $pointsfetch['id'];
$points_ads_id = $pointsfetch['ads_id'];
$points_username = $pointsfetch['username'];
$points_earn_points = $pointsfetch['earn_points'];
$points_total_points = $pointsfetch['total_points'];
$points_date = $pointsfetch['date'];
$points_time = $pointsfetch['time'];

//show ads
$show_query = mysql_query("SELECT * FROM soosal_ads WHERE username ='$user'");
$show_fetch = mysql_fetch_assoc($show_query);
$show_ads_id = $show_fetch['ads_id'];
$show_banner = $show_fetch['banner'];
$show_url = $show_fetch['url'];
$show_username = $show_fetch['username'];
$show_impression = $show_fetch['impression'];
$show_my_impression = $show_fetch['my_impression'];
$show_clicks = $show_fetch['clicks'];
$show_my_clicks = $show_fetch['my_clicks'];
$show_pageviews = $show_fetch['pageviews'];
$show_ads_credit = $show_fetch['ads_credit'];
$show_date = $show_fetch['date'];
$datess = date("Y-m-d");
//echo "aja:$datess<br/>";
$date = new DateTime("$datess");
$date->modify("-1 day");
$echo = $date->format("Y-m-d");
//yesterday date
//echo "hijo:$echo";
//todays date
//total


?>