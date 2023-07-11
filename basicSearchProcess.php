<?php

require "connection.php";

$txt = $_POST["t"];
$select = $_POST["s"];

$query = "SELECT * FROM `product`";

if (!empty($txt) && $select == 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'";
} else if (empty($txt) && $select != 0) {
    $query .= " WHERE `category_id` = '" . $select . "'";
} else if (!empty($txt) && $select != 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%' AND `category_id` = '" . $select . "'";
}

?>




    <div class=" col-12" >
        <div class="row gap-2 ml-5"  style=" display: flex; align-items: center;justify-content: center;">
            <!-- filter -->
            <!-- <div class="col-11 col-lg-2 mx-3 my-3 border border-warning rounded">
                            <div class="row">
                                <div class="col-12 mt-3 shadow-lg" style="font-family: monospace; ">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label  fs-3">Filter</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="text" placeholder="Search..." class="form-control " id="s"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <label class="form-label ">Price</label>
                                        </div>
                                        <div class="col-12">
                                            <hr  />
                                        </div>

                                        <div class="col-12 text-warning">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="r2" id="h">
                                                <label class="form-check-label" for="h">
                                                Price-High to Low
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 text-warning">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="r2" id="l">
                                                <label class="form-check-label" for="l">
                                                Price-Low to High
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <label class="form-label">Alphabetical</label>
                                        </div>
                                        <div class="col-12">
                                            <hr  />
                                        </div>

                                        <div class="col-12 text-warning">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="r3" id="b">
                                                <label class="form-check-label" for="b">
                                                A to Z
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 text-warning">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="r3" id="u">
                                                <label class="form-check-label" for="u">
                                                    Z to A
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center mt-3 mb-3">
                                            <div class="row g-2">
                                                <div class=" col-6 d-grid">
                                                    <button class="btn btn-outline-info fw-bold" onclick="sortserching(0);">filter</button>
                                                </div>
                                                <div class=" col-6 d-grid">
                                                    <button class="btn btn-outline-danger fw-bold" onclick="clearsort();">Clear</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- filter -->
            

            <?php


            if ("0" != ($_POST["page"])) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 3;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>

                <div class="card col-6 col-lg-2 mt-2 mb-2 border border-success searchards" style="width: 17rem;">

                    <?php

                    $image_rs = Database::search("SELECT * FROM `images`  WHERE `product_id` = '" . $selected_data["id"] . "'");
                    $image_data = $image_rs->fetch_assoc();
                   
                    ?>

                    <img src="<?php echo $image_data["path"]; ?>" class="card-img-top img-thumbnail border border-warning shadow shadow-lg mt-4" style="height: 150px; width: auto; " />
                    <div class="card-body ms-0 m-0 text-center">
                        <h5 class="card-title fs-6"><?php echo $selected_data["title"]; ?> <span class="badge bg-info"></span></h5>
                        <span class="card-text text-primary">Rs. <?php echo $selected_data["price"]; ?> .00</span> <br />

                        <?php

                        if ($selected_data["qty"] > 0) {

                        ?>

                            <div class="col-12 row m-1 mb-3 my-2">
                                <a class="add-to-cart btn btn-outline-primary rounded-2 col-lg-6 mt-1" href="#" role="button"  onclick="addToCart(<?php echo $product_data['id']; ?>);"><i
                                    class='bx bxs-cart-add' ></i>Add cart</a>
                                <a class="btn btn-outline-success rounded-2 col-lg-6 mt-1" href="#" role="button"><i
                                    class='bx bxs-heart-circle'></i>Wathlist</a>
                                <a class="btn btn-outline-danger rounded-2 col-lg-12 mt-1" href="<?php echo "singalproduct.php?id=". $product_data['id']; ?>" role="button"><i
                                    class='bx bxs-purchase-tag'></i>Buy Now</a>
                            </div>
                        <?php

                        } else {

                        ?>

                            <div class="col-12 row m-1 mb-3 my-2">
                                <a class="add-to-cart btn btn-outline-primary rounded-4 col-lg-6 mt-1" href="#" role="button" "><i
                                    class='bx bxs-cart-add bx-burst' ></i>Add cart</a>
                                <a class="btn btn-outline-success rounded-4 col-lg-6 mt-1" href="#" role="button"><i
                                    class='bx bxs-heart-circle bx-burst'></i>Wathlist</a>
                                <a class="btn btn-outline-danger rounded-4 col-lg-12 mt-1" href="#" role="button"><i
                                    class='bx bxs-purchase-tag bx-burst'></i>Buy Now</a>
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
    
    <!--  -->
    <div class=" col-12   mb-3" style="cursor: pointer; display: flex; align-items: center; justify-content: center;">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                } ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!--  -->
</div>



