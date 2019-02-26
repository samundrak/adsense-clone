<?php //session_start();include 'db.inc.php'; $user = $_SESSION['username']; 
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
<link href="home.css" rel="stylesheet" type="text/css"/>
<link href="page.css" rel="stylesheet" type="text/css"/>
<link href="setup.css" rel="stylesheet" type="text/css"/>
<script src="jquery.js" type="text/javascript"></script>
<script>
function poup()
{


$(document).ready(function(){
 
  $("#jquery").hide(1000);
 
 });}




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
<li><a href="/soosal/ads">AdsZone</a>

</li>
<li>Clicks
<ul>
<li><a href="home.php?p=my-ads">My ads clicks</a></li>
<li><a href="home.php?p=page-clicks">My page clicks</a></li>
</ul></li>
<li>Impression
<ul>
<li><a href="home.php?p=ads-impression">My ads Impression</a></li>
<li><a href="home.php?p=page-impression">My page Impression</a></li>
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


<div id='footer'></div>

</body>
</html>