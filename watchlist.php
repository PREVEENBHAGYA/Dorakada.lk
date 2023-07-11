<?php include "header.php";

require "connection.php";

if (isset($_SESSION["u"])) {

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Watchlist Page</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="tailwind.css">
        <link rel="icon" href="img/citymarkat.png">

    </head>

    <body>
        <div class="container-fluid">
            <div class="row">

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
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">WatchList Page</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="col-12 mt-3">
                    <h1 class="offset-5 fs-1 text-decoration-underline h1 fw-bolder text-warning">WatchList </h1>
                </div>

                <div class="col-12 text-success fw-bolder">
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

                <div class="col-12 text-success fw-bolder">
                    <hr />
                </div>

                <?php

                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                $watchlist_num = $watchlist_rs->num_rows;

                if ($watchlist_num == 0) {

                ?>

                    <!---empty view-->

                    <div class="col-12 bg-gray-200">
                        <div class="col-12 text-center mb-2">
                            <label class="form-label fs-1 fw-bold text-danger ">
                                Your Watch List Is Empty.
                            </label>
                        </div>
                        <div class="col-12 offset-lg-4 offset-0 mb-5 col-lg-4" style=" display: flex; justify-content: center; align-items: center;">
                            <img class="bx-flashing " src="image/favorite_icon.png">
                        </div>
                        <div class="offset-lg-4  col-lg-4 mb-4 d-grid mt-4">
                            <a href="home.php" class="btn btn-outline-success fs-3 fw-bold ">
                                +Add Watch List
                            </a>
                        </div>
                    </div>

                    <!---empty view-->
                <?php
                }
                ?>
                <!-- products -->
                <div class="col-lg-12 mt-4 mb-4">
                    <div class="row gap-3" style="display: flex; align-items: center; justify-content: center;">
                        <?php
                        for ($x = 0; $x < $watchlist_num; $x++) {
                            $watchlist_data = $watchlist_rs->fetch_assoc();

                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $watchlist_data["product_id"] . "'");
                            $product_data = $product_rs->fetch_assoc();


                        ?>
                            <div class="card" style="width: 18rem; margin-left: 10px; margin-bottom: 20px;">
                                <?php
                                $img = array();

                                $images_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $watchlist_data["product_id"] . "'");
                                $images_data = $images_rs->fetch_assoc();

                                ?>
                                <img src="<?php echo $images_data["path"]; ?>" class="card-img-top mt-3" style="height: 200px; width: 80%;">


                                <div class="card-body">
                                    <p class="card-text fs-6 fw-bold text-center text-success" style="font-family: cursive;"><?php echo $product_data["title"]; ?></p>
                                </div>
                                <div class="col-12 row">
                                    <button type="button" class="btn btn-success btn-sm txtco mb-2" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-cart-plus"></i></i> Add Cart </button>
                                    <button type="button" class="btn btn-danger btn-sm txtco2 mb-2" onclick='deletFromWatchlist(<?php echo $watchlist_data["id"]; ?>);'><i class="bi bi-x-circle-fill"></i> REMOVE </button>
                                </div>
                            </div>
                        <?php }
                        ?>


                    </div>
                </div>
                <!-- products -->

            </div>
        </div>

        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

<?php
}
?>
