<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="tailwind.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css">

</head>

<body>

    <div class="col-12 hed">
        <div class="row mt-1 mb-1">
            <div class="col-3 col-lg-3 align-self-start mt-1">
                <!-- <span class=" fw-bold fs-3 text-center" style="margin-left: 20px; font-family: 'BlueCashews'; color: wheat;">City Market</span> -->
                <img src="image/Untitled.png">
            </div>

            <div class="col-9">
                <div class="row">
                    <div class="col-12 col-lg-7 mt-3">
                        <?php

                        session_start();

                        if (isset($_SESSION["u"])) {

                            $data = $_SESSION["u"];

                        ?>

                            <span class="text-lg-start"><b>Welcome</b><b class="fw-bold text-warning"> <?php echo $data["fname"]; ?></b></span> |
                            <span class="text-lg-start fw-bold signout siot" onclick="custermerlogout();">Sign Out</span>

                        <?php

                        } else {

                        ?>

                            <a href="login.php" class="text-decoration-none fw-bold siot">SignUp OR SignIn</a>

                        <?php

                        }

                        ?>
                    </div>



                    <div class="col-5 col-lg-2 text-end mt-3">

                        <div class="btn btn-warning dropstart">
                            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu Start
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="watchlist.php">Watch List</a></li>
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-1 col-lg-1" style="display: flex; flex-direction: row; justify-content: end; align-items: end;" onclick="window.location='watchlist.php';"><i class="bi bi-heart-fill fs-4 text-warning" style="margin-top: -10px;"></i></div>
                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>