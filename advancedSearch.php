<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Advanced serch | NEW TECH</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bulma.css" />

    <link rel="icon" href="img/icon1.jpg">

</head>

<body class="body2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-body ">
                <?php include "header.php"; ?>
            </div>
            <hr class="bg-danger">

            <div class="col-12  bg-body ">
                <div class="row">
                    <div class=" col-12 ">
                        <div class="row">
                            <div class="col-12 text-center">
                                <p class="fs-1 bg-danger fw-bold mt-2 pt-1"> Advanced Search </p>
                            </div>
                            <nav class="flex mb-4" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                    <li class="inline-flex items-center">
                                        <a href="home.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-[#626890]">
                                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                            </svg>
                                            Home
                                        </a>
                                    </li>
                                    <li aria-current="page">
                                        <div class="flex items-center">
                                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Advanced Search</span>
                                        </div>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class=" container  col-12 col-lg-10 bg-success rounded-3 mb-3">
                        <div class="row text-white">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-lg-6 mb-2">
                                        <div class="col-12 col-lg-6">
                                            <h2>Find Items</h2>
                                        </div>
                                    </div>
                                    <hr class="bg-black">

                                    <div>

                                        <div>
                                            <div class="row" style="justify-content:center; ">
                                                <div class="col-12 mt-2">
                                                    <div class="col-12 col-lg-6 text-center  mb-2">
                                                        <h5>Enter keywords</h5>
                                                    </div>
                                                    <div class="col-12 row">
                                                        <div class="control has-icons-left has-icons-right col-9">
                                                            <input class="input is-rounded-3 border-success" placeholder="Enter keyword" id="t" />
                                                            <span class="icon is-small is-right">
                                                                <i class="bi bi-search"></i>
                                                            </span>

                                                        </div>
                                                        <div class="col-3 col-lg-2 mb-1 d-grid">
                                                            <button class="btn btn-primary" onclick="advancedSearch(0);">Search</button>
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="row">
                                                <div class="col-12 col-lg-6 ">
                                                    <div class="col-12 col-lg-6 text-center ">
                                                        <h5> Categorys</h5>
                                                    </div>
                                                    <select class="form-select input is-rounded-3 border-success" aria-label="Default select example" id="c1">
                                                        <option selected> Selct option</option>
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
                                                </div>

                                                <div class="col-12 col-lg-6">
                                                    <div class="col-12   text-center mb-2">
                                                        <h5>Brand</h5>
                                                    </div>
                                                    <select class="form-select input is-rounded-3 border-success" aria-label="Default select example" id="b1">
                                                        <option selected>Select brand</option>
                                                        <?php

                                                        $brand_rs = Database::search("SELECT * FROM `brand`");
                                                        $brand_num = $brand_rs->num_rows;

                                                        for ($x = 0; $x < $brand_num; $x++) {
                                                            $brand_data = $brand_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["brand_name"]; ?></option>
                                                        <?php
                                                        }

                                                        ?>
                                                    </select>
                                                </div>

                                                <!-- <div class="col-12 col-lg-4 ">
                                                    <div class="col-12  text-center">
                                                        <h5> words for search</h5>
                                                    </div>
                                                    <div class="control has-icons-left has-icons-right">
                                                        <input class="input is-rounded border-success" placeholder="Exclude words " id="w" />
                                                        <span class="icon is-small is-right">
                                                            <i class="bi bi-search"></i>
                                                        </span>
                                                    </div>
                                                </div> -->

                                            </div>
                                        </div>

                                        <!-- <div class="col-12  text-center mt-3 ">
                                            <div class="offset-4 col-6 col-lg-4 text-center mb-3 d-grid gap-3  mx-8 ">
                                                <button class=" btn btn-outline-success"> Search </button>
                                            </div>
                                        </div> -->
                                        <hr class="bg-black">

                                        <div class="col-12 row">
                                            <div class="col-6">
                                                <div class="mb-2 offset-2">
                                                    <h4> Condition</h4>
                                                </div>
                                                <div class="offset-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="br" />
                                                        <label class="form-check-label">
                                                            Brand New
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="us" />
                                                        <label class="form-check-label">
                                                            Used
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="os" />
                                                        <label class="form-check-label">
                                                            old stock
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-2 offset-2">
                                                    <h4> Active time</h4>
                                                </div>
                                                <div class="offset-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="no">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Newest to oldest

                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="on">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Oldest to newest
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <hr class="bg-black">

                                        <div class="row">
                                            <div class="col-12 col-lg-6 mt-2">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Rs</span>
                                                    <span class="input-group-text">0.00</span>
                                                    <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Price From" id="pf">
                                                </div>

                                            </div>
                                            <div class="col-12 col-lg-6 mt-2">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Rs</span>
                                                    <span class="input-group-text">0.00</span>
                                                    <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Price To" id="pt">
                                                </div>
                                            </div>

                                            <div class="row col-12">
                                                <div class="col-6 mt-2 mb-2">
                                                    <select class="form-select border border-top-0 border-start-0 border-end-0 border-2 border-dark" id="s">
                                                        <option value="0">SORT BY</option>
                                                        <option value="1">PRICE LOW TO HIGH</option>
                                                        <option value="2">PRICE HIGH TO LOW</option>
                                                        <option value="3">QUANTITY LOW TO HIGH</option>
                                                        <option value="4">QUANTITY HIGH TO LOW</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12  text-center mt-3 ">
                                            <div class="offset-3 col-6 col-lg-6 text-center mb-3 d-grid gap-3  mx-8 ">
                                                <button class="btn btn-outline-warning" onclick="advancedSearch(0)"> Search </button>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="view_area"></div>

                

                <?php include "footer.php"; ?>
            </div>
        </div>
