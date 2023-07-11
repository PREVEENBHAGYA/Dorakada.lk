<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {
    if (isset($_SESSION["p"])) {

        $product = $_SESSION["p"];


?>


    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Product | දොරකඩට</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="tailwind.css">
        <link rel="icon" href="img/citymarkat.png">

    </head>

    <body class="bg-info-subtle">

        <div class="col-12 text-center fs-2 text-success mt-3"> UPDATE PRODUCT</div>
        <div class="col-12 bg-success fw-bold">
            <hr>
        </div>
        <div class="col-12 pl-3 bg-body">
            <nav class="flex text-black" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="bashbord.php" class="inline-flex items-center text-sm font-medium">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Admin Dashbord
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 ">Update Product</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-12 mt-5">
            <div class="row" style="display: flex; align-items: center; justify-content: center;">
                <div class="col-10 col-lg-4 ">
                    <div class="row">

                        <div class="col-12 text-center">
                            <label class="form-label fw-bold text-success " style="font-size: 20px;">Select Product Category</label>
                        </div>

                        <div class="col-12">
                            <select class="form-select text-center text-warning border-success" disabled id="category" onchange="loadBrands();">
                                
                                <?php

                                $category_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $product["category_id"] . "'");
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

                    </div>
                </div>

                <div class="col-10 col-lg-4  gap-3">
                    <div class="row">

                        <div class="col-12 text-success text-center">
                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Brand</label>
                        </div>

                        <div class="col-12">
                            <select class="form-select text-center text-warning border-success " id="brand" disabled>
                                
                                <?php

                                $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id`='" . $product["brand_id"] . "'");
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

                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 mt-5">
            <div class="row">
                

                <div class="col-6">
                    <div class="">
                        <div class="col-12 text-success text-center">
                            <label class="form-label fw-bold" style="font-size: 20px;">Add Quantity</label>
                        </div>
                        <div class="col-12">
                            <input type="number" class="form-control border-success text-warning" value="<?php echo $product["qty"]; ?>" min="0" id="Q" />
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="">
                        <div class="col-12 text-success text-center">
                            <label class="form-label fw-bold" style="font-size: 20px;">Update Price</label>
                        </div>
                        <div class="col-12 ">
                            <div class="input-group mb-2">
                                <span class="input-group-text border-success text-warning">Rs.</span>
                                <input type="text" class="form-control border-success text-warning" value="<?php echo $product["price"]; ?>" id="P" />
                                <span class="input-group-text border-success text-warning">.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="row" style="display: flex; align-items: center; justify-content: center;">
                <div class="col-12 text-success text-center">
                    <label class="form-label fw-bold" style="font-size: 20px;">
                        Update Product Title
                    </label>
                </div>
                <div class=" col-8">
                    <input type="text" value="<?php echo $product["title"]; ?>" class="form-control border-success text-warning" id="T" />
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="row" style="display: flex; align-items: center; justify-content: center;">
                <div class="col-12 text-success text-center">
                    <label class="form-label fw-bold" style="font-size: 20px;">Update Description</label>
                </div>
                <div class="col-11">
                    <textarea cols="30" rows="15" class="form-control  border-success" value="" id="D"><?php echo $product["description"]; ?></textarea>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3">
            <div class="row" style="display: flex; align-items: center; justify-content: center;">
                <div class="col-12 text-center text-success">
                    <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                </div>
                <div class="col-8">
                    <div class="row gap-2" style="display: flex; align-items: center; justify-content: center;">
                        <div class="col-3 border border-success rounded">
                            <img src="image/product-add.png" class="img-fluid" style="width: 250px;" id="i0" />
                        </div>
                        <div class="col-3 border border-success rounded">
                            <img src="image/product-add.png" class="img-fluid" style="width: 250px;" id="i1" />
                        </div>
                        <div class="col-3 border border-success rounded">
                            <img src="image/product-add.png" class="img-fluid" style="width: 250px;" id="i2" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-grid mt-3 ">
                    <input type="file" class="d-none" id="imageuploader" multiple />
                    <label for="imageuploader" class="col-12 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="changeProductImage();">Upload Images</label>
                </div>

                <div class="col-8 d-grid mt-3 mb-3 ">
                    <button class="border border-success text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900" onclick="updateProduct();">Update Product</button>
                </div>
            </div>
        </div>




        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

<?php
}
}
?>