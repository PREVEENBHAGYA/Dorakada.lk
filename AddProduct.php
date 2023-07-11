<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

?>


    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Product | City Market</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="tailwind.css">
        <link rel="icon" href="image/headlogo.png">

    </head>

    <body class="bg-info-subtle">

        <div class="col-12 text-center fs-2 text-success mt-3"> ADD PRODUCT</div>
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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 ">Add Product</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-12 mt-5">
            <div class="row" style="display: flex; align-items: center; justify-content: center;">
                <div class="col-10 col-lg-4">
                    <div class="row">

                        <div class="col-12 text-center">
                            <label class="form-label fw-bold text-success " style="font-size: 20px;">Select Product Category</label>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">AddCategory</button>
                        </div>
                        <div class="col-8">
                            <select class="form-select text-center text-danger border-success" id="category" onchange="loadBrands();">
                                <option value="0">Select Category</option>
                                <?php

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

                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-success">Add New Category</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control border border-warning" id="newcategory">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-primary" onclick="saveCatrgory();">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->

                <div class="col-10 col-lg-4  gap-3 ">
                    <div class="row">

                        <div class="col-12 text-success text-center">
                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Brand</label>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Add Brand</button>
                        </div>
                        <div class="col-8">
                            <select class="form-select text-center text-danger border-success" id="brand">
                                <option value="0">Select Brand</option>
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

                    </div>
                </div>

            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-success">Add New Brand</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control border border-warning" id="newBrand">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline-primary" onclick="saveBrand();">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->


        <div class="col-12 mt-5">
            <div class="row" style="display: flex; align-items: center; justify-content: center;">
                <div class="col-10 col-lg-4  gap-3">
                    <div class="row">

                        <div class="col-12 text-success text-center">
                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Color</label>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add color</button>
                        </div>
                        <div class="col-8">
                            <select class="form-select text-center text-danger border-success" id="color">
                                <option value="0">Select color</option>
                                <?php

                                $brand_rs = Database::search("SELECT * FROM `color`");
                                $brand_num = $brand_rs->num_rows;

                                for ($x = 0; $x < $brand_num; $x++) {
                                    $brand_data = $brand_rs->fetch_assoc();

                                ?>

                                    <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["color_name"]; ?></option>

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
                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Condition</label>
                        </div>

                        <div class="col-12">
                            <select class="form-select text-center text-danger border-success" id="condition">
                                <option value="0">Select Condition</option>
                                <?php

                                $condition_rs = Database::search("SELECT * FROM `condition`");
                                $condition_num = $condition_rs->num_rows;

                                for ($x = 0; $x < $condition_num; $x++) {
                                    $condition_data = $condition_rs->fetch_assoc();

                                ?>

                                    <option value="<?php echo $condition_data["id"]; ?>"><?php echo $condition_data["condition_name"]; ?></option>

                                <?php
                                }

                                ?>
                            </select>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-success">Add New Color</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control border border-warning" id="newcolor">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline-primary" onclick="savecolor();">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="col-12 mt-5">
            <div class="row" style="display: flex; align-items: center; justify-content: center;">
                <div class="col-10 col-lg-4  gap-3">
                    <div class="row">

                    <div class="col-12 text-success text-center">
                            <label class="form-label fw-bold" style="font-size: 20px;">Add Quantity</label>
                        </div>
                        <div class="col-12">
                            <input type="number" class="form-control border-success text-danger ml" value="0" min="0" id="qty" />
                        </div>

                    </div>
                </div>

                <div class="col-10 col-lg-4  gap-3">
                    <div class="row">

                    <div class="col-12 text-success text-center">
                            <label class="form-label fw-bold" style="font-size: 20px;">Product Price</label>
                        </div>
                        <div class="col-12 ">
                            <div class="input-group mb-2">
                                <span class="input-group-text border-success text-warning">Rs.</span>
                                <input type="text" class="form-control border-success text-danger" id="price" />
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
                        Add Product Title
                    </label>
                </div>
                <div class=" col-8">
                    <input type="text" class="form-control border-success text-danger" id="title" />
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="row" style="display: flex; align-items: center; justify-content: center;">
                <div class="col-12 text-success text-center">
                    <label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
                </div>
                <div class="col-11">
                    <textarea cols="30" rows="15" class="form-control border-success text-danger" id="desc"></textarea>
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
                <div class="col-12 col-lg-6 d-grid mt-3">
                    <input type="file" class="d-none" id="imageuploader" multiple />
                    <label for="imageuploader" class="col-12 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="changeProductImage();">Upload Images</label>
                </div>

                <div class="col-8 d-grid mt-3 mb-3 ">
                    <button class="border border-success text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800" onclick="addProduct();">Save Product</button>
                </div>
            </div>
        </div>




        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

<?php
}
?>