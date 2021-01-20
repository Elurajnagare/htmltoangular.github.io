<?php 
$baseUrl = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$filename = basename($_SERVER['PHP_SELF']);
$filename1 = basename($filename,".php");

$callUsNow ='';
$contactUs ='<a href="contact" class="btn">Contact Us</a>';

if($pageTitle == ''){ $pageTitle = "Welcome to John A Probert"; }
if($metaDesc == ''){ $metaDesc = "John A Probert sons and grandsons is a family run Turf and Top Soil business established in 1980 located in the Basildon area"; }
if($metaKey == ''){ $metaKey = ""; }

?>

