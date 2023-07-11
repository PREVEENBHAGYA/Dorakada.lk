<?php

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `category` ON category.id=product.category_id
    INNER JOIN `color` ON color.id=product.colour_id
    INNER JOIN `brand` ON brand.id=product.brand_id INNER JOIN `condition` ON condition.id=product.condition_id WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;
    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();

?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title><?php echo $product_data["title"]; ?> | දොරකඩට</title>

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="style.css" />

            <link rel="icon" href="image/headlogo.png">
        </head>

        <body>

            <div class="container-fluid">
                <div class="row">
                    <?php include "header.php"; ?>

                    <div class="col-12 mt-0 bg-white singleProduct">
                        <div class="row">
                            <div class="col-12" style="padding: 10px;">
                                <div class="row">
                                    <div class="row ">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Single Product View</li>
                                            </ol>
                                        </nav>
                                    </div>

                                    <div class="col-9 offset-2 offset-lg-0 col-lg-6 pt-2 mb-2 ">
                                        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active bg-danger" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" class=" bg-danger" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" class=" bg-danger" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <?php

                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                                $image_num = $image_rs->num_rows;
                                                $img = array();

                                                if ($image_num != 0) {

                                                    for ($x = 0; $x < $image_num; $x++) {
                                                        $image_data = $image_rs->fetch_assoc();
                                                        $img[$x] = $image_data["path"];
                                                ?>

                                                        <div class="carousel-item active" data-bs-interval="10000">
                                                            <img src="<?php echo $img["$x"]; ?>" class="card d-block w-100" style="width: 513px; height: 653px;">
                                                        </div>

                                                    <?php
                                                    }
                                                    ?>
                                            </div>
                                            <button class=" carousel-control-prev " type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                                                <span class="visually-hidden ">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div><?php
                                                }
                                            ?>



                                <div class="col-12 col-lg-6 order-3">
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row border-bottom border-dark">
                                                <div class="col-12 my-2 text-center">
                                                    <span class="fs-3 fw-bold text-warning"><?php echo $product_data["title"] ?></span>
                                                </div>
                                            </div>

                                            <div class="row border-bottom border-dark">
                                                <div class="col-12 my-2">
                                                    <span class="badge">
                                                        <i class="bi bi-star-fill text-warning fs-5"></i>
                                                        <i class="bi bi-star-fill text-warning fs-5"></i>
                                                        <i class="bi bi-star-fill text-warning fs-5"></i>
                                                        <i class="bi bi-star-fill text-warning fs-5"></i>
                                                        <i class="bi bi-star-fill text-warning fs-5"></i>


                                                        <label class="fs-5 text-dark fw-bold"> 39 Reviews</label>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-12 border-dark">
                                                <div class=" my-2 row">
                                                    <h5 class="text-success fw-bolder col-2">Condition :</h5>
                                                    <span class="fs-5  fw-bold col-2 text-primary"><?php echo $product_data["condition_name"] ?></span>

                                                </div>
                                            </div>
                                            <div class="col-12 border-dark">
                                                <div class=" my-2 row">
                                                    <h5 class="text-success fw-bolder col-2">Colour :</h5>
                                                    <span class="fs-5 fw-bold col-2 text-primary"><?php echo $product_data["color_name"] ?></span>

                                                </div>
                                            </div>
                                            <div class="col-12 border-dark">
                                                <div class=" my-2 row">
                                                    <h5 class="text-primary fw-bolder col-12"><i class='bx bxs-truck' style='color:#198754'></i> Islandwide Delivery (5-7 Working Days) 24 Hours</h5>
                                                </div>
                                            </div>



                                            <div class="row border-dark">
                                                <div class="col-12 my-2">

                                                    <span class="fs-5 text-primary"><b class="text-success">In Stock : </b><?php echo $product_data["qty"] ?> Items Available</span>
                                                </div>
                                            </div>

                                            <div class="col-12 border-dark">
                                                <div class=" my-2 row">
                                                    <h5 class="text-danger col-6">Returns: 30 day returns</h5>
                                                </div>
                                            </div>

                                            <?php

                                            $price = $product_data["price"];


                                            ?>

                                            <div class="row border-dark">
                                                <div class="col-12 my-2">
                                                    <span class="fs-4 text-dark fw-bold">Rs. <?php echo $price ?> .00</span>

                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 my-2">
                                                            <div class="row g-2">
                                                                <!-- 
                                                                <div class="border border-1 border-secondary rounded overflow-hidden 
                                                        float-left mt-1 position-relative product-qty">
                                                                    <div class="col-12">
                                                                        <span>Quantity : </span>
                                                                        <input type="text" class="border-0 fs-5 fw-bold text-start" style="outline: none;" pattern="[0-9]" value="1" onkeyup='check_value(<?php echo $product_data["qty"]; ?>);' id="qty_input" />

                                                                        <div class="position-absolute qty-buttons">
                                                                            <div class="justify-content-center d-flex flex-column align-items-center 
                                                                border border-1 border-secondary qty-inc">
                                                                                <i class="bi bi-caret-up-fill text-primary fs-5" onclick='qty_inc(<?php echo $product_data["qty"]; ?>);'></i>
                                                                            </div>
                                                                            <div class="justify-content-center d-flex flex-column align-items-center 
                                                                border border-1 border-secondary qty-dec">
                                                                                <i class="bi bi-caret-down-fill text-primary fs-5" onclick='qty_dec();'></i>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div> -->
                                                                <div class="col-3 fs-3">
                                                                    <button onclick="qty_dec();" class="bg-warning"><i class='bx bx-minus'></i></button>
                                                                    <input value="1" id="qty_input" onkeyup='checkValue(<?php echo $product_data["qty"]; ?>);' class="col-5 text-center border border-2" />
                                                                    <button onclick='qty_inc(<?php echo $product_data["qty"]; ?>);' class="bg-warning"><i class='bx bx-plus'></i></button>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 mt-5">
                                                                        <div class="row">

                                                                            <button class="btn btn-outline-danger rounded-2 col-12 col-lg-5 mt-1" type="submit" id="payhere-payment" onclick="payNow(<?php echo $pid ?>);"><i class="bi bi-bag-heart-fill"></i> Buy Now</button>

                                                                            <a class="add-to-cart btn btn-outline-primary rounded-2 col-12 col-lg-5 mt-1" style="margin-left: 10px;" href="#" role="button" onclick="addToCart(<?php echo $product_data['id']; ?>);"><i class="bi bi-cart4"></i> Add cart</a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark">
                                            <div class="col-12">
                                                <span class="fs-4 fw-bold text-primary">Product details of <?php echo $product_data["title"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-6">
                                        <div class="row d-block me-0 mt-4 mb-3 border-bottom border-end border-1 border-dark">
                                            <div class="col-12">
                                                <span class="fs-4 fw-bold">Feedbacks</span>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>


                            <div class="col-12 col-lg-6 bg-white">
                                <div class="row">
                                    <div class="col-4">

                                        <div class="row col-12">
                                            <div class="col-12">
                                                <label class="form-label fs-4 fw-bold text-success">Category: </label>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fs-4"><?php echo $product_data["name"] ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class=" col-12">
                                            <div class="col-12">
                                                <label class="form-label fs-4 fw-bold text-success">Brand : </label>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fs-4"><?php echo $product_data["brand_name"] ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class=" col-12">
                                            <div class="col-12">
                                                <label class="form-label fs-4 fw-bold text-success">Model : </label>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fs-4"><?php echo $product_data["brand_name"] ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fs-4 fw-bold text-success">Description : </label>
                                            </div>
                                            <div class="col-12">
                                                <textarea cols="60" rows="10" class="form-control" readonly><?php echo $product_data["description"] ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 bg-white">
                                <div class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark">
                                    <div class="col-12 text-center">
                                        <span class="fs-3 fw-bold text-danger">Related Other Items</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 bg-white mb-3">
                                <div class="row g-2">
                                    <?php
                                    // $brand_rs = Database::search("SELECT * FROM `brand` where `id`='".$pra_data["brand_id"]."'");
                                    // $brand_data = $brand_rs-> fetch_assoc();

                                    // $p_rs = Database::search("SELECT product.id AS prid,product.title,product.price,product.qty,
                                    // product.description,product.description,brand.id,brand.name");

                                    ?>
                                    <div class="offset-1 offset-lg-0 col-4 col-lg-2 prcard">
                                        <div class="card" style="width: 18rem;">
                                            <img src="<?php echo $image_data["path"]; ?>" class="card-img-top" style="width: 13rem; height: 13rem;">
                                            <div class="card-body">
                                                <h5 class="card-title text-center"><?php echo $product_data["title"]; ?></h5>
                                                <h6 class="card-title text-center text-warning"><i class="bi bi-check2-square"></i> In Stock</h6> <br />
                                                <h5 class="card-title text-center">Rs.<?php echo $product_data["price"]; ?>.00</h5>
                                            </div>
                                            <div class="col-10">
                                                <div class="row">

                                                    <button class="btn btn-outline-danger rounded-2 col-12 col-lg-5 mt-1"><i class="bi bi-bag-heart-fill"></i> Buy Now</button>

                                                    <a class="add-to-cart btn btn-outline-primary rounded-2 col-12 col-lg-5 mt-1"><i class="bi bi-cart4"></i> Add cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- <div class="col-12 col-lg-6">
                                <div class="row border border-1 border-dark rounded overflow-scroll me-0" style="height: 300px;">

                                    <?php

                                    $feedback_rs = Database::search("SELECT * FROM `feedback` WHERE `product_id`='" . $pid . "'");
                                    $feedback_num = $feedback_rs->num_rows;

                                    for ($x = 0; $x < $feedback_num; $x++) {
                                        $feedback_data = $feedback_rs->fetch_assoc();
                                    ?>
                                        <div class="col-12 mt-1 mb-1 mx-1">
                                            <div class="row border border-1 border-dark rounded me-0">
                                                <!-- <?php

                                                        $user_rs = Database::search("SELECT * FROM `users` WHERE `email`='" . $feedback_data["user_email"] . "'");
                                                        $user_data = $user_rs->fetch_assoc();

                                                        ?>
                                                <div class="col-10 mt-1 mb-1 ms-0"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></div>
                                                <div class="col-2 mt-1 mb-1 me-0">
                                                    <?php
                                                    if ($feedback_data["type"] == 1) {
                                                    ?>
                                                        <span class="badge bg-success">Positive</span></div>
                                                        <?php
                                                    } else if ($feedback_data["type"] == 2) {
                                                        ?>
                                                        <span class="badge bg-warning">Neutral</span></div>
                                                        <?php
                                                    } else if ($feedback_data["type"] == 3) {
                                                        ?>
                                                        <span class="badge bg-danger">Negative</span></div>
                                                        <?php
                                                    }
                                                        ?> -->

                                               <!-- <div class="col-12">
                                                    <b>
                                                        <?php echo $feedback_data["feed"]; ?>
                                                    </b>
                                                </div>
                                                <div class="offset-6 col-6 text-end">
                                                    <label class="form-label fs-6 text-black-50"><?php echo $feedback_data["date"]; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }

                                    ?>


                                </div>
                            </div> -->

                        </div>
                    </div>

                    <?php include "footer.php"; ?>
                </div>
            </div>

            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>


<?php

    } else {
        echo ("Sory for the inconvinient");
    }
} else {
    echo ("Something went wrong");
}

?>