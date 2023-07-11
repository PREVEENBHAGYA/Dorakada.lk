<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page| දොරකඩට</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="image/headlogo.png">

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php";

            require "connection.php";

            if (isset($_SESSION["u"])) {



                $user = $_SESSION["u"]["email"];

                $total = 0;
                $subtal = 0;

            ?>

                <nav class="flex bg-black col-12" aria-label="Breadcrumb">
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
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Cart Page</span>
                            </div>
                        </li>
                    </ol>
                </nav>



                <div class="col-12">
                    <h1 class="offset-5 fs-1 text-decoration-underline h1 fw-bolder text-warning">..Cart.. </h1>
                </div>

                <div class="col-12 text-success">
                    <hr />
                </div>

                <div class="mt-2 mb-6 col-12" style="display: flex; justify-content: center; align-items: center;">
                    <form class="flex items-center col-8">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Cart Items" required>
                        </div>
                        <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>

                <div class="col-12 text-success">
                    <hr />
                </div>

                <?php

                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $user . "'");
                $cart_num = $cart_rs->num_rows;

                if ($cart_num == 0) {

                ?>


                    <div class="col-12 bg-gray-200">
                        <div class="col-12 text-center mb-2">
                            <label class="form-label fs-1 fw-bold text-danger ">
                                Your Cart Is Empty.
                            </label>
                        </div>
                        <div class="col-12 offset-lg-4 offset-1 mb-5 col-lg-4" style="width: 350px; height: 200px;">
                            <img class="bx-flashing" src="image/cart_icon.png">
                        </div>
                        <div class="offset-lg-4  col-lg-4 mb-4 d-grid mt-4">
                            <a href="home.php" class="btn btn-outline-success fs-3 fw-bold ">
                                Start Shopping
                            </a>
                        </div>
                    </div>


                <?php

                } else {
                ?>

                    <!-- products -->

                    <div class="col-12 col-lg-7 mr-5 mt-2">
                        <div class="row">
                            <div class="col-12 row bg-danger" style="color: white;">
                                <div class="col-4 border-end">product name</div>
                                <div class="col-2 border-end">Price</div>
                                <div class="col-2 border-end">Qty</div>
                                <div class="col-2 border-end">Total</div>
                                <div class="col-2"></div>
                            </div>

                            <?php
                            for ($x = 0; $x < $cart_num; $x++) {
                                $cart_data = $cart_rs->fetch_assoc();

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "'");
                                $product_data = $product_rs->fetch_assoc();
                                $image_rs = Database::search("SELECT * FROM `images` WHERE `path`='" . $cart_data["product_id"] . "'");
                                $image_data = $image_rs->fetch_assoc();

                                $total = $total + ($product_data["price"] * $cart_data["qty"]);

                            ?>

                                <div class=" mb-3  col-12 ">
                                    <div class="row">
                                        <div class="col-12 row mt-2" style="align-items: center;">
                                            <div class=" col-2">
                                                <?php
                                                $img = array();

                                                $images_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $cart_data["product_id"] . "'");
                                                $images_data = $images_rs->fetch_assoc();

                                                ?>
                                                <img src="<?php echo $images_data["path"]; ?>" class="img-fluid rounded-start img-thumbnail mt-1 mb-1 border-warning">
                                            </div>
                                            <div class="col-2 border-end"><?php echo $product_data["title"]; ?></div>
                                            <div class="col-2 border-end">Rs.<?php echo $product_data["price"]; ?>.00</div>
                                            <div class="col-2 border-end">
                                                <button onclick="qty_dec();"><i class='bx bx-minus'></i></button>
                                                <input value="1" id="qty_input" onkeyup='checkValue(<?php echo $product_data["qty"]; ?>);' class="col-5 text-center" />
                                                <button onclick='qty_inc(<?php echo $product_data["qty"]; ?>);'><i class='bx bx-plus'></i></button>
                                            </div>
                                            <div class="col-2 border-end">Rs.<?php echo $product_data["price"]; ?>.00</div>
                                            <button type="button" class="btn btn-warning btn-sm txtco2 col-2" onclick='deleteCartProduct(<?php echo $cart_data["id"]; ?>);'><i class="bi bi-x-circle-fill"></i> REMOVE </button>
                                        </div>

                                    </div>
                                </div>

                            <?php }
                            ?>

                        </div>
                    </div>

                    <!-- products -->


                    <div class="col-8 col-lg-4 offset-lg-0 offset-2 mb-2 mt-2" style="display: flex; justify-content: center; align-items: center; background-color: #eff8ec;">
                        <div class="row border border-warning rounded">

                            <div class="col-12 text-center">
                                <label class="fs-3 fw-bold text-danger text-decoration-underline">Summary</label>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-8 mb-3 text-success">
                                <span class="fs-6 fw-bold">Items Count</span>
                            </div>

                            <div class="col-4 text-end mb-3 text-success">
                                <span class="fs-6 fw-bold"><?php echo $cart_num; ?></span>
                            </div>

                            <div class="col-8 mb-3 text-success">
                                <span class="fs-6 fw-bold">Total Discounts</span>
                            </div>

                            <div class="col-4 text-end mb-3 text-success">
                                <span class="fs-6 fw-bold">Rs 0.00</span>
                            </div>

                            <div class="col-12 mt-3">
                                <hr />
                            </div>

                            <div class="col-5 mt-2 text-danger">
                                <span class="fs-4 fw-bold">Sub Total</span>
                            </div>

                            <div class="col-7 mt-2 text-end text-danger">
                                <span class="fs-4 fw-bold">Rs. <?php echo $total ?> .00</span>
                            </div>

                            <div class="col-12 mt-3 mb-3 d-grid">
                                <button type="button" class="btn btn-success text-warning" id="payhere-payment" onclick="payNow(<?php echo $pid ?>);">Checkout</button>
                            </div>

                        </div>
                    </div>

                <?php
                }

                ?>


                <?php include "footer.php"; ?>
            <?php

            } else {

                echo ("LOGIN FIRST");
            }

            ?>

        </div>
    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>


</body>

</html>