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
<h1>Create your ads</h1>
<div class="tables">
<form action="" name="createads" method="POST">
<table>
    <tr><td class="words">
         Ads name:*
        </td><td>
		<input type="text" name="pokhara" value="<?php echo "$ads_name";?>">
		</td></tr>
    <tr><td class="words">
	     Ads url:*
	</td><td>
	  <input type="url" name="url" value="http://">
	</td></tr>
    <tr><td class="words">
        Ads type:*
    </td><td>
	<select name="adstype">
	<option name="type" value="250x250">250 x 250</option>
	</select>
	</td></tr>
     
   <tr><td class="words">
      Ads category:*
</td><td>
   <select name="adscategory">
	<option name="category" value="blog">Entertainment</option>
	<option name="category" value="news">News</option>
	<option name="category" value="blog">Blog</option>
	<option name="category" value="webhost">Webhost</option>
	<option name="category" value="ptc">Ptc</option>
	<option name="category" value="social">Social network</option>
	</select>
</td></tr>
<tr><td class="words">
      Ads description:*
</td><td>
<textarea name="description" rows="10" cols="30"></textarea>
</td></tr>
<tr><td class="words">
       Ads banner:*
</td><td>
    <input type="file" name="banner" >
</td></tr>
<tr><td></td>
<td><input type="submit" name="submit" value="Submit" class="reg"></td></tr>
</table>
</form>
<?php 
$name = strip_tags(htmlentities(trim($_POST['pokhara'])));
$ads_url = strip_tags(htmlentities(trim($_POST['url'])));
$ads_type = strip_tags(htmlentities(trim($_POST['adstype'])));
$ads_category = strip_tags(htmlentities(trim($_POST['adscategory'])));
$ads_description = strip_tags(htmlentities(trim($_POST['description'])));
//$ads_keyword = 'n/a';
//$email = '';
$date = date("Y-m-d");
$time = date("g:i:sa");
$ip_address = $_SERVER['REMOTE_ADDR'];
$ads_banner = ok;//$_FILE[''][''];
$error = array();
$hint = array();
if (isset($_POST['submit']))
{
$query = mysql_query("SELECT username FROM ads_details WHERE username = '$user' AND date = '$date'");
$rows = mysql_num_rows($query);
if ($rows  < 1){
   if (!empty($name)) 
   {
   if(!empty($ads_url))
   {
   if (!empty($ads_type))
   {
   if (!empty($ads_category))
   {
   if (!empty($ads_description))
   {
    if (strlen($name)>2||strlen($name)<15)
	{
	  if (strlen($description)>10 || strlen($description)<100)
	  {
	  $query = mysql_query("SELECT username from ads_details where username = '$user'");
       $rows = mysql_num_rows($query);
	   if ($rows < 1){
	  mysql_query("INSERT INTO  `ads_details` (
`id` ,
`ads_name` ,
`ads_url` ,
`ads_type` ,
`ads_category` ,
`ads_banner` ,
`ads_description` ,
`username` ,
`date` ,
`time` ,
`ip_address`
)
VALUES (
'',  '$name',  '$ads_url',  '$ads_type',  '$ads_category',  '$ads_banner',  '$ads_description',   '$user',  '$date',  '$time',  '$ip_address'
)
");}
else
{
mysql_query("UPDATE ads_details SET ads_name='$name',ads_url='$ads_url',ads_type='$ads_type',ads_category='$ads_category',

ads_banner = '$ads_banner',ads_description = '$ads_description',username='$user',date='$date',time='$time',ip_address = '$ip_address' WHERE username = '$user'
");

}
 $queryee = mysql_query("SELECT username FROM soosal_ads WHERE username = '$user'");
 $rowsee = mysql_num_rows($queryee);
 if ($rowsee < 1)
 {
mysql_query("INSERT INTO soosal_ads VALUES('','$ads_banner','$ads_url','','','','','','','$user','$date','')");}
else
{
mysql_query("UPDATE soosal_ads SET banner='$ads_banner',url='$ads_url',date='$date' WHERE username = '$user'");
}	  
echo "<div class='ok'>Your ads request has been sucessfull.we will take review of your website and as soon as it will approved your ads will run sucessfully!</div>";
}
	  else
	  {
	  
	  $error[1] = "ads description must be above 10 characters and below 100 characters!";
	  $hint[0] = "you can put upto 100 characters for your ads description. text above 10 characters and below 100 characters are only
	  accepted. you can type important and most used sentences to make description that will help your ads become more powerfull and clickable!
	  ";
	  }
	}
	else
	
	{
	$error[2] = "Ads name must be under 2 to 15 characters!";
	$hint[0] = "ads name must be above of 2 characters and below 15 charatcers. you can put your ads name short which will give your each ads unique name.
	for e.g first,second,third!
	";
	}
	}else
	{
	$error[3] ="ads description must not be empty!";
	$hint[0] = "you can put upto 100 characters for your ads description. text above 10 characters and below 100 characters are only
	  accepted. you can type important and most used sentences to make description that will help your ads become more powerfull and clickable!
";
	}
	}
	else{
	$error[4] ="you have to select the category of ads!";
	$hint[0] = "ads category! it means you have to give category for your ads. your ads may be of entertainment,news,blog or what your website is about!";
	}
	}
	else
	{
	$error[5] ="you have to select the type of ads!";
	$hint[0]= "ads type! it means you have to select the type of your ads. while making banner for your ads you make your image under some pixels
	like 200px in width and 200px height. you have to select actual ads type of your ads or you have to make actual ads type that is give here.
	";
	}
	}
	else
	{
	$error[6] ="ads url must not be empty!";
	$hint[0] = "ads url! this is url where the visitor will come after clicking your ads. you can give any url of your website as ads url but 
	it will be more better if you will provide the url of your website homepage.
	";
	}
	
   }else{$error[7] ="ads name must not be empty!";
   $hint[0]= "ads name must be above of 2 characters and below 15 charatcers. you can put your ads name short which will give your each ads unique name.
	 for e.g first,second,third!";
   }
   }
   else
   {
   $error[8] = "only 1 ads request for today!";
   $hint[0] = "you can only make one ads per day. it is not compulsoury to make ads for each day.
   you can make only one ads but if you want more ads then only one ads per day and 1 ads per user!
   ";
   }}
   else
   {
   $error[9] = "";
   $hint[0] = "everything here are required item. you cannot leave blank anything which are marked by (*).
   
   ";
   }


foreach ($error as $show)
{
echo "<div class='error'>";
echo ucwords($show);
echo "</div>";
echo "<br/></div>";

}
?>
<?php 
if ($error){
echo "<div class='hint' ><div class='close' onclick='poup();'>X</div><p class='hints'>Hints</p>";
echo ucwords($hint[0]);
echo "</div>";
}
?>

</div>


<div id='footer'></div>

</body>
</html>