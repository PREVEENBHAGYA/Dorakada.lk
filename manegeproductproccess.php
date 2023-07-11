<?php
    require "connection.php";

    if(isset($_GET["email"])){
        Database::iud ("DELETE `images` FROM `product_id` ");
        echo ("success");

        
    }else{
        echo ("somthing went wrong");
    }
?>
