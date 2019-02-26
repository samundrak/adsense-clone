<?php function week()
{$datess = date("Y-m-d"); //today
$date = new DateTime("$datess");
$date->modify("-7 day");
$date_week = new DateTime("$datess");

$echo = $date->format("Y-m-d");
return $echo;}

function month()
{$datess = date("Y-m-d"); //today
$date = new DateTime("$datess");
$date->modify("-30 day");
$date_week = new DateTime("$datess");

$echo = $date->format("Y-m-d");
return $echo;}

?>