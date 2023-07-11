<?php

session_start();
require "connection.php";

$email = $_SESSION["au"]["email"];

$newcategory = $_POST["Category"];

Database::iud("INSERT INTO `category`(`name`) VALUES ('".$newcategory."')");

echo ("Category added success.");

?>