</body>

</html>
<!-- 

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Advanced Search | eShop</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.svg" />

</head>

<body class="bg-info">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-body mb-2">
             
            </div>

            <div class="col-12 bg-body mb-2">
                <div class="row">
                    <div class="offset-lg-4 col-12 col-lg-4">
                        <div class="row">
                            <div class="col-2">
                                <div class="mt-2 mb-2 logo" style="height: 80px;"></div>
                            </div>
                            <div class="col-10 text-center">
                                <P class="fs-1 text-black-50 fw-bold mt-3 pt-2">Advanced Search</P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offset-lg-2 col-12 col-lg-8 mb-3 bg-body rounded">
                <div class="row">

                    <div class="offset-lg-1 col-12 col-lg-10">
                        <div class="row">
                            <div class="col-12 col-lg-10 mt-2 mb-1">
                                <input type="text" class="form-control" placeholder="Type keyword to search..." id="t"/>
                            </div>
                            <div class="col-12 col-lg-2 mt-2 mb-1 d-grid">
                                <button class="btn btn-primary" onclick="advancedSearch(0);">Search</button>
                            </div>
                            <div class="col-12">
                                <hr class="border border-3 border-primary">
                            </div>
                        </div>
                    </div>

                    <div class="offset-lg-1 col-12 col-lg-10">
                        <div class="row">

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12 col-lg-4 mb-3">
                                        <select class="form-select" id="c1">
                                            <option value="0">Select Category</option>
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
                                    </div>

                                    <div class="col-12 col-lg-4 mb-3">
                                        <select class="form-select" id="b1">
                                            <option value="0">Select Brand</option>
                                            <?php

                                            $brand_rs = Database::search("SELECT * FROM `brand`");
                                            $brand_num = $brand_rs->num_rows;

                                            for ($x = 0; $x < $brand_num; $x++) {
                                                $brand_data = $brand_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                                                <?php
                                            }

                                                ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-4 mb-3">
                                        <select class="form-select" id="m">
                                            <option value="0">Select Model</option>
                                            <?php

                                            $model_rs = Database::search("SELECT * FROM `model`");
                                            $model_num = $model_rs->num_rows;

                                            for ($x = 0; $x < $model_num; $x++) {
                                                $model_data = $model_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>
                                                <?php
                                            }

                                                ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-6 mb-3">
                                        <select class="form-select" id="c2">
                                            <option value="0">Select Condition</option>
                                            <?php

                                            $condition_rs = Database::search("SELECT * FROM `condition`");
                                            $condition_num = $condition_rs->num_rows;

                                            for ($x = 0; $x < $condition_num; $x++) {
                                                $condition_data = $condition_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $condition_data["id"]; ?>"><?php echo $condition_data["name"]; ?></option>
                                                <?php
                                            }

                                                ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-6 mb-3">
                                        <select class="form-select" id="c3">
                                            <option value="0">Select Colour</option>
                                            <?php

                                            $color_rs = Database::search("SELECT * FROM `color`");
                                            $color_num = $color_rs->num_rows;

                                            for ($x = 0; $x < $color_num; $x++) {
                                                $color_data = $color_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $color_data["id"]; ?>"><?php echo $color_data["name"]; ?></option>
                                                <?php
                                            }

                                                ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-6 mb-3">
                                        <input type="text" class="form-control" placeholder="Price From..." id="pf"/>
                                    </div>

                                    <div class="col-12 col-lg-6 mb-3">
                                        <input type="text" class="form-control" placeholder="Price To..." id="pt"/>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="offset-lg-2 col-12 col-lg-8 bg-body rounded mb-3">
                <div class="row">
                    <div class="offset-8 col-4 mt-2 mb-2">
                        <select class="form-select border border-top-0 border-start-0 border-end-0 border-2 border-dark" id="s">
                            <option value="0">SORT BY</option>
                            <option value="1">PRICE LOW TO HIGH</option>
                            <option value="2">PRICE HIGH TO LOW</option>
                            <option value="3">QUANTITY LOW TO HIGH</option>
                            <option value="4">QUANTITY HIGH TO LOW</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="offset-lg-2 col-12 col-lg-8 bg-body rounded mb-3">
                <div class="row">
                    <div class="offset-lg-1 col-12 col-lg-10 text-center">
                        <div class="row" id="view_area">
                            <div class="offset-5 col-2 mt-5">
                                <span class="fw-bold text-black-50"><i class="bi bi-search h1" style="font-size: 100px;"></i></span>
                            </div>
                            <div class="offset-3 col-6 mt-3 mb-5">
                                <span class="h1 text-black-50 fw-bold">No Items Searched Yet...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html> -->