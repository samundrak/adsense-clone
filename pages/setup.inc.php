
<div id="sidebars">
<ol>
<li class="setting"><a href="/soosal/ads/home.php?p=setup&&sub=ads">My ads</a></li>
<!--
<li class="setting"><a href="/soosal/ads/home.php?p=setup&&sub=website">My website</a></li>
<li class="setting"><a href="/soosal/ads/home.php?p=setup&&sub=credits">My credits</a></li>
<li class="setting"><a href="/soosal/ads/home.php?p=setup&&sub=account">My account</a></li>-->
</ol>
</div>
<?php 
$sub = $_GET['sub'];
 if (empty($sub))
 {
 include 'sub/ads.inc.php';
 }
 else
 {
  switch($sub){
  case ads:
  include 'sub/ads.inc.php';
  break;
  case website:
  include 'sub/website.inc.php';
  break;
  case credits:
  include 'sub/credits.inc.php';
  break;
  case account:
  include 'sub/account.inc.php';
  break;
  default:
  include 'sub/ads.inc.php';
  break;
 }
 }
?>