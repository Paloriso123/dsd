<?php

class Post {
    public function addPost($conn, $values) {
        
        $postTitle = $values['postTitle'];
        $description = $values['description'];
        $postImage = $values['postImage'];
        $category = $values['category'];
        $createdByID = $_SESSION['userID'];


            
            $sql = $conn['conn'] -> prepare("INSERT INTO posts (title, content, image, foreingCategoryID, createdByID) "
                                           . "VALUES (?, ?, ?, ?, ?)");
            $sql->execute([$postTitle, $description, $postImage, $category, $createdByID]);
            
            $sql1 = $conn['conn1'] -> prepare("INSERT INTO posts (title, content, image, foreingCategoryID, createdByID) "
                                            . "VALUES (?, ?, ?, ?, ?)");
            $sql1->execute([$postTitle, $description, $postImage, $category, $createdByID]);
            
            $sql2 = $conn['conn2'] -> prepare("INSERT INTO posts (title, content, image, foreingCategoryID, createdByID) "
                                           . "VALUES (?, ?, ?, ?, ?)");
            $sql2->execute([$postTitle, $description, $postImage, $category, $createdByID]);
            
            $sql3 = $conn['conn3'] -> prepare("INSERT INTO posts (title, content, image, foreingCategoryID, createdByID) "
                                           . "VALUES (?, ?, ?, ?, ?)");
            $sql3->execute([$postTitle, $description, $postImage, $category, $createdByID]);
            
        }
        
}

?>


<!-- if(isset($_POST['createButton'])){

$postInfo = [
    'postTitle' => $_POST['postTitle'],
    'description' => $_POST['description'],
    'postImage' => $_POST['postImage'],
    'category' => $category,
];
$user->addUser($connection, $userInfo);
} -->