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
p.hints
{
width:205px;
line-height:35px;
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
 $(document).ready(function(){
 $(".close").click(function(){
  $(".hint").fadeOut(1000);
 
 
 });



});

</script>
</head>
<body>
<div id='header'>Soosal.Com Free Domain for you</div>
<div id='menu'>

<div class="nav">
<ul>
<li><a href="/soosal/ads/admin">Home</a>

</li>
<li>Members
<ul>
<li><a href="home.php?p=publishers">Publisher members</a></li>
<li><a href="home.php?p=advertisers">Advertiser members</a></li>
</ul></li>
<li>Clicks
<ul>
<li><a href="home.php?p=clicks">Publishers clicks</a></li>
<li><a href="home.php?p=adv">Advertisers clicks</a></li>
</ul></li>
<li>Impression
<ul>
<li><a href="home.php?p=ads-impression">Publishers ads</a></li>
<li><a href="home.php?p=page-impression">Advertisers ads </a></li>
</ul>
</li>
<li><a href="home.php?p=visits">Visits</a>
</li>
<li>Credits
<ul>
<li><a href="home.php?p=credits-spent">Spent credits</a></li>
<li><a href="home.php?p=credits-earn">Earn credits</a></li>
</ul></li>
<li><a href="/soosal/index.php?=home">Home</a></li>
<li><a href="/soosal/ads/home.php?p=setup">Settings</a></li>
<li><a href="/soosal/logout.php">Exit</a></li>
</ul>
</div>
</div>

<div id='som'>
<h1>Admin panel!</h1>
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
 



 

</div>
</div>


<div id='footer'></div>

</body>
</html>