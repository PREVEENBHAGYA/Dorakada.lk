<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

?>

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
        <link rel="icon" href="img/citymarkat.png">
        <title> Admin Sign In Page</title>
    </head>

    <body class="navbody">
        <div class="col-12 bg-gradient">
            <div class="main bg-gradient ">
                <div class="topbar">
                    <div class="toggle">
                        <!--heading-->
                        <div class="col-10">
                            <nav class="navbar bg-purple-700 fixed-top">
                                <div class="container-fluid">

                                    <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white" type="button">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="mr-2 w-8 h-8 rounded-full" src="img/Oshadha_636a0c2969522.png" alt="user photo">
                                        <?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?>
                                        <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>

                                    <!-- Dropdown menu -->
                                    <div id="dropdownAvatarName" class="hidden bg-success rounded">
                                        <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                                            <div class="font-medium ">ADMIN </div>
                                            <div class="truncate"><?php echo $_SESSION["au"]["email"]; ?></div>
                                        </div>
                                        <div class="py-1 col-12 ml-4 d-grid">
                                            <a href="adminfrofile.php"><button type="button" class="text-gray-900  border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600">Update Profile</button></a>
                                        </div>
                                    </div>
                                    <div class="adlou" onclick="AdminLogOut();">logout</div>



                                </div>
                            </nav>
                        </div>

                        <!--heading-->

                        <?php

                        $product_rs = Database::search("SELECT * FROM `product`");
                        $users_rs = Database::search("SELECT * FROM `users`");

                        $product = $product_rs->num_rows;
                        $users = $users_rs->num_rows;


                        ?>
                        <div class="col-12" style="padding: 15px;">
                            <div class="row sing " style="display: flex; align-items: center; justify-content: center;">


                                <div class="col-6 col-lg-3 px-1  rounded g-1 ml-4 offset-1 offset-lg-0">
                                    <div class="row g-1 col-12 ">
                                        <div class="col-1" style="background-color: #055160;"></div>
                                        <div class="col-11  text-white text-center " style="height: 100px; background-color: #032830;">
                                            <br>
                                            <span class="fs-4 fw-bold" style="color: #6edff6;"> ALL PRODUCT</span>
                                            <br>
                                            <span class="fs-5 fw-bold" style="color: #ffc107;"><?php echo $product ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3 px-1  rounded g-1 ml-4 offset-1 offset-lg-0">
                                    <div class="row g-1 col-12 ">
                                        <div class="col-1" style="background-color: #055160;"></div>
                                        <div class="col-11  text-white text-center " style="height: 100px; background-color: #032830;">
                                            <br>
                                            <span class="fs-4 fw-bold" style="color: #6edff6;"> ALL USERS</span>
                                            <br>
                                            <span class="fs-5 fw-bold" style="color: #ffc107;"><?php echo $users ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3 px-1  rounded g-1 ml-4 offset-1 offset-lg-0">
                                    <div class="row g-1 col-12 ">
                                        <div class="col-1" style="background-color: #055160;"></div>
                                        <div class="col-11  text-white text-center " style="height: 100px; background-color: #032830;">
                                            <br>
                                            <span class="fs-4 fw-bold" style="color: #6edff6;"> TODAY SELLING</span>
                                            <br>
                                            <span class="fs-5 fw-bold" style="color: #ffc107;"><?php echo $users ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3 px-1  rounded g-1 ml-4 offset-1 offset-lg-0">
                                    <div class="row g-1 col-12 ">
                                        <div class="col-1" style="background-color: #055160;"></div>
                                        <div class="col-11  text-white text-center " style="height: 100px; background-color: #032830;">
                                            <br>
                                            <span class="fs-4 fw-bold" style="color: #6edff6;"> TODAY INCOME</span>
                                            <br>
                                            <span class="fs-5 fw-bold" style="color: #ffc107;"><?php echo $users ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 bg-warning">
                        <hr />
                    </div>
                </div>
            </div>


            <div class="navigation bg-dark">
                <div class="toggal" onclick="toggleMenu();"><i class="bi bi-list text-white fs-1"></i></div>
                <ul>
                    <li>
                        <a href="#">
                            <i class='bx bxs-dashboard icon' style='color:#ffffff'></i>
                            <span class="title">Dashbord</span>
                        </a>
                    </li>
                    <li>
                        <a href="Manageusars.php">
                            <i class='bx bxs-user icon' style='color:#ffffff'></i>
                            <span class="title">Manage Usars </span>
                        </a>
                    </li>
                    <li>
                        <a href="ManageProduct.php">
                            <i class='bi bi-motherboard icon' style='color:#ffffff'></i>
                            <span class="title">Manage Products </span>
                        </a>
                    </li>
                    <li>
                        <a href="AddProduct.php">
                            <i class='bx bxs-add-to-queue icon' style='color:#ffffff'></i>
                            <span class="title"> Add Product </span>
                        </a>
                    </li>
                    <li>
                        <a href="UpdateProduct.php">
                            <i class='bx bxs-layer-plus icon' icon' style='color:#ffffff'></i>
                            <span class="title"> Update Product </span>
                        </a>
                    </li>
                    <li>
                        <a href="RemoveProduct.php">
                            <i class='bi bi-trash3 icon' style='color:#ffffff'></i>
                            <span class="title"> Remove Product </span>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>

    <?php
}

    ?>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    </body>

    </html>