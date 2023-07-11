
<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    $fname = $_POST["first_name"];
    $lname = $_POST["last_name"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];


Database::iud("UPDATE `users` INNER JOIN `users_address` set `fname`='".$fname."', `lname`='".$lname."',`mobile` = '" . $mobile . "',`address`='".$address."' WHERE `users`.`email` = '".$_SESSION["u"]["email"]."'");

echo "Successfully Updated";

}

?>