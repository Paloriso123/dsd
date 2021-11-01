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
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- custom CSS not built in -->
        <link href="css/customCss.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            <a class="navbar-brand" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/">Palo Riso Projekt</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/">Home</a></li>
                    <li class="nav-item"><a class="nav-link " href="#">Blog</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/sign.php">Sign</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <div id="backgroundSignDiv">
            <div id="fullScreenSignDiv" class="container">
                <!-- align-items-center z nejakeho dovodu nefunguje -->
                <div class="row align-items-center">

                    <div class="col-md-2"></div>

                    <form id="signForm" class="col-md-8">
                        <div class="form-group">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Enter First name">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Enter Last name">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" placeholder="Enter age">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password">
                            <!-- spravime REGEX ? -->
                        </div>
                        <div class="form-group">
                            <label for="passwordAgain">Password again</label>
                            <input type="password" class="form-control" id="passwordAgain" placeholder="Repeat your passowrd">
                            <!-- spravime REGEX ? -->
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                    </form>

                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>