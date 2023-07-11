<?php

session_start();
require "connection.php";

$email = $_SESSION["au"]["email"];

$color = $_POST["color"];

Database::iud("INSERT INTO `color`(`color_name`) VALUES ('".$color."')");

echo ("color added success.");

?>