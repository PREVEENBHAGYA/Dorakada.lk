<?php

session_start();
require "connection.php";

$email = $_SESSION["au"]["email"];

$newbrand = $_POST["brand"];

Database::iud("INSERT INTO `brand`(`brand_name`) VALUES ('".$newbrand."')");

echo ("Brand added success.");

?>