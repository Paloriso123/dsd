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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <!-- LOGO -->
                <a class="navbar-brand" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/">Palo Riso Projekt</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <!-- navbar -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                        <li class="nav-item"><a class="nav-link " href="http://localhost/semestralny_projekt_dsd_paloriso/dist/">Home</a></li>
                        <li class="nav-item"><a class="nav-link " href="crypto.php">Crypto</a></li>
                        <li class="nav-item"><a class="nav-link " href="stocks.php">Stocks</a></li>
                        <li class="nav-item"><a class="nav-link " href="indices.php">Indices</a></li>
                        <li class="nav-item"><a class="nav-link " href="realEstates.php">Real Estates</a></li>
                        <li class="nav-item"><a class="nav-link " href="metals.php">Metals</a></li>
                        <li class="nav-item"><a class="nav-link " href="bonds.php">Bonds</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="investPlanner.php">Invest Planner</a></li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php if($user->isLoggedIn()) { ?>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/changePass.php"><?php echo $_SESSION['firstName']. " ". $_SESSION['lastName'];?></a></li>
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
                <h1>INVEST PLANNER</h1>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <!-- VELKY JEDEN PRISPEVOK -->
                    <div class="card mb-4" id="">
                        <div class="card-body">
                            <canvas id="myChart" style="width:100%;max-width:810px"></canvas>
                            <canvas id="myChart2" style="width:100%;max-width:810px"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Time and Date</div>
                        <div class="card-body">
                            <div id="clock"></div>
                        </div>
                    </div>
                    <!-- Invest planner-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="mt-2">
                                    <label for="startingMoney">Starting money</label>
                                    <input type="number" name="startingMoney" placeholder="Your starting money" id="startingMoney">
                                </div>
                                <div class="mt-2">
                                    <label for="interestRate">Interest rate</label>
                                    <input type="number" name="interestRate" placeholder="Value of interest rate" id="interestRate">
                                </div>
                                <div class="mt-2">
                                    <label for="years">Investing age</label>
                                    <input type="number" name="years" placeholder="Age of investing" id="years">
                                </div>
                                <div class="mt-2">
                                    <button class="btn btn-primary " onclick="calculate()">GO!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p id="finalInfo"></p>
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
        <!-- pridanie Chart.js kniznice -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
        <script>
            // years of investing count {n}
            document.getElementById("myChart").style.display = "none";
            document.getElementById("myChart2").style.display = "block";

            var xValues = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
            var yValues = [100,200,300,400,500,600,700,800,900,1000,1100,1200,1300,1400,1500,1600];

            new Chart("myChart2", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "rgba(0,0,255,0)",
                borderColor: "rgba(0,0,255,0)",
                data: yValues
                }]
            },
            options: {
                legend: {display: false},
                scales: {
                yAxes: [{ticks: {min: 100, max:1600}}],
                }
            }
            });
            

            function calculate(){
                document.getElementById("myChart").style.display = "block";
                document.getElementById("myChart2").style.display = "none";
                // years of investing count {n}
                var roky = document.getElementById("years").value;
                roky = parseFloat(roky);

                var xRoky = [];
                for (var i = 0; i <= roky; i++) {
                    console.log("rok "+i);
                    xRoky.push(i);
                }
            
                // interest rate {r}
                var interestRate = document.getElementById("interestRate").value;
                interestRate = parseFloat(interestRate);

                // starting money count {K0}
                var startingMoney = document.getElementById("startingMoney").value;
                startingMoney = parseFloat(startingMoney);
                
                
                // total money {Kn}
                var totalMoney = startingMoney * Math.pow((1+interestRate/100),roky);
                totalMoney = parseFloat(totalMoney);
                
                document.getElementById("finalInfo").innerHTML = "Pri počiatočnom vklade "+startingMoney+"€ bude o "+roky+ "roky(rokov) pri sadzbe "+interestRate+ "% váš kapitál zhodnotený na "+totalMoney.toFixed(2)+"€";


                //naplnenie hodnot x pocet rokov
                var yHodnoty = [];
                for (var i = 0; i <= roky; i++) {
                    console.log("rok "+i);
                    yHodnoty.push(startingMoney * Math.pow((1+interestRate/100),i));
                }

                console.log(yHodnoty);

                new Chart("myChart", {
                type: "line",
                data: {
                    labels: xRoky,
                    datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yHodnoty
                    }]
                },
                options: {
                    legend: {display: false},
                    scales: {
                    yAxes: [{ticks: {min: yHodnoty[0], max:yHodnoty[yHodnoty.length-1]}}],
                    }
                }
                });
            }
        </script>
    </body>
</html>

