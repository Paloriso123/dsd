<?php 
require_once('../connection.php');
require_once('class/PostClass.php');
$post = new Post;

$rows = $post->getPostsFromCategory($connection, $_SESSION["foreignCategoryID"]);

if(isset($_GET['singleOpenedPostID'])) 
    $_SESSION['postIDSession'] = $_GET['singleOpenedPostID'];

if(isset($_POST['editButton'])){
    $postInfo = [
        'postTitle' => $_POST['postTitle'],
        'description' => $_POST['description'],
        'postID' => $_SESSION['postIDSession'],
    ];
    $post->editPost($connection, $postInfo);
}



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
        <!-- import kniznic pre JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
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
                        <li class="nav-item"><a class="nav-link " aria-current="page" href="crypto.php">Crypto</a></li>
                        <li class="nav-item"><a class="nav-link " href="stocks.php">Stocks</a></li>
                        <li class="nav-item"><a class="nav-link " href="indices.php">Indices</a></li>
                        <li class="nav-item"><a class="nav-link " href="realEstates.php">Real Estates</a></li>
                        <li class="nav-item"><a class="nav-link " href="metals.php">Metals</a></li>
                        <li class="nav-item"><a class="nav-link " href="bonds.php">Bonds</a></li>
                        <li class="nav-item"><a class="nav-link " href="investPlanner.php">Invest Planner</a></li>
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
                <div class="text-center" class="bg-image bg-opacity-10" style="background-image: url('../images/crypto.jpg'); height: 400px;">
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <!--  -->
                <!--  -->
                <div class="col-lg-8">
                    <!-- Featured blog post-->

                    <!-- Zobrazenie jedneho konkretneho clanku -->
                    <div id="allPosts">
                        <?php 
                        $postNumber = -1;
                        foreach($rows as $row): 
                            $postNumber = $postNumber + 1;
                            if($_SESSION['postIDSession'] == $rows[$postNumber]['postID']){ ?>
                                <div class="col-md-2"></div>
                                    <form id="editForm" class="col-md-12" action="<?php echo htmlspecialchars('editPost.php', ENT_QUOTES); ?>" method="post">
                                        <div class="form-group">
                                            <label for="postTitle">Post title</label>
                                            <input type="text" class="form-control" id="postTitle" placeholder="Title" name="postTitle" value="<?php echo $rows[$postNumber]['title'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="Description of the post" cols="30" rows="10"><?php echo $rows[$postNumber]['content']?></textarea>
                                        </div>
                                        <div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary " id="submitButton" name="editButton">Edit</button>
                                            </div>
                                        </div>
                                    </form>
                                <div class="col-md-2"></div>
                        <?php } endforeach; ?>
                    </div>

                    <div class="col-md-12 text-center">
                            <a href="#header"><button class="btn btn-primary mb-3">Back to top</button></a>
                    </div>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">May interest you</div>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-sm-12">
                                <a href="investPlanner.php"><button class="btn btn-primary" id="button-search" type="button">Try our new invest planner!</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Time and Date</div>
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

    </body>
</html>

