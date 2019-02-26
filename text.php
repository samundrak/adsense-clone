<?php $datess = date("Y-m-d"); //today
$date = new DateTime("$datess");
$date->modify("-1 day");
$date_week = new DateTime("$datess");

$echo = $date->format("Y-m-d");
echo "$echo";

$datess = date("Y-m-d"); //today
$date = new DateTime("$datess");
$date->modify("-7 day");
$date_week = new DateTime("$datess");

$echo = $date->format("Y-m-d");
echo "$echo";
?>