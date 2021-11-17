<?php 
include('../connection.php');

//overenie spravnej kategorie
$category = $_GET['category'];
$listOfCategories = array('crypto', 'indices', 'bonds', 'metals', 'realEstates', 'stocks');

$exist = false;

foreach($listOfCategories as $singleCategory){
    if($category == $singleCategory){
        $exist = true;
    }
}

if(!$exist){
    header('Location: http://localhost/semestralny_projekt_dsd_paloriso/dist/');
}
//spravna premenna - pridanie clanku z formularu
if(isset($_POST['createButton'])){

    $postInfo = [
        'postTitle' => $_POST['postTitle'],
        'description' => $_POST['description'],
        'postImage' => $_POST['postImage'],
        'category' => $category,
        'createdByID' => $_SESSION['userID'],  
    ];
    $post->addPost($connection, $postInfo);
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
                        <li class="nav-item"><a class="nav-link " href="crypto.php">Crypto</a></li>
                        <li class="nav-item"><a class="nav-link " href="stocks.php">Stocks</a></li>
                        <li class="nav-item"><a class="nav-link " href="indices.php">Indices</a></li>
                        <li class="nav-item"><a class="nav-link " href="realEstates.php">Real Estates</a></li>
                        <li class="nav-item"><a class="nav-link " href="metals.php">Metals</a></li>
                        <li class="nav-item"><a class="nav-link " href="bonds.php">Bonds</a></li>
                        <li class="nav-item"><a class="nav-link " href="investPlanner.php">Invest Planner</a></li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php if($user->isLoggedIn()) { ?>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/changePass.php"><?php echo $_SESSION['firstName']. " ". $_SESSION['lastName'];?></a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/logout.php">Logout</a></li>
                        <?php } else { ?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/sign.php">Sign</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/semestralny_projekt_dsd_paloriso/dist/login.php">Login</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <div id="backgroundSignDiv">
            <div id="fullScreenSignDiv" class="container">
                <!-- align-items-center z nejakeho dovodu nefunguje -->
                <div>
                    <h1 class="nadpis1">Create new post <?php echo $category." , ".$_SESSION['userID'] ?> </h1>
                </div>
                <div class="row align-items-center">

                    <div class="col-md-2"></div>
                        <form id="signForm" class="col-md-8" action="<?php echo htmlspecialchars('createPost.php', ENT_QUOTES); ?>" method="post">
                            <div class="form-group">
                                <label for="postTitle">Post title</label>
                                <input type="text" class="form-control" id="postTitle" placeholder="Title" name="postTitle">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Description of the post" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="postImage">Image</label>
                                <input type="file" class="form-control" id="postImage" placeholder="Image" name="postImage">
                            </div>
                            <div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary " id="submitButton" name="createButton">Create</button>
                                </div>
                            </div>
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