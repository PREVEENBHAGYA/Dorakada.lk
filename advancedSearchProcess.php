<div class="col-12 container-fluid">
        <div class="row gap-2 mb-2" style="display: flex; justify-content: center; align-items: center;">
<?php

require "connection.php";

$search_txt = $_POST["t"];
$category = $_POST["cat"];
$brand = $_POST["b"];
$condition = $_POST["con"];
$Activetime = $_POST["Act"];
$price_from = $_POST["pf"];
$price_to = $_POST["to"];
$sort = $_POST["s"];

$query = "SELECT * FROM `product`";
$status = 0;

if ($sort == 0) {

    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%'";
        $status = 1;
    }

    if ($category != 0 && $status == 0) {
        $query .= " WHERE `category_id`='" . $category . "'";
        $status = 1;
    } else if ($category != 0 && $status != 0) {
        $query .= " AND `category_id`='" . $category . "'";
    }

    $pid = 0;
    if ($brand != 0) {
        $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id`='" . $brand . "'");
        $brand_num = $brand_rs->num_rows;
        for ($x = 0; $x < $brand_num; $x++) {
            $brand_data = $brand_rs->fetch_assoc();
            $pid = $brand_data["id"];
        }

        if ($status == 0) {
            $query .= "WHERE `brand_id`= '" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= "AND `brand_id`='" . $pid . "'";
        }
    }

    if ($category != 0) {
        $category_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $category . "'");
        $category_num = $category_rs->num_rows;
        for ($x = 0; $x < $category_num; $x++) {
            $category_data = $category_rs->fetch_assoc();
            $pid = $category_data["id"];
        }

        if ($status == 0) {
            $query .= "WHERE `category_id`= '" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= "AND `category_id`='" . $pid . "'";
        }
    }


    if ($condition != 0 && $status == 0) {
        $query .= "WHERE `condition_id`='" . $condition . "'";
        $status = 1;
    } else if ($condition != 0 && $status != 0) {
        $query .= "AND `condition_id`='" . $condition . "'";
    }



    if (!empty($price_from) && empty($price_to)) {
        if ($status == 0) {
            $query .= "WHERE `price` >= '" . $price_from . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= "AND `price` >= '" . $price_from . "'";
        }
    } else if (empty($price_from) && !empty($price_to)) {
        if ($status == 0) {
            $query .= "WHERE `price` <= '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= "AND `price` <= '" . $price_to . "'";
        }
    } else if (!empty($price_from) && !empty($price_to)) {
        if ($status == 0) {
            $query .= "WHERE `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= "AND `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
        }
    }
} else if ($sort == 1) {
    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `price` ASC";
        $status = 1;
    }
} else if ($sort == 2) {
    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `price` DESC";
        $status = 1;
    }
} else if ($sort == 3) {
    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `qty` ASC";
        $status = 1;
    }
} else if ($sort == 4) {
    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `qty` DESC";
        $status = 1;
    }
}

if ($_POST["page"] != "0") {

    $pageno = $_POST["page"];
} else {

    $pageno = 1;
}

$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;

$results_per_page = 6;
$number_of_pages = ceil($product_num / $results_per_page);

$viewed_results_count = ((int)$pageno - 1) * $results_per_page;

$query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
$results_rs = Database::search($query);
$results_num = $results_rs->num_rows;

while ($results_data = $results_rs->fetch_assoc()) {
?>

    
            <div class="card " style="width: 18rem;">
                <?php

                $image_rs = Database::search("SELECT * FROM `images`  WHERE `product_id` = '" . $results_data["id"] . "'");
                $image_data = $image_rs->fetch_assoc();

                ?>
                <img src="<?php echo $image_data["path"]; ?>" class="card-img-top" style="height: 275px;">
                <div class="card-body">
                    <h5 class="card-title text-danger"><?php echo $results_data["title"]; ?></h5>
                    <h6 class="text-center text-warning"><i class="bi bi-check2-square"></i> In Stock</h6> <br />
                    <p class="text-center text-primary">Rs <?php echo $results_data["price"]; ?>.00</p>                   
                </div>
                <div class="col-12 mb-1">
                    <div class="row">
                    <div class="col-6 d-grid">
                        <button class="btn btn-danger">add to cart</button>
                    </div>
                    <div class="col-6 d-grid">
                        <button class="btn btn-primary">add to cart</button>
                    </div>
                    </div>
                    
                </div>
            </div>
            <?php
}

?>
        </div>
    </div>




<div class="offset-lg-4 col-12 col-lg-4 mb-3">
    <div class="row">

        <div class="pagination">
            <a <?php if ($pageno <= 1) {
                    echo "#";
                } else {
                ?> onclick="advancedSearch('<?php echo ($pageno - 1); ?>')" <?php
                                                                        } ?>>&laquo;</a>

            <?php

            for ($page = 1; $page <= $number_of_pages; $page++) {

                if ($page == $pageno) {

            ?>
                    <a onclick="advancedSearch('<?php echo ($page); ?>')" class="active">
                        <?php echo $page; ?>
                    </a>
                <?php

                } else {

                ?>
                    <a onclick="advancedSearch('<?php echo ($page); ?>')">
                        <?php echo $page; ?>
                    </a>
            <?php

                }
            }

            ?>

            <a <?php if ($pageno >= $number_of_pages) {
                    echo "#";
                } else {
                ?> onclick="advancedSearch('<?php echo ($pageno + 1); ?>')" <?php
                                                                        } ?>>&raquo;</a>
        </div>

    </div>
</div>

