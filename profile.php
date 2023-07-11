<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="tailwind.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="menubar.css">
    <link rel="icon" href="image/headlogo.png">
    <title> Profile | දොරකඩට</title>
</head>

<body class="">


    <div class="col-12">
        <nav class="flex bg-dark" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="home.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Home
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">STUDENT DEATAILS</span>
                    </div>
                </li>
            </ol>
        </nav>

        <?php
        session_start();

        require "connection.php";

        if (isset($_SESSION["u"])) {
            $email = $_SESSION["u"]["email"];


            $detail_rs = Database::search("SELECT * FROM `users` INNER JOIN `gender` ON
                    gender.id = users.gender_id WHERE `email` = '" . $email . "'");
            $usertdata = $detail_rs->fetch_assoc();

            $address_rs = Database::search("SELECT * FROM `users_address` INNER JOIN `city` ON 
                    users_address.city_id=city.id INNER JOIN `district` ON 
                    city.district_id=district.id  WHERE `users_email`='" . $email . "'");

            $addressdata = $address_rs->fetch_assoc();

            $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $email . "'");


            $image_data = $image_rs->fetch_assoc();


        ?>


            <div class="col-12 mt-5" style="padding: 15px;">
                <div class="row">
                    <div class="col-12 col-lg-4 border border-success rounded mb-2 " style="display: flex; justify-content: center; align-items: center; padding: 10px; background:linear-gradient(90deg, rgba(125,21,0,1) 0%, rgba(121,12,9,1) 35%, rgba(245,255,0,1) 100%);">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <div class="card-header text-center" style="background-color: #ed1610;">Profile Picture</div>
                                <div class="card-body text-center">
                                    <?php

                                    if (empty($image_data["path"])) {

                                    ?>

                                        <img src="image/Oshadha_636a0c2969522.png" class="rounded mt-5" style="width: 150px;" id="viewimg" />

                                    <?php

                                    } else {

                                    ?>

                                        <img src="<?php echo $image_data["path"]; ?>" class="rounded mt-5" style="width: 150px;" id="viewimg" />

                                    <?php

                                    }

                                    ?>
                                     <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                    <button class="btn btn-outline-info" onclick="changeImage();">add profile</button>
                                </div>
                                <div class="col-12 text-center">
                                    <label class="text-success text-center "><?php echo $usertdata["fname"] . " " . $usertdata["lname"] ?></label>
                                    <div class="small font-italic  mb-4 text-success"><?php echo $usertdata["email"]; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-8 col-12 ">
                        <div class="card mb-4 border border-success">
                            <div class="card-footer-item col-8 text-center fs-3 text-warning" style="background-color: #ed1610;">Account Details</div>
                            <div class="card-body">

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1 text-success" for="inputFirstName">First name</label>
                                        <input class="form-control" id="first_name" type="text" placeholder="Enter your first name" value="<?php echo $usertdata["fname"] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1 text-success" for="inputLastName">Last name</label>
                                        <input class="form-control border border-success" id="last_name" type="text" placeholder="Enter your last name" value="<?php echo $usertdata["lname"] ?>">
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="mb-3">
                                        <label class="small mb-1 text-success" for="inputEmailAddress">Email address</label>
                                        <input class="form-control  border border-success" type="email" placeholder="Enter your email address" value="<?php echo $usertdata["email"]; ?>" disabled>
                                    </div>

                                    <?php

                                    if (!empty($addressdata["name"])) {


                                    ?>

                                        <!-- <div class="col-12">
                                            <label class="small mb-1 text-success" for="inputLocation">Distric</label>
                                            <select name="" class="form-control  border border-success" id="">
                                                <option value=""><?php echo $addressdata["name"]; ?></option>
                                            </select>
                                         <input type="text" class="form-control" value="<?php echo $addressdata["name"]; ?>" id="line1" />
                                        </div> -->

                                    <?php

                                    } else {

                                    ?>
                                        <!-- 
                                        <div class="col-12">
                                            <label class="small mb-1 text-success" for="inputLocation">Distric</label>
                                            <input type="text" class="form-control" id="line1" />
                                        </div> -->

                                    <?php

                                    }

                                    ?>

                                    <?php

                                    if (!empty($addressdata["address"])) {

                                    ?>

                                        <!-- <div class="col-12">
                                            <label class="small mb-1 text-success" for="inputLocation">Location</label>
                                            <input type="text" class="form-control" value="<?php echo $addressdata["address"]; ?>" id="line1" />
                                        </div> -->

                                    <?php

                                    } else {

                                    ?>

                                        <div class="col-12">
                                            <label class="small mb-1 text-success" for="inputLocation">Location</label>
                                            <input type="text" class="form-control" id="line1" />
                                        </div>

                                    <?php

                                    }

                                    ?>



                                    <div class="col-md-6">
                                        <label class="small mb-1 text-success" for="inputLocation">Distric</label>
                                        <input class="form-control border border-success" type="text" placeholder="Enter your location" value="<?php echo $addressdata["name"] ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1 text-success" for="inputLocation">city</label>
                                        <input class="form-control border border-success" type="text" placeholder="Enter your location" value="<?php echo $addressdata["city_name"] ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1 text-success" for="inputLocation">Location</label>
                                        <input class="form-control border border-success" id="address" type="text" placeholder="Enter your location" value="<?php echo $addressdata["address"] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1 text-success" for="inputPhone">Phone number</label>
                                        <input class="form-control border border-success" id="mobile" type="tel" placeholder="Enter your phone number" value="<?php echo $usertdata["mobile"] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1 text-success" for="inputBirthday">Gender</label>
                                        <input class="form-control border border-success" type="text" value="<?php echo $usertdata["gender_name"] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-12" style="display: flex; justify-content: center; align-items: center;">
                                    <button class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="updateProfile();">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</body>

</html>
<?php
        }
?>