<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login | දොරකඩට </title>

    <link rel="stylesheet" href="tailwind.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="tailwind.css">
    <link rel="icon" href="image/headlogo.png">
</head>

<body>


    <!---Sign In--->
    <div class="" id="signIn">
        <section class="vh-200 " style="background-color: #dc3545;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="image/dorakadalogin.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>

                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class=" p-4 p-lg-5 text-black">


                                        <?php

                                        $email = "";
                                        $password = "";

                                        if (isset($_COOKIE["email"])) {
                                            $email = $_COOKIE["email"];
                                        }

                                        if (isset($_COOKIE["password"])) {
                                            $password = $_COOKIE["password"];
                                        }

                                        ?>
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <img src="image/Untitled.png" alt="" srcset="">
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3 text-center text-warning fs-3" style="letter-spacing: 1px;">Sign Into Your Account</h5>
                                        <div class="bx-flashing col-12 text-center text-danger mb-2" id="msg2"></div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Email address</label>
                                            <input value="<?php echo $email; ?>" type="email" class="form-control" id="email1" />

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label">Password</label>

                                            <input value="<?php echo $password; ?>" type="password" class="form-control col-8" id="password1" />
                                        </div>

                                        <div class="flex items-start mt-2 mb-2">
                                            <label class="inline-flex relative items-center mr-5 cursor-pointer">
                                                <input type="checkbox" value="" class="sr-only peer" checked id="rememberme">
                                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-red-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>
                                                <span class="ml-3 text-sm font-medium text-dark">Remember Me</span>
                                            </label>
                                            <a href="#" class="form__link ml-auto text-sm text-blue-700 hover:underline dark:text-blue-500" onclick="forgotPassword();">Forgot password?</a>
                                        </div>

                                        <div class="pt-1 mb-4 col-12" style="align-items: center; justify-content: center; display: flex;">
                                            <button class="btn btn-primary d-grid  gradient-custom-2 mb-3" style="width: 50%;" onclick="signIn();">Login</button>
                                        </div>

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a class="form__link" style="cursor: pointer;" onclick="togalPage();"> Create account</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!---Sign In--->

    <!---Sign Up--->
    <div class="d-none" id="signUp">
        <section class="vh-200" style="background-color: #dc3545;">
            <div class=" container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="image/Untitled.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                    <img src="image/dorakadalogin.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>

                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <img src="image/Untitled.png" alt="" srcset="">
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3 text-center text-warning fs-3" style="letter-spacing: 1px;">Create New Account</h5>

                                        <div class="d-none" id="msgalert">
                                            <div class="alert alert-danger border-5 border-dark shadow-lg text-center " role="alert" id="alert">
                                                <i class=' bx-flashing' id="showmsg"></i>
                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">First Name</label>
                                            <input type="email" class="form-control " id="firstname" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Last Name</label>
                                            <input type="email" class="form-control " id="lastname" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Phone Number</label>
                                            <input type="email" class="form-control " id="mobile" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Gender</label>
                                            <select class="bg-gray-50 border border-gray-300 text-gray-900 form-control" id="gender">
                                                <?php

                                                require "connection.php";

                                                $gr = Database::search("SELECT * FROM `gender`");
                                                $g = $gr->num_rows;

                                                for ($a = 0; $a < $g; $a++) {
                                                    $b = $gr->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $b["id"]; ?>"><?php echo $b["gender_name"]; ?></option>

                                                <?php

                                                }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Email address</label>
                                            <input type="email" class="form-control form-control-lg" id="email" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input type="password" class="form-control form-control-lg" id="password" />
                                        </div>
                                        <button class="offset-2 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800" onclick="signUp();">
                                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75  dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                Create New account
                                            </span>
                                        </button>

                                        <!-- <div class="pt-1 mb-4 col-12" style="align-items: center; justify-content: center; display: flex;">
                                            <button class="btn btn-primary d-grid  gradient-custom-2 mb-3" style="width: 50%;" onclick="signUp();">Sign Up</button>
                                        </div> -->

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">All Rady have an account? <span class="form__link" style="cursor: pointer;" onclick="togalPage();"> Sign in</span></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!---Sign Up--->

    <script src="script.js"></script>
</body>

</html>