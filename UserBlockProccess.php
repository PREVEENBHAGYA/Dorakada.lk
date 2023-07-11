<?php
    require "connection.php";

    if(isset($_GET["email"])){
        $users_email = $_GET["email"];
        $users_rs = Database::search("SELECT * FROM `users` WHERE `email`='".$users_email."'");
        $users_num = $users_rs->num_rows;

        if($users_num == 1){
            $users_data = $users_rs->fetch_assoc();

            if($users_data["status"] == 1){
                Database::iud("UPDATE `users` SET `status`='0' WHERE `email`='".$users_email."'");
                echo("blocked");
            }else if ($users_data["status"] == 0) {
                Database::iud("UPDATE `users` SET `status` = '1' WHERE `email` = '".$users_email."'");
                echo("unblocked");
            }
            
        }
    }else{
        echo ("somthing went wrong");
    }
?>