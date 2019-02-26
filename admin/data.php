<?php 
session_start();
include 'db.inc.php'; 
$user = $_SESSION['username']; 
$today = date("Y-m-d");
$date = new DateTime("$today");
$date->modify("-1 day");
$yesterday = $date->format("Y-m-d");

/*-------------------FIRST ROW FUNCTIONS HOMEPAGE------------------*/
function visit(){
$visit_query = mysql_query("SELECT sum(pageviews) FROM soosal_ads");
$visits = mysql_result($visit_query, 0);
return $visits;
}

function clicks()
{
$query = mysql_query("SELECT sum(my_clicks) FROM soosal_ads");
$clicks = mysql_result($query, 0);
return $clicks;
}

function ads_clicks()
{
$query = mysql_query("SELECT sum(clicks) FROM soosal_ads");
$clicks = mysql_result($query, 0);
return $clicks;
}
function my_ads_impression()
{
$query = mysql_query("SELECT sum(impression) FROM soosal_ads");
$show_me = mysql_result($query, 0);
return $show_me;
}
function my_impression()
{
$query = mysql_query("SELECT sum(my_impression) FROM soosal_ads");
$show_me = mysql_result($query, 0);
return $show_me;
}
function total_credits()
{
$query = mysql_query("SELECT sum(ads_credit) FROM soosal_ads");
$show_me = mysql_result($query, 0);
return $show_me;
}
/*---------SECOND ROW FUNCTIONS---------------*/
function pending()
{
global $today;

$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '0' AND date = '$today'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function pending_y()
{
global $yesterday;

$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '0' AND date = '$yesterday'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function pending_t()
{
global $yesterday;

$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '0'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function approved()
{
global $today;

$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '1' AND date = '$today'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function approved_y()
{
global $yesterday;

$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '1' AND date = '$yesterday'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function approved_t()
{


$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '1'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function rejected()
{
global $today;

$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '2' AND date = '$today'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function rejected_y()
{
global $yesterday;

$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '2' AND date = '$yesterday'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function rejected_t()
{


$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '2'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function suspended()
{
global $today;

$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '3' AND date = '$today'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function suspended_y()
{
global $yesterday;

$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '3' AND date = '$yesterday'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function suspended_t()
{


$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '3'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function stopped()
{
global $today;

$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '4' AND date = '$today'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function stopped_y()
{
global $yesterday;

$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '4' AND date = '$yesterday'");
$show_me = mysql_result($query, 0);
return $show_me;
}
function stopped_t()
{


$query = mysql_query("SELECT count(status) FROM soosal_ads WHERE status = '4'");
$show_me = mysql_result($query, 0);
return $show_me;
}
###########################################

###########################################
function running()
{
$query = mysql_query("SELECT count(id) FROM approved_ads");
$show_me = mysql_result($query, 0);
return $show_me;
}
function running_y()
{
global $yesterday;
$query = mysql_query("SELECT running_ads FROM admin_data WHERE date = '$yesterday'");
$show_me = mysql_result($query, 0);
return $show_me;
}function running_t()
{
$query = mysql_query("SELECT sum(running_ads) FROM admin_data");
$show_me = mysql_result($query, 0);
return $show_me;
}

function advertisers()
{
global $today;
$query = mysql_query("SELECT count(username) FROM soosal_ads WHERE status = '1' AND date = '$today'");
$show_me = mysql_result($query,0);
return $show_me;
}
function advertisers_y()
{
global $yesterday;
$query = mysql_query("SELECT count(username) FROM soosal_ads WHERE status = '1' AND date = '$yesterday'");
$show_me = mysql_result($query,0);
return $show_me;
}function advertisers_t()
{
global $today;
$query = mysql_query("SELECT count(username) FROM soosal_ads WHERE status = '1'");
$show_me = mysql_result($query,0);
return $show_me;
}
function publishers()
{
global $today;
$query = mysql_query("SELECT count(username) FROM soosal_ads WHERE p_status = '1' AND date = '$today'");
$show_me = mysql_result($query,0);
return $show_me;
}
function publishers_y()
{
global $yesterday;
$query = mysql_query("SELECT count(username) FROM soosal_ads WHERE p_status = '1' AND date = '$yesterday'");
$show_me = mysql_result($query,0);
return $show_me;
}function publishers_t()
{
global $today;
$query = mysql_query("SELECT count(username) FROM soosal_ads WHERE p_status = '1'");
$show_me = mysql_result($query,0);
return $show_me;
}

function show_publisher(){

$query  = mysql_query("SELECT * FROM publishers ORDER BY date desc");
while ($fetch  = mysql_fetch_assoc($query))
{
$username = $fetch['username'];
$website = $fetch['website'];
$date = $fetch['date'];
echo "<div class='show_off'><i>Username: $username 
<br/> Website: <a href='$website' target='_blank'>$website</a> 
<br/>Joined On: $date</i></div>
<a href='home.php?p=publishers&&delete=$username'><u>Delete</u></a>
<a href='home.php?p=publishers&&suspend=$username'><u>Suspend</u></a> 
<a href='home.php?p=publishers&&stop=$username'><u>Stop</u></a> 
<hr/>";
}
$delete = $_GET['delete'];
$suspend = $_GET['suspend'];
$stop = $_GET['stop'];
$error = array();
if ($delete){
if (!empty($delete))
{
mysql_query("DELETE FROM soosal_ads WHERE username = '$delete'");
mysql_query("DELETE FROM publishers WHERE username = '$delete'");
$error[0] = "<div class='hint' ><div class='close' onclick='popup();'>X</div><p class='hints'>Message</p>
User has been sucesfully deleted!
</div>";
}}
if ($suspend)
{
if (!empty($suspend))
{
mysql_query("UPDATE soosal_ads SET p_status = '3' WHERE username = '$suspend'");
$error[0] = "<div class='hint' ><div class='close' onclick='popup();'>X</div><p class='hints'>Message</p>
User has been sucesfully suspended!
</div>";
}
}
if ($stop)
{
if (!empty($stop))
{
mysql_query("UPDATE soosal_ads SET p_status = '4' WHERE username = '$stop'");
$error[0] = "<div class='hint' ><div class='close' onclick='popup();'>X</div><p class='hints'>Message</p>
User has been sucesfully stopped!
</div>";
}
}
}

function result()
{
$submit = $_POST['submit'];
$search = strip_tags(htmlentities(trim($_POST['search'])));
if (isset($submit))
{
 if (!empty($search))
 {
 if(strlen($search)>6||strlen($search)<30){
 $query = mysql_query("SELECT * FROM publishers WHERE username LIKE '%$search%' LIMIT 1");
 $rows = mysql_num_rows($query);
 $fetch = mysql_fetch_array($query);
 $username = $fetch['username'];
 $website = $fetch['website'];
 $date = $fetch['date'];
if  ($rows < 1)
{
echo "<div class='hint' ><div class='close' onclick='popup();'>X</div><p class='hints'>Message</p>
The user you are searching has not found!
Please check username!
</div>";
}
else
{

echo "<div class='result'>Username: $username<br/>Website: <a href='$website'>$website</a><br/>Joined date: $date<hr/>";
echo "<a href='home.php?p=publishers&&delete=$search'>Delete</a> 
<a href='home.php?p=publishers&&suspend=$search'>Suspend</a>
<a href='home.php?p=publishers&&stop=$search'>Stop!</a></div>";
}
}
else
{
echo "<div class='hint'><div class='close' onclick='popup();'>X</div><p class='hints'>Message</p>
Username under 30 and above 6 characters can only found!
please try again!
</div>";
}
}
else
{echo "<div class='hint' ><div class='close' onclick='popup();'>X</div><p class='hints'>Message</p>
Empty search willl never give any result!
</div>";}
}
}
?>