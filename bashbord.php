<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {
    $data = $_SESSION["au"];

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title> Admin Dashbord </title>
        <link rel="stylesheet" href="slyder.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="image/headlogo.png">
    </head>

    <body>
        <div class="sidebar">
            <div class="logo-details">
                <i class='bx bxl-c-plus-plus icon1'></i>
                <div class="logo_name">දොරකඩට.Lk</div>
                <i class='bx bx-menu' id="btn"></i>
            </div>
            <u>
                <li class="li">
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Search...">
                    <span class="tooltip">Search</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="Manageusars.php">
                        <i class='bx bx-user'></i>
                        <span class="links_name">Manage Usars</span>
                    </a>
                    <span class="tooltip">Manage Usars</span>
                </li>
                <li>
                    <a href="ManageProduct.php">
                        <i class='bi bi-motherboard'></i>
                        <span class="links_name">Manage Products</span>
                    </a>
                    <span class="tooltip">Manage Products</span>
                </li>
                <li>
                    <a href="AddProduct.php">
                        <i class='bx bx-add-to-queue'></i>
                        <span class="links_name">Add Product</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="UpdateProduct.php">
                        <i class='bx bx-layer-plus'></i>
                        <span class="links_name">Update Product</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-cart-alt'></i>
                        <span class="links_name">Order</span>
                    </a>
                    <span class="tooltip">Order</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-heart'></i>
                        <span class="links_name">Saved</span>
                    </a>
                    <span class="tooltip">Saved</span>
                </li> -->
                <li class="profile" style="cursor: pointer;">
                    <div class="profile-details">
                        <img src="image/Oshadha_636a0c2969522.png" alt="profileImg">
                        <div class="name_job">
                            <div class="name"><?php echo $data["fname"] . " " . $data["lname"]; ?></div>
                            <div class="job">Admin</div>
                        </div>
                    </div>
                    <i class='bx bx-log-out' id="log_out" onclick="AdminLogOut();"></i>
                </li>
            </u>
        </div>
        <section class="home-section">
            <div class="text">Dashboard</div>
            <div class="col-12">
                <div class="row sing " style="display: flex; justify-content: center; align-items: center;">
                    <?php

                    $product_rs = Database::search("SELECT * FROM `product`");
                    $users_rs = Database::search("SELECT * FROM `users`");

                    $product = $product_rs->num_rows;
                    $users = $users_rs->num_rows;


                    ?>

                    <div class="col-6 col-lg-3 px-1  rounded g-1 ml-4 offset-1 offset-lg-0">
                        <div class="row g-1 col-12 ">
                            <div class="col-1" style="background-color: #055160;"></div>
                            <div class="col-11  text-white text-center " style="height: 105px; background-color: #032830;">
                                <br>
                                <i class='bx bxs-shopping-bags fs-2'></i>
                                <span class="fs-4 fw-bold" style="color: #6edff6;"> ALL PRODUCT</span>
                                <br>
                                <span class="fs-5 fw-bold" style="color: #ffc107;"><?php echo $product ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 px-1  rounded g-1 ml-4 offset-1 offset-lg-0">
                        <div class="row g-1 col-12 ">
                            <div class="col-1" style="background-color: #055160;"></div>
                            <div class="col-11  text-white text-center " style="height: 105px; background-color: #032830;">
                                <br>
                                <i class="bi bi-person-fill fs-2"></i>
                                <span class="fs-4 fw-bold" style="color: #6edff6;"> ALL USERS</span>
                                <br>
                                <span class="fs-5 fw-bold" style="color: #ffc107;"><?php echo $users ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 px-1  rounded g-1 ml-4 offset-1 offset-lg-0">
                        <div class="row g-1 col-12 ">
                            <div class="col-1" style="background-color: #055160;"></div>
                            <div class="col-11  text-white text-center " style="height: 105px; background-color: #032830;">
                                <br>
                                <i class="bi bi-coin fs-2"></i>
                                <span class="fs-4 fw-bold" style="color: #6edff6;"> TODAY INCOME</span>
                                <br>
                                <?php

                                $today = date("Y-m-d");
                                $thismonth = date("m");
                                $thisyear = date("Y");

                                $a = "0";
                                $b = "0";
                                $c = "0";
                                $e = "0";
                                $f = "0";

                                $invoice_rs = Database::search("SELECT*FROM `invoice`");
                                $invoice_num = $invoice_rs->num_rows;

                                for ($x = 0; $x < $invoice_num; $x++) {
                                    $invoice_data = $invoice_rs->fetch_assoc();

                                    $f = $f + $invoice_data["qty"]; //total qty

                                    $d = $invoice_data["date"];
                                    $splitDate = explode(" ", $d); //separate date from time
                                    $pdate = $splitDate[0]; //sold date

                                    if ($pdate == $today) {
                                        $a = $a + $invoice_data["total"];
                                        $c = $c + $invoice_data["qty"];
                                    }

                                    $splitMonth = explode("-", $pdate); //separate date as year,month & date
                                    $pyear = $splitMonth[0]; //year
                                    $pmonth = $splitMonth[1]; //month

                                    if ($pyear == $thisyear) {
                                        if ($pmonth == $thismonth) {
                                            $b = $b + $invoice_data["total"];
                                            $e = $e + $invoice_data["qty"];
                                        }
                                    }
                                }

                                ?>
                                <span class="fs-5 fw-bold" style="color: #ffc107;">Rs <?php echo $a; ?>.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 px-1  rounded g-1 ml-4 offset-1 offset-lg-0">
                        <div class="row g-1 col-12 ">
                            <div class="col-1" style="background-color: #055160;"></div>
                            <div class="col-11  text-white text-center " style="height: 105px; background-color: #032830;">
                                <br>
                                <i class="bi bi-clipboard2-pulse fs-2"></i>
                                <span class="fs-4 fw-bold" style="color: #6edff6;">TODAY SELLING</span>
                                <br>
                                <span class="fs-5 fw-bold" style="color: #ffc107;"><?php echo $c; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 px-1  rounded g-1 ml-4 offset-1 offset-lg-0">
                        <div class="row g-1 col-12 ">
                            <div class="col-1" style="background-color: #055160;"></div>
                            <div class="col-11  text-white text-center " style="height: 105px; background-color: #032830;">
                                <br>
                                <i class='bx bxs-bar-chart-alt-2 fs-2'></i>
                                <span class="fs-4 fw-bold" style="color: #6edff6;">TOTAL SELLING</span>
                                <br>
                                <span class="fs-5 fw-bold" style="color: #ffc107;"><?php echo $f; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 bg-danger">
                    <hr>
                </div>
                <div class="col-12" style="display: flex; align-items: center; justify-content: center;">
                    <div class=" col-10 col-lg-4 my-3 rounded bg-body">
                        <div class="row g-1" >
                            <div class="col-12 text-center">
                                <label class="form-label fs-4 fw-bold text-decoration-underline">most selling product</label>
                            </div>
                            <?php

                            $freq_rs = Database::search("SELECT `product_id`,COUNT(`product_id`) AS `value_occarance`
                                FROM `invoice` WHERE `date` LIKE '%" . $today . "%' GROUP BY `product_id` ORDER BY
                                `value_occarance` DESC LIMIT 1");

                            $freq_num = $freq_rs->num_rows;
                            if ($freq_num > 0) {
                                $freq_data = $freq_rs->fetch_assoc();

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $freq_data["product_id"] . "'");
                                $product_data = $product_rs->fetch_assoc();

                                $image_rs = Database::search("SELECT *FROM `images` WHERE `product_id`='" . $freq_data["product_id"] . "'");
                                $image_data = $image_rs->fetch_assoc();

                                $qty_rs = Database::search("SELECT SUM(`qty`) AS `qty_total` FROM `invoice` WHERE
                                    `product_id`='" . $freq_data["product_id"] . "' AND `date` LIKE '%" . $today . "%'");
                                $qty_data = $qty_rs->fetch_assoc();

                            ?>
                                <div class="col-12 text-center shadow">
                                    <img src="<?php echo $image_data["path"]; ?>" class="img-fluid rounded-top" style="height: 250px;" />
                                </div>
                                <div class="col-12 text-center my-3">
                                    <span class="fs-5 fw-bold"><?php echo $product_data["title"]; ?></span><br />
                                    <span class="fs-6"><?php echo $qty_data["qty_total"]; ?> items</span><br />
                                    <span class="fs-6">Rs. <?php echo $qty_data["qty_total"] * $product_data["price"]; ?> .00</span>
                                </div>

                            <?php
                            } else {
                            ?>
                                <div class="col-12 text-center shadow">
                                    <img src="resources/images/empty.svg" class="img-fluid rounded-top" style="height: 250px;" />
                                </div>
                                <div class="col-12 text-center my-3">
                                    <span class="fs-5 fw-bold">------</span><br />
                                    <span class="fs-6">---- items</span><br />
                                    <span class="fs-6">Rs. ------- .00</span>
                                </div>


                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>



            </div>
        </section>

        <script src="slyder.js"></script>
        <script src="script.js"></script>

    </body>

    </html>
<?php
}

?>