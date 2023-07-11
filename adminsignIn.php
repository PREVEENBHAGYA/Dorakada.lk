<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Sign IN | දොරකඩට</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="tailwind.css" />
    <link rel="icon" href="img/citymarkat.png">

</head>

<body class="" >
    <div class="col-12 adtex" style="display: flex;">
        <div class="col-12 mt-3 text-warning fs-1 fw-bolder text-decoration-underline text-center"> Welcome Admin login Page</div>
    </div>

    <div class="col-12 mt-3" style="background-color: #dc3545; height: 100vh;">
        <div class="row" style="display: flex; align-items: center; justify-content: center;">


            <!-- <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass rounded-4 " style="background: linear-gradient(90deg, rgba(207,51,80,1) 0%, rgba(9,26,121,1) 35%, rgba(0,255,98,1) 100%);">
                    <div class="card-body px-4 py-5 px-md-5 border border-success rounded-5 bg-blue-200 mt-5 mb-5">
                        <form>
                            <div class="col-4 offset-5 mt-5">
                                <img src="img/usar_icon/admin_icon.svg" class="adprlog mt-4" style="width: 80px; height: 80px;">
                            </div>
                            <div class="col-12">
                                <label class="col-12 text-center fs-3 fw-bold text-dark" style="font-family: 'BlueCashews'">Admin to Login</label>
                                <label class="col-10 fs-5 fw-bold mt-5 ml-3" style="font-family: 'BlueCashews'">Enter your Email</label>
                                <div class="field mt-2 ml-3 mb-5">
                                    <p class="control has-icons-left has-icons-right">
                                        <input class="input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="email" placeholder="Email" id="email">
                                        <span class="icon is-small is-left">
                                            <i class='bx bxs-envelope'></i>
                                        </span>
                                    </p>
                                </div>
                                <div class="col-11 d-grid">
                                    <button type="button" class="offset-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="adminlogin();">Send your Verifycation code</button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>-->
            <!---modal-->
            <div class="modal" tabindex="-1" id="adminverificationModal">
                <div class="modal-dialog">
                    <div class="modal-content border border-success">
                        <div class="modal-header col-12">
                            <h5 class=" text-success text-center  fs-3 fw-bold text-decoration-underline">Admin Verification</h5>
                        </div>
                        <div class="modal-body">
                            <label class="form-label text-success">Enter Your Verification Code</label>
                            <input type="text" class="form-control border border-warning" placeholder="******" id="verification">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="text-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="verifyadmin();"> Verify</button>
                        </div>
                    </div>
                </div>
            </div>
            <!---modal -->

                <!-- Section: Design Block -->
                <section class=" text-center text-lg-start">
                    <style>
                        .rounded-t-5 {
                            border-top-left-radius: 0.5rem;
                            border-top-right-radius: 0.5rem;
                        }

                        @media (min-width: 992px) {
                            .rounded-tr-lg-0 {
                                border-top-right-radius: 0;
                            }

                            .rounded-bl-lg-5 {
                                border-bottom-left-radius: 0.5rem;
                            }
                        }
                    </style>
                    <div class=" mb-3" style="background-color: #dc3545;">
                        <div class="row g-0 d-flex align-items-center" >
                            <div class="col-lg-4 d-none d-lg-flex">
                                <img src="image/undraw_projections_re_ulc6.svg" alt="Trendy Pants and Shoes" class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body py-5 px-md-5">
                                    <div class="col-4 offset-5 mt-5">
                                        <img src="image/admin_icon.svg" class="adprlog mt-4" style="width: 80px; height: 80px;">
                                    </div>
                                    <!-- Email input -->
                                    <label class="col-10 fs-5 fw-bold mt-5 ml-3" style="font-family: 'BlueCashews';margin-left: 100px;">Enter your Email</label>
                                    <div class=" mt-2 ml-3 mb-5" style="display: flex; align-items: center; justify-content: center;">
                                        <p class="control has-icons-left has-icons-right col-10">
                                            <input class="input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="email" placeholder="Email" id="email">
                                            <span class="icon is-small is-left">
                                                <i class='bx bxs-envelope'></i>
                                            </span>
                                        </p>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="col-11 d-grid">
                                        <button type="button" class="offset-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="adminlogin();">Send your Verifycation code</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Section: Design Block -->

                <script src="script.js"></script>
                <script src="bootstrap.bundle.js"></script>
</body>

</html>