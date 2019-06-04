<?php

ob_start();
session_start();

$timezone1 = date_default_timezone_set("GMT");

$con = mysqli_connect("localhost", "root", "", "broker_news_hub");

if (mysqli_connect_errno()) {
	echo "Failed to connect to Database. Please try again later!";
}

?>