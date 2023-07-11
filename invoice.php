<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INVOICE | දොරකඩට.Lk</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="icon" href="image/headlogo.png">

</head>

<body class="body2">
    <div class="container-fluid ">
        <?php include "header.php";

        require "connection.php";

        if (isset($_SESSION["u"])) {
            $umail = $_SESSION["u"]["email"];
            $oid = $_GET["id"];
        ?>
            <div class="col-12  bg-light mt-4 mb-4">
                <div class="row">

                    <div class="col-12 mb-4">
                        <div class="row">
                            <div class="col-5">
                                <h2 class="fw-bold">දොරකඩට.Lk</h2>
                                <h4> Mathugama, Kluthara, Sri Lanka</h4>
                                <span>+94 112 785694</span><br />
                                <span>දොරකඩට@gmail.Lk</span>
                            </div>

                            <?php

                            $address_rs = Database::search("SELECT * FROM `users_address` WHERE `users_email`='" . $umail . "'");
                            $address_data = $address_rs->fetch_assoc();

                            ?>
                            <div class="col-6 text-end mt-4 mr-3">
                                <h1 class="text-secondary">Invoice To</h1>
                                <span class="fw-bold">Date & Time of Invoice : </span><br />
                                <span>31-10-2022 00:00:00</span>
                                <h2><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></h2>
                                <span><?php echo $address_data["address"]; ?></span><br />
                                <span><?php echo $umail; ?></span>
                            </div>
                        </div>
                    </div>

                    <?php

                    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
                    $invoice_data = $invoice_rs->fetch_assoc();

                    ?>
                    <div class="col-12">
                        <hr class="border border-2 border-success" />
                    </div>

                    <div class="col-12">
                        <table class="table">

                            <div class="body">
                                <div class="bg-danger">
                                    <div class="col-12 ">
                                        <div class="row text-center">
                                            <div class="col-2 border-end">NO.</div>
                                            <div class="col-3 border-end">ITEM Title</div>
                                            <div class="col-2 border-end">PRICE</div>
                                            <div class="col-2 border-end">QTY</div>
                                            <div class="col-2 border-end">TOTAL</div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="table_body mt-3">
                                <div class="row text-center">
                                    <div class="col-2 border-end">
                                        <p><?php echo $oid; ?></p>
                                    </div>
                                    <?php
                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_data["product_id"] . "'");
                                    $product_data = $product_rs->fetch_assoc();
                                    ?>
                                    <div class="col-3 border-end">
                                        <p class="bold"><?php echo $product_data["title"]; ?></p>

                                    </div>
                                    <div class="col-2 border-end">
                                        <p>Rs <?php echo $product_data["price"]; ?></p>
                                    </div>
                                    <div class="col-2 border-end">
                                        <p><?php echo $invoice_data["qty"]; ?></p>
                                    </div>
                                    <div class="col-2 border-end">
                                        <p>Rs <?php echo $invoice_data["total"]; ?></p>
                                    </div>
                                </div>


                            </div>

                        </table>
                    </div>

                    <div class="col-12">
                        <hr class="border border-2 border-success" />
                    </div>

                    <div class="col-12 mb-4">
                        <div class="row ">
                            <div class="col-4">
                                <h3 class="text-danger text-center">Payment Method</h3>
                                <div class="col-12 row text-end" style="cursor: pointer; display: flex; justify-content: center; align-items: center;">
                                    <div class="col-3"><img src="image/payicon/visa.png"></div>
                                    <div class="col-3"><img src="image/payicon/masterd.png"></div>
                                    <div class="col-3"><img src="image/payicon/safekey.png"></div>
                                    <div class="col-3"><img src="image/payicon/american.png"></div>
                                </div>
                            </div>

                            <div class="col-8 text-end mt-4">
                            <?php
                                    
                                    $city_rs = Database::search("SELECT * FROM `city` WHERE `id`='".$address_data["city_id"]."'");
                                    $city_data = $city_rs->fetch_assoc();                                   

                                    $t = $invoice_data["total"];        
                                    
                                    ?>
                                <div class="text-center">
                                    <p class="text-success fw-bolder col-12">
                                        <span class="col-6 offset-2">SUB TOTAL</span>
                                        <span class="col-6 offset-3">Rs. <?php echo $t; ?></span>
                                    </p>

                                    <!-- <p class="text-success fw-bolder col-12">
                                        <span class="col-6 offset-2"> Tax Vat 2%</span>
                                        <span class="col-6 offset-3">Rs. 2,000</span>
                                    </p> -->

                                    <p class="text-success fw-bolder col-12">
                                        <span class="col-6 offset-2">Discount </span>
                                        <span class="col-6 offset-3">Rs.0</span>
                                    </p>

                                    <p class="text-success fw-bolder col-12">
                                        <span class="col-6 offset-2">Grand Total</span>
                                        <span class="col-6 offset-3">Rs. <?php echo $t; ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer">
                        <h3 class="text-center fw-bolder text-primary text-decoration-underline">Thank you come back...</h3>
                    </div>
                    <div class="col-12 btn-toolbar justify-content-end">
                        <button class="btn btn-danger me-2" onclick="printInvoice();"><i class="bi bi-printer-fill" ></i> Export Invoice</button>
                    </div>

                </div>
            </div>



    </div>
    </div>
<?php
        }

?>
</body>

</html>