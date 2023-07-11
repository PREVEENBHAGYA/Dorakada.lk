<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | දොරකඩට </title>

    <link rel="stylesheet" href="tailwind.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="image/headlogo.png">
</head>

<body>
    <div class="col-12 container-fluid">
        <?php include "header.php"; ?>

        <div class="col-12">

            <nav class="p-3 border-gray-200 rounded  dark:border-gray-700">
                <div class="container flex flex-wrap items-center justify-between mx-auto ">
                    <div class="flex col-8 ">

                        <select id="basicsearch_select" class=" bg-gray-50 border border-success text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                            <option selected>Choose Category</option>
                            <?php

                            require "connection.php";

                            $category_rs = Database::search("SELECT * FROM `category`");
                            $category_num = $category_rs->num_rows;

                            for ($x = 0; $x < $category_num; $x++) {
                                $category_data = $category_rs->fetch_assoc();
                            ?>

                                <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>

                            <?php
                            }

                            ?>

                        </select>
                        <div class="relative w-full">
                            <input type="search" id="basicsearch_txt" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-success focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Our Products..." style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                            <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white  rounded-r-lg bg-success focus:ring-4 focus:outline-none " onclick="basicSearch(0);">
                                <i class="bi bi-search fs-6 text-warning"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-3">

                        <a href="advancedSearch.php"><button class="btn btn-outline-info">Advanced Search</button></a>
                    </div>
                </div>
            </nav>
            <div id="basicSearchResult">

                <!--carrosal-->
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="image/carosal.png" class="d-block caimg" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="image/carosal2.png" class="d-block caimg" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="image/carosal3.png" class="d-block caimg" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!--carrosal-->

                <!--shop category-->
                <div class="col-lg-12  mt-4 mb-4">
                    <div class="row" style="display: flex; align-items: center; justify-content: center;">
                        <div class=" text-center text-[#626890] fw-bold fs-3 text-decoration-underline mb-4 " style="font-family: 'BLACKOPS'; ">Shop By Category</div>
                        <?php

                        $category_rs = Database::search("SELECT * FROM `category`");
                        $category_num = $category_rs->num_rows;

                        for ($x = 0; $x < $category_num; $x++) {
                            $category_data = $category_rs->fetch_assoc();
                        ?>

                            <div class="cacards" style="width: 18rem; height: 20rem; margin-left: 10px; margin-bottom: 20px; ">
                                <?php

                                $image_rs = Database::search("SELECT * FROM `categary_img` WHERE `category_id`='" . $category_data["id"] . "'");
                                $image_data = $image_rs->fetch_assoc();

                                ?>
                                <img src="<?php echo $image_data["path"]; ?>" class="card-img-top" style="height: 236px;">
                                <div class="card-body">
                                    <p class="card-text fs-3 fw-bold text-center text-white text-decoration-underline" style="font-family: cursive;"><?php echo $category_data["name"]; ?></p>
                                </div>
                            </div>
                        <?php
                        }

                        ?>

                    </div>
                </div>
                <!--shop category-->

                <video class="w-full caimg" autoplay controls controls loop>
                    <source src="video/Ecommerce Shopping Animation Video. Online Shopping On Mobile App And Website by shahedur10.mp4" type="video/mp4">
                </video>

                <h1 class="text-danger text-center mb-5 mt-3"> our products</h1>

                <!---laptops-->
                <div class="bg-warning fw-bolder">
                    <hr />
                </div>

                <div class="row" style="background-color: #dc3545;">
                    <h1 class="lead fs-1" style="text-shadow: 0 7px 14px rgb(29, 23, 23);">
                        <p>Computers & Tablet</p>
                    </h1>
                </div>

                <div class="col-12 mt-3 mb-3" id="card">
                    <div class="row">
                        <?php
                        //SELECT * FROM `product` WHERE product.category_id IN(SELECT category.id FROM category WHERE category.name = 'vegetables');
                        $product_rs = Database::search("SELECT * FROM `product` WHERE product.category_id IN(SELECT category.id FROM category WHERE category.name = 'Computers & Tablet')   
                            ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0");
                        $product_num = $product_rs->num_rows;

                        for ($z = 0; $z < $product_num; $z++) {
                            $product_data = $product_rs->fetch_assoc();

                        ?>

                            <div class="card prcard border-danger col-12 mt-3" style="width: 17rem; margin-left: 15px;">
                                <?php



                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                `user_email`='" . $_SESSION["u"]["email"] . "'");
                                $watchlist_num = $watchlist_rs->num_rows;

                                if ($watchlist_num == 1) {
                                ?>
                                    <div class="fs-3 text-end col-11 mt-2" style="cursor: pointer;" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'><i class="bi bi-balloon-heart-fill text-warning" id='heart<?php echo $product_data["id"]; ?>'></i></div>
                                <?php
                                } else {
                                ?>
                                    <div class="fs-3 text-end col-11 mt-2" style="cursor: pointer;" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'><i class="bi bi-balloon-heart-fill text-dark" id='heart<?php echo $product_data["id"]; ?>'></i></div>
                                <?php
                                }

                                ?>
                                <?php

                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                $image_data = $image_rs->fetch_assoc();

                                ?>
                                <img src="<?php echo $image_data["path"]; ?>" class="card-img-top" style="width: 13rem; height: 13rem;">
                                <div class="col-11">
                                    <hr class="">
                                </div>
                                <div class="card-body" style="margin-top: -30px;">
                                    <h4 class="card-title text-center text-danger"><?php echo $product_data["title"]; ?></h4>
                                    <div class="row text-center">


                                        <?php

                                        if ($product_data["qty"] > 0) {

                                        ?>
                                            <h6 class="card-title text-center text-warning"><i class="bi bi-check2-square"></i> In Stock</h6> <br />
                                            <h5 class="card-title text-center">Rs.<?php echo $product_data["price"]; ?>.00</h5>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 row">
                                    <a class="add-to-cart btn btn-outline-primary rounded-2 col-12 col-lg-6 mt-1" style="margin-left: -7px;" href="#" role="button" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-cart4"></i>Addcart</a>
                                    <!-- <a class="btn btn-outline-success rounded-4 col-lg-6 mt-1" href="#" role="button" onclick="addWatchlist(<?php echo $product_data['id']; ?>)"><i class='bx bxs-heart-circle bx-burst'></i>Wathlist</a> -->
                                    <a class="btn btn-outline-danger rounded-2 col-12 col-lg-6 mt-1" style="margin-left: 7px;" href="<?php echo "singalproduct.php?id=" . $product_data['id']; ?>" role="button"><i class="bi bi-bag-heart-fill"></i>BuyNow</a>

                                <?php

                                        } else {
                                ?>
                                    <span class="card-text text-danger fw-bold co-5">Out of Stock</span> <br />
                                    <span class="card-text text-danger fw-bold">0kg Available</span><br /><br />
                                </div>

                                <div class="col-12 mb-2 row">
                                    <a class="add-to-cart btn btn-outline-primary rounded-2 col-12 col-lg-5 mt-1" style="margin-left: 10px;" href="#" role="button" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-cart4"></i> Add cart</a>
                                    <!-- <a class="btn btn-outline-success rounded-4 col-lg-6 mt-1 disabled" href="#" role="button"><i class='bx bxs-heart-circle bx-burst'></i>Wathlist</a> -->
                                    <a class="btn btn-outline-danger rounded-2 col-12 col-lg-5 mt-1" style="margin-left: 30px;" href="singalproduct.php" role="button"><i class="bi bi-bag-heart-fill"></i> Buy Now</a>
                                </div>
                            <?php
                                        }

                            ?>
                            </div>
                    </div>
                <?php
                        }

                ?>

                </div>
                <!---laptops-->

                 <!---phone-->
                 <div class="bg-warning fw-bolder">
                    <hr />
                </div>

                <div class="row" style="background-color: #dc3545;">
                    <h1 class="lead fs-1" style="text-shadow: 0 7px 14px rgb(29, 23, 23);">
                        <p>Cell Phones & Accessories</p>
                    </h1>
                </div>

                <div class="col-12 mt-3 mb-3" id="card">
                    <div class="row">
                        <?php
                        //SELECT * FROM `product` WHERE product.category_id IN(SELECT category.id FROM category WHERE category.name = 'vegetables');
                        $product_rs = Database::search("SELECT * FROM `product` WHERE product.category_id IN(SELECT category.id FROM category WHERE category.name = 'Cell Phones & Accessories')   
                            ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0");
                        $product_num = $product_rs->num_rows;

                        for ($z = 0; $z < $product_num; $z++) {
                            $product_data = $product_rs->fetch_assoc();

                        ?>

                            <div class="card prcard border-danger col-12 mt-3" style="width: 17rem; margin-left: 15px;">
                                <?php



                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                `user_email`='" . $_SESSION["u"]["email"] . "'");
                                $watchlist_num = $watchlist_rs->num_rows;

                                if ($watchlist_num == 1) {
                                ?>
                                    <div class="fs-3 text-end col-11 mt-2" style="cursor: pointer;" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'><i class="bi bi-balloon-heart-fill text-warning" id='heart<?php echo $product_data["id"]; ?>'></i></div>
                                <?php
                                } else {
                                ?>
                                    <div class="fs-3 text-end col-11 mt-2" style="cursor: pointer;" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'><i class="bi bi-balloon-heart-fill text-dark" id='heart<?php echo $product_data["id"]; ?>'></i></div>
                                <?php
                                }

                                ?>
                                <?php

                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                $image_data = $image_rs->fetch_assoc();

                                ?>
                                <img src="<?php echo $image_data["path"]; ?>" class="card-img-top" style="width: 13rem; height: 13rem;">
                                <div class="col-11">
                                    <hr class="">
                                </div>
                                <div class="card-body" style="margin-top: -30px;">
                                    <h4 class="card-title text-center text-danger"><?php echo $product_data["title"]; ?></h4>
                                    <div class="row text-center">


                                        <?php

                                        if ($product_data["qty"] > 0) {

                                        ?>
                                            <h6 class="card-title text-center text-warning"><i class="bi bi-check2-square"></i> In Stock</h6> <br />
                                            <h5 class="card-title text-center">Rs.<?php echo $product_data["price"]; ?>.00</h5>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 row">
                                    <a class="add-to-cart btn btn-outline-primary rounded-2 col-12 col-lg-6 mt-1" style="margin-left: -7px;" href="#" role="button" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-cart4"></i>Addcart</a>
                                    <!-- <a class="btn btn-outline-success rounded-4 col-lg-6 mt-1" href="#" role="button" onclick="addWatchlist(<?php echo $product_data['id']; ?>)"><i class='bx bxs-heart-circle bx-burst'></i>Wathlist</a> -->
                                    <a class="btn btn-outline-danger rounded-2 col-12 col-lg-6 mt-1" style="margin-left: 7px;" href="<?php echo "singalproduct.php?id=" . $product_data['id']; ?>" role="button"><i class="bi bi-bag-heart-fill"></i>BuyNow</a>

                                <?php

                                        } else {
                                ?>
                                    <span class="card-text text-danger fw-bold co-5">Out of Stock</span> <br />
                                    <span class="card-text text-danger fw-bold">0kg Available</span><br /><br />
                                </div>

                                <div class="col-12 mb-2 row">
                                    <a class="add-to-cart btn btn-outline-primary rounded-2 col-12 col-lg-5 mt-1" style="margin-left: 10px;" href="#" role="button" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-cart4"></i> Add cart</a>
                                    <!-- <a class="btn btn-outline-success rounded-4 col-lg-6 mt-1 disabled" href="#" role="button"><i class='bx bxs-heart-circle bx-burst'></i>Wathlist</a> -->
                                    <a class="btn btn-outline-danger rounded-2 col-12 col-lg-5 mt-1" style="margin-left: 30px;" href="singalproduct.php" role="button"><i class="bi bi-bag-heart-fill"></i> Buy Now</a>
                                </div>
                            <?php
                                        }

                            ?>
                            </div>
                    </div>
                <?php
                        }

                ?>

                </div>
                <!---phone-->

                <!---Home & Garden-->
                <div class="bg-warning fw-bolder">
                    <hr />
                </div>

                <div class="row" style="background-color: #dc3545;">
                    <h1 class="lead fs-1" style="text-shadow: 0 7px 14px rgb(29, 23, 23);">
                        <p>Home & Garden</p>
                    </h1>
                </div>

                <div class="col-12 mt-3 mb-3" id="card">
                    <div class="row">
                        <?php
                        //SELECT * FROM `product` WHERE product.category_id IN(SELECT category.id FROM category WHERE category.name = 'vegetables');
                        $product_rs = Database::search("SELECT * FROM `product` WHERE product.category_id IN(SELECT category.id FROM category WHERE category.name = 'Home & Garden')   
                            ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0");
                        $product_num = $product_rs->num_rows;

                        for ($z = 0; $z < $product_num; $z++) {
                            $product_data = $product_rs->fetch_assoc();

                        ?>

                            <div class="card prcard border-danger col-12 mt-3" style="width: 17rem; margin-left: 15px;">
                                <?php



                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                `user_email`='" . $_SESSION["u"]["email"] . "'");
                                $watchlist_num = $watchlist_rs->num_rows;

                                if ($watchlist_num == 1) {
                                ?>
                                    <div class="fs-3 text-end col-11 mt-2" style="cursor: pointer;" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'><i class="bi bi-balloon-heart-fill text-warning" id='heart<?php echo $product_data["id"]; ?>'></i></div>
                                <?php
                                } else {
                                ?>
                                    <div class="fs-3 text-end col-11 mt-2" style="cursor: pointer;" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'><i class="bi bi-balloon-heart-fill text-dark" id='heart<?php echo $product_data["id"]; ?>'></i></div>
                                <?php
                                }

                                ?>
                                <?php

                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                $image_data = $image_rs->fetch_assoc();

                                ?>
                                <img src="<?php echo $image_data["path"]; ?>" class="card-img-top" style="width: 13rem; height: 13rem;">
                                <div class="col-11">
                                    <hr class="">
                                </div>
                                <div class="card-body" style="margin-top: -30px;">
                                    <h4 class="card-title text-center text-danger"><?php echo $product_data["title"]; ?></h4>
                                    <div class="row text-center">


                                        <?php

                                        if ($product_data["qty"] > 0) {

                                        ?>
                                            <h6 class="card-title text-center text-warning"><i class="bi bi-check2-square"></i> In Stock</h6> <br />
                                            <h5 class="card-title text-center">Rs.<?php echo $product_data["price"]; ?>.00</h5>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 row">
                                    <a class="add-to-cart btn btn-outline-primary rounded-2 col-12 col-lg-6 mt-1" style="margin-left: -7px;" href="#" role="button" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-cart4"></i>Addcart</a>
                                    <!-- <a class="btn btn-outline-success rounded-4 col-lg-6 mt-1" href="#" role="button" onclick="addWatchlist(<?php echo $product_data['id']; ?>)"><i class='bx bxs-heart-circle bx-burst'></i>Wathlist</a> -->
                                    <a class="btn btn-outline-danger rounded-2 col-12 col-lg-6 mt-1" style="margin-left: 7px;" href="<?php echo "singalproduct.php?id=" . $product_data['id']; ?>" role="button"><i class="bi bi-bag-heart-fill"></i>BuyNow</a>

                                <?php

                                        } else {
                                ?>
                                    <span class="card-text text-danger fw-bold co-5">Out of Stock</span> <br />
                                    <span class="card-text text-danger fw-bold">0kg Available</span><br /><br />
                                </div>

                                <div class="col-12 mb-2 row">
                                    <a class="add-to-cart btn btn-outline-primary rounded-2 col-12 col-lg-5 mt-1" style="margin-left: 10px;" href="#" role="button" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-cart4"></i> Add cart</a>
                                    <!-- <a class="btn btn-outline-success rounded-4 col-lg-6 mt-1 disabled" href="#" role="button"><i class='bx bxs-heart-circle bx-burst'></i>Wathlist</a> -->
                                    <a class="btn btn-outline-danger rounded-2 col-12 col-lg-5 mt-1" style="margin-left: 30px;" href="singalproduct.php" role="button"><i class="bi bi-bag-heart-fill"></i> Buy Now</a>
                                </div>
                            <?php
                                        }

                            ?>
                            </div>
                    </div>
                <?php
                        }

                ?>

                </div>
                <!---Home & Garden-->

<!---Electronic Accessories-->
<div class="bg-warning fw-bolder">
                    <hr />
                </div>

                <div class="row" style="background-color: #dc3545;">
                    <h1 class="lead fs-1" style="text-shadow: 0 7px 14px rgb(29, 23, 23);">
                        <p>Electronic Accessories</p>
                    </h1>
                </div>

                <div class="col-12 mt-3 mb-3" id="card">
                    <div class="row">
                        <?php
                        //SELECT * FROM `product` WHERE product.category_id IN(SELECT category.id FROM category WHERE category.name = 'vegetables');
                        $product_rs = Database::search("SELECT * FROM `product` WHERE product.category_id IN(SELECT category.id FROM category WHERE category.name = 'Electronic Accessories')   
                            ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0");
                        $product_num = $product_rs->num_rows;

                        for ($z = 0; $z < $product_num; $z++) {
                            $product_data = $product_rs->fetch_assoc();

                        ?>

                            <div class="card prcard border-danger col-12 mt-3" style="width: 17rem; margin-left: 15px;">
                                <?php



                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                `user_email`='" . $_SESSION["u"]["email"] . "'");
                                $watchlist_num = $watchlist_rs->num_rows;

                                if ($watchlist_num == 1) {
                                ?>
                                    <div class="fs-3 text-end col-11 mt-2" style="cursor: pointer;" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'><i class="bi bi-balloon-heart-fill text-warning" id='heart<?php echo $product_data["id"]; ?>'></i></div>
                                <?php
                                } else {
                                ?>
                                    <div class="fs-3 text-end col-11 mt-2" style="cursor: pointer;" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'><i class="bi bi-balloon-heart-fill text-dark" id='heart<?php echo $product_data["id"]; ?>'></i></div>
                                <?php
                                }

                                ?>
                                <?php

                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                $image_data = $image_rs->fetch_assoc();

                                ?>
                                <img src="<?php echo $image_data["path"]; ?>" class="card-img-top" style="width: 13rem; height: 13rem;">
                                <div class="col-11">
                                    <hr class="">
                                </div>
                                <div class="card-body" style="margin-top: -30px;">
                                    <h4 class="card-title text-center text-danger"><?php echo $product_data["title"]; ?></h4>
                                    <div class="row text-center">


                                        <?php

                                        if ($product_data["qty"] > 0) {

                                        ?>
                                            <h6 class="card-title text-center text-warning"><i class="bi bi-check2-square"></i> In Stock</h6> <br />
                                            <h5 class="card-title text-center">Rs.<?php echo $product_data["price"]; ?>.00</h5>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 row">
                                    <a class="add-to-cart btn btn-outline-primary rounded-2 col-12 col-lg-6 mt-1" style="margin-left: -7px;" href="#" role="button" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-cart4"></i>Addcart</a>
                                    <!-- <a class="btn btn-outline-success rounded-4 col-lg-6 mt-1" href="#" role="button" onclick="addWatchlist(<?php echo $product_data['id']; ?>)"><i class='bx bxs-heart-circle bx-burst'></i>Wathlist</a> -->
                                    <a class="btn btn-outline-danger rounded-2 col-12 col-lg-6 mt-1" style="margin-left: 7px;" href="<?php echo "singalproduct.php?id=" . $product_data['id']; ?>" role="button"><i class="bi bi-bag-heart-fill"></i>BuyNow</a>

                                <?php

                                        } else {
                                ?>
                                    <span class="card-text text-danger fw-bold co-5">Out of Stock</span> <br />
                                    <span class="card-text text-danger fw-bold">0kg Available</span><br /><br />
                                </div>

                                <div class="col-12 mb-2 row">
                                    <a class="add-to-cart btn btn-outline-primary rounded-2 col-12 col-lg-5 mt-1" style="margin-left: 10px;" href="#" role="button" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-cart4"></i> Add cart</a>
                                    <!-- <a class="btn btn-outline-success rounded-4 col-lg-6 mt-1 disabled" href="#" role="button"><i class='bx bxs-heart-circle bx-burst'></i>Wathlist</a> -->
                                    <a class="btn btn-outline-danger rounded-2 col-12 col-lg-5 mt-1" style="margin-left: 30px;" href="singalproduct.php" role="button"><i class="bi bi-bag-heart-fill"></i> Buy Now</a>
                                </div>
                            <?php
                                        }

                            ?>
                            </div>
                    </div>
                <?php
                        }

                ?>

                </div>
                <!---Electronic Accessories-->


                <!-- products -->



                <!-- -new design -->

                <!-- <div class="card border-danger col-12" style="width: 17rem; margin-left: 15px;">
                <div class="fs-3 text-end col-11 mt-2" style="cursor: pointer;"><i class="bi bi-balloon-heart-fill"></i></div>
                <img src="image/mobile/12pro max.jpg" class="card-img-top" style="width: 13rem; height: 13rem;">
                <div class="col-11">
                    <hr class="">
                </div>
                <div class="card-body" style="margin-top: -30px;">
                    <h4 class="card-title text-center text-danger">Iphone 12pro</h4>
                    <h6 class="card-title text-center text-warning"><i class="bi bi-check2-square"></i> In Stock</h6>
                    <h5 class="card-title text-center">Rs 150,000.00</h5>
                </div>
                <div class="col-12 mb-2 row">
                    <a class="add-to-cart btn btn-outline-primary rounded-2 col-12 col-lg-5 mt-1" style="margin-left: 10px;" href="#" role="button" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-cart4"></i> Add cart</a>
                    <a class="btn btn-outline-danger rounded-2 col-12 col-lg-5 mt-1" style="margin-left: 30px;" href="singalproduct.php" role="button"><i class="bi bi-bag-heart-fill"></i> Buy Now</a>
                </div>
            </div> -->




            </div>
            <!-------cart buttoon----->

            <a href="cart.php">
                <div class="shopping-cart">
                    <span class="cart-icon">🛒</span>
                </div>
            </a>

        </div>
        <div class="container-fluid">
            <?php include "footer.php" ?>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>