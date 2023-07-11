<?php

require "connection.php";

$fname = $_POST["Firstname1"];
$lname = $_POST["Lastname1"];
$email = $_POST["email1"];
$password = $_POST["password1"];
$mobile = $_POST["mobile1"];
$gender = $_POST["Gender1"];

if(empty($fname)){
    echo ("<i class='bx bxs-error bx-flashing'></i> Enter First Name");
}else if(empty($lname)){
    echo ("<i class='bx bxs-error bx-flashing'></i> Enter Last Name");
}else if(strlen($lname) > 30){
    echo ("<i class='bx bxs-error bx-flashing'></i> Last Name  less than 30 characters");
}else if(empty($mobile)){
    echo ("<i class='bx bx-mobile bx-flashing' ></i> Enter your Mobile");
}else if(strlen($mobile) != 10){
    echo ("<i class='bx bx-mobile bx-flashing' ></i> Mobile must have 10 characters");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)){
    echo ("<i class='bx bx-mobile bx-flashing' ></i> Invalid Mobile");
}else if (empty($email)){
    echo ("<i class='bx bxl-gmail bx-flashing' ></i> Enter your Email");
}else if(strlen($email) >= 100){
    echo ("<i class='bx bxl-gmail bx-flashing' ></i> Email must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("<i class='bx bxl-gmail bx-flashing' ></i> Invalid Email");
}else if (empty($password)){
    echo ("<i class='bx bxs-key bx-flashing' ></i> Enter your Password");
}else if(strlen($password) < 8 ){
    echo ("<i class='bx bxs-key bx-flashing' ></i> Password must be 8 charcters");
}else{

$rs = Database::search("SELECT * FROM `users` WHERE `email`='".$email."' OR `mobile`='".$mobile."'");
$n = $rs->num_rows;

if($n > 0){
    echo ("<i class='bx bxs-error-alt bx-flashing' ></i> A user with the same email address is already registered.");
}else{
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `users` 
    (`fname`,`lname`,`email`,`mobile`,`password`,`gender_id`,`joing_date`) VALUES 
    ('".$fname."','".$lname."','".$email."','".$mobile."','".$password."','".$gender."','".$date."')");

    echo("success");

}
    
}

?>