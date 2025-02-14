<?php 
include('../connection.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Melko Misek DSD</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../images/bitcoin.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- custom CSS not built in -->
        <link href="css/customCss.css" rel="stylesheet" />
        <script src="js/clock.js"></script>
    </head>
    <body onload="realtimeClock()">
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="nav-bar">
            <div class="container">
                <!-- LOGO -->
                <a class="navbar-brand" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/">Palo Riso Projekt</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <!-- navbar -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/">Home</a></li>
                        <li class="nav-item"><a class="nav-link " href="#crypto">Crypto</a></li>
                        <li class="nav-item"><a class="nav-link " href="#stocks">Stocks</a></li>
                        <li class="nav-item"><a class="nav-link " href="#indices">Indices</a></li>
                        <li class="nav-item"><a class="nav-link " href="#realEstates">Real Estates</a></li>
                        <li class="nav-item"><a class="nav-link " href="#metals">Metals</a></li>
                        <li class="nav-item"><a class="nav-link " href="#bonds">Bonds</a></li>
                        <li class="nav-item"><a class="nav-link " href="#investPlanner">Invest Planner</a></li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php if($user->isLoggedIn()) { ?>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/"><?php echo $_SESSION['firstName']. " ". $_SESSION['lastName'];?></a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/logout.php">Logout</a></li>
                        <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/sign.php">Sign</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/login.php">Login</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- log in + logout -->

            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-2" id="header">
            <div class="container">
                <div class="text-center" class="bg-image bg-opacity-10" style="background-image: url('../images/welcomePicture.jpg'); height: 400px;">
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <!-- VELKY JEDEN PRISPEVOK -->
                    <div class="card mb-4" id="crypto">
                        <a href="#!"><img id="introImage" class="card-img-top" src="../images/crypto.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">January 1, 2021</div>
                            <h2 class="card-title">CRYPTO</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="crypto.php">Read more →</a>
                        </div>
                    </div>
                    <!-- VELKY JEDEN PRISPEVOK -->
                    <div class="card mb-4" id="stocks">
                        <a href="#!"><img id="introImage" class="card-img-top" src="../images/stocks.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">January 1, 2021</div>
                            <h2 class="card-title">STOCKS</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="stocks.php">Read more →</a>
                        </div>
                    </div>
                    <!-- VELKY JEDEN PRISPEVOK -->
                    <div class="card mb-4" id="indices">
                        <a href="#!"><img id="introImage" class="card-img-top" src="../images/indices.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">January 1, 2021</div>
                            <h2 class="card-title">INDICES</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="indices.php">Read more →</a>
                        </div>
                    </div>
                    <!-- VELKY JEDEN PRISPEVOK -->
                    <div class="card mb-4" id="realEstates">
                        <a href="#!"><img id="introImage" class="card-img-top" src="../images/realEstates.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">January 1, 2021</div>
                            <h2 class="card-title">REAL ESTATES</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="realEstates.php">Read more →</a>
                        </div>
                    </div>
                    <!-- VELKY JEDEN PRISPEVOK -->
                    <div class="card mb-4" id="metals">
                        <a href="#!"><img id="introImage" class="card-img-top" src="../images/metals.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">January 1, 2021</div>
                            <h2 class="card-title">METALS</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="metals.php">Read more →</a>
                        </div>
                    </div>
                    <!-- VELKY JEDEN PRISPEVOK -->
                    <div class="card mb-4" id="bonds">
                        <a href="#!"><img id="introImage" class="card-img-top" src="../images/bonds.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">January 1, 2021</div>
                            <h2 class="card-title">BONDS</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="bonds.php">Read more →</a>
                        </div>
                    </div>
                    <!-- VELKY JEDEN PRISPEVOK -->
                    <div class="card mb-4" id="investPlanner">
                        <a href="#!"><img id="introImage" class="card-img-top" src="../images/investPlanner.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">January 1, 2021</div>
                            <h2 class="card-title">INVEST PLANNER</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="investPlanner.php">Read more →</a>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                            <a href="#header"><button class="btn btn-primary mb-3">Back to top</button></a>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <!-- Change password-->
                    <?php if($user->isLoggedIn()) { ?>
                    <div class="card mb-4">
                    <div class="card-header text-center"><?php echo $_SESSION['firstName']. " ". $_SESSION['lastName']." "; ?>- change your password here</div>

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 col-lg-8">
                            <li class="nav-item"><a href="http://localhost/semestralny_projekt_dsd_paloriso/dist/changePass.php"> <button class="btn btn-primary mt-2 mb-2">Change Password</button></a></li>
                        </ul>
                    </div>
                    <?php } ?>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header text-center">Fast links</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li class="nav-item"><a class="nav-link " href="http://localhost/semestralny_projekt_dsd_paloriso/dist/">Home</a></li>
                                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="crypto.php">Crypto</a></li>
                                        <li class="nav-item"><a class="nav-link " href="stocks.php">Stocks</a></li>
                                        <li class="nav-item"><a class="nav-link " href="indices.php">Indices</a></li>                     
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li class="nav-item"><a class="nav-link " href="realEstates.php">Real Estates</a></li>
                                        <li class="nav-item"><a class="nav-link " href="metals.php">Metals</a></li>
                                        <li class="nav-item"><a class="nav-link " href="bonds.php">Bonds</a></li>
                                        <li class="nav-item"><a class="nav-link " href="investPlanner.php">Invest Planner</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header text-center">Time and Date</div>
                        <div class="card-body">
                            <div id="clock"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Semestrálny projekt DSD - Pavol Melko, Richard Mišek 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

