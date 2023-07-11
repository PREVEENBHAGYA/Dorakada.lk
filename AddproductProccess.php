<?php

session_start();
require "connection.php";

$email = $_SESSION["au"]["email"];

$category = $_POST["category"];
$brand = $_POST["brand"];
$color = $_POST["color"];
$condition = $_POST["condition"];
$qty = $_POST["qty"];
$price = $_POST["price"];
$title = $_POST["title"];
$desc = $_POST["desc"];


if($category == "0"){
    echo ("Select a Product Category");
}else if(empty($brand)){
    echo ("Select a Product Brand");
}else if(empty($color)){
    echo ("Select a Product color");
}else if(empty($condition)){
    echo ("Select a Product condition");
}else if(empty($qty)){
    echo ("Select a Product Quantity");
}else if($qty == "0" | $qty == "e" | $qty < 0){
    echo ("Invalid value for field Quantity");
}else if(empty($price)){
    echo ("Select a Product price");
}else if(!is_numeric($price)){
    echo ("Invalid value for field price Per Item");
}else if(empty($title)){
    echo ("Select a Product Title");
}else if(strlen($title) >= 100){
    echo ("Title should have less than 100 characters");
}else if(empty($desc)){
    echo ("Select a Product Description");
}else{
    
    

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    Database::iud("INSERT INTO `product` (`price`,`qty`,`description`,`title`,`datetime_added`,
    `category_id`,`brand_id`,`status`,`admin_email`,`colour_id`,`condition_id`) 
    VALUES ('".$price."','".$qty."','".$desc."','".$title."','".$date."','".$category."',
    '".$brand."','".$status."','".$email."','".$color."','".$condition."')");

    echo ("Product Added Successfully.");

    $product_id = Database::$connection->insert_id;

    $length = sizeof($_FILES);

    if($length <= 3 && $length > 0){

        $allowed_image_extentions = array("image/jpg","image/jpeg","image/png","image/svg+xml");

        for($x = 0;$x < $length;$x++){
            if(isset($_FILES["image".$x])){

                $image_file = $_FILES["image".$x];
                $file_extention = $image_file["type"];

                if(in_array($file_extention,$allowed_image_extentions)){

                    $new_img_extention;

                    if($file_extention =="image/jpg"){
                        $new_img_extention = ".jpg";
                    }else if($file_extention =="image/jpeg"){
                        $new_img_extention = ".jpeg";
                    }else if($file_extention =="image/png"){
                        $new_img_extention = ".png";
                    }else if($file_extention =="image/svg+xml"){
                        $new_img_extention = ".svg";
                    }

                    $file_name = "uploadimages//".$title."_".$x."_".uniqid().$new_img_extention;
                    move_uploaded_file($image_file["tmp_name"],$file_name);

                    Database::iud("INSERT INTO `images`(`path`,`product_id`) VALUES ('".$file_name."','".$product_id."')");
                    
                }else{
                    echo ("Not an allowed image type");
                }

            }
        }

        echo ("Product images saved successfully");

    }else{
        echo ("Invalid Image Count");
    }

}

?>