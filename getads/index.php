<?php //
session_start();
include 'db.inc.php'; 
$user = $_SESSION['username']; 
error_reporting(0);
?>
<html>
<head>
<style>
.nav ul {list-style:none;margin:0;padding:0;}
.nav li {float:left;width:100px;
background-color:black;
text-align:center;
border-right:1px solid white;
position:relative;
height:30px;
line-height:30px;
color:green;
cursor:pointer;
font-weight:bold;
}
.nav li ul li {float:none;
width:150px; 
text-align:left;
padding-left:5px;
border-top:1px solid white;
}
.nav a {text-decoration:none;}
.nav li ul{position:absolute; top:30px; left:0px;
visibility:hidden;
}.nav li:hover ul{position:absolute; top:30px; left:0px;
visibility:visible;
}
.nav li:hover
{
background-color:maroon;
}
</style>
<link href="ads.css" rel="stylesheet" type="text/css"/>
<link href="style.css" rel="stylesheet" type="text/css"/>
<link href="page.css" rel="stylesheet" type="text/css"/>
<script src="jquery.js" type="text/javascript"></script>
<script>
function poup()
{


$(document).ready(function(){
 
  $(".hint").fadeOut(500);
  $(".error").fadeOut(500);
 
 });}
 
 
$(document).ready(function(){
 $("#jquery").click(function(){
  $("#jquery").fadeOut(700);
 
 
 });



});
 
</script>
</head>
<body>
<div id='header'>Soosal.Com Free Domain for you</div>
<div id='menu'>

<div class="nav">
<ul>
<li><a href="/soosal/ads">AdsZone</a>

</li>
<li>Clicks
<ul>
<li><a href="/soosal/ads/home.php?p=my-ads">My ads clicks</a></li>
<li><a href="/soosal/ads/home.php?p=page-clicks">My page clicks</a></li>
</ul></li>
<li>Impression
<ul>
<li><a href="/soosal/ads/home.php?p=ads-impression">My ads Impression</a></li>
<li><a href="/soosal/ads/home.php?p=page-impression">My page Impression</a></li>
</ul>
</li>
<li><a href="/soosal/ads/home.php?p=visits">Visits</a>
</li>
<li>Credits
<ul>
<li><a href="/soosal/ads/home.php?p=credits-spent">Spent credits</a></li>
<li><a href="/soosal/ads/home.php?p=credits-earn">Earn credits</a></li>
</ul></li>
<li><a href="/soosal/index.php?=home">Home</a></li>
<li><a href="/soosal/ads/home.php?p=setup">Settings</a></li>
<li><a href="/soosal/logout.php">Exit</a></li>
</ul>
</div>
</div>

<div id='som'>
<h1>Publisher ads code</h1>
<?php 
if (!empty($_GET['p']))
{
$pages_dir = 'pages';
$pages = scandir($pages_dir, 0);
unset($page[0], $page[1]);

$p =$_GET['p'];
  
  if(in_array($p.'.inc.php',$pages))
{
include ($pages_dir.'/'.$p.'.inc.php');

}
else{ echo "<vr>Nothing to Show";}
}




?> 
 
<ol>
<li class="publisher">You will not click ads of soosal.com at your websites.</li>
<li class="publisher">You will not encourage your freinds/users/visitors to click ads of soosal.com at your websites.</li>
<li class="publisher">You will not put ads on websites that contents sexual contents.</li>
</ol><div class="forms"> 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class='ok'>Ok!<input type="radio" name="type" value="yes"></div>
<div class='ok'>No<input type="radio" name="type" value="no"></div>
<div class='ok'>Width<select name="width">
<option value="200">200px</option>
<option value="230">230px</option>
<option value="250">250px</option>
<option value="280">280px</option>
<option value="300">300px</option>
<option value="350">350px</option>
</select></div>
<div class='ok'>Height<select name="height">
<option value="200">200px</option>
<option value="230">230px</option>
<option value="250">250px</option>
<option value="280">280px</option>
<option value="300">300px</option>
<option value="350">350px</option>
</select>
</div>
<br/>
<input type="submit" name="submit" value="" class="button">
</form>

<?php 

if (isset($_POST['submit']))
{
$height = $_POST['height'];
$width = $_POST['width'];
$what = $_POST['type'];
if (!empty($what)){
 if ($what == yes)
 
 {
 $query = mysql_query("SELECT username FROM soosal_ads WHERE username = '$user'");
 $rows = mysql_num_rows($query);
 if ($rows < 1)
 {
 mysql_query("INSERT INTO soosal_ads VALUES('','N/A','N/A','','','','','','50','$user','$date','')");
?>
 <div id="jquery">
 
 <div class="box">
 
 </div>
 
 </div>
<?PHP 
 }
 else
 {
 ?>
 
 <div id="jquery">
  <div class="box">
 <textarea rows="10" cols="30">
 <iframe src="/soosal/ads/adshow.php?pubid=<?php echo"$user"; ?>" width="<?php echo "$width";?>px" height="<?php echo "$height";?>px"></iframe>
 </textarea>
 </div>
</div>
 
 <?php 
 }?>
 <div class="code">
 <textarea rows="7" cols="26">
 <iframe src="/soosal/ads/adshow.php?pubid=<?php echo"$user"; ?>" width="<?php echo "$width";?>px" height="<?php echo "$height";?>px"></iframe>
</textarea>
 </div>
 <?php
 }
 else
 {
 header ("Location: /soosal/index.php?p=home");
 }}
}

?>
</div>
</div>


<div id='footer'></div>

</body>
</html>