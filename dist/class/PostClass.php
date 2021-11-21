<?php

class Post {
    public function addPost($conn, $values) {
        
        $postTitle = $values['postTitle'];
        $description = $values['description'];
        $postImage = $values['postImage'];
        $createdByID = $values['createdByID'];
        $category = $values['foreignCategoryID'];
        
        //riso desktop
        $sql = $conn['conn'] -> prepare("INSERT INTO posts (title, content, image, foreingCategoryID, createdByID) "
        . "VALUES (?, ?, ?, ?, ?)");
        $sql->execute([$postTitle, $description, $postImage, $category, $createdByID]);
        
        //palo desktop
        $sql1 = $conn['conn1'] -> prepare("INSERT INTO posts (title, content, image, foreingCategoryID, createdByID) "
        . "VALUES (?, ?, ?, ?, ?)");
        $sql1->execute([$postTitle, $description, $postImage, $category, $createdByID]);
        
        // header('Location: https://www.facebook.com/');
        
        //odtialto je to dojebane - niesu rovnake databazy tak to nefunguje
        $sql2 = $conn['conn2'] -> prepare("INSERT INTO posts (title, content, image, foreingCategoryID, createdByID) "
        . "VALUES (?, ?, ?, ?, ?)");
        $sql2->execute([$postTitle, $description, $postImage, $category, $createdByID]);
        
        $sql3 = $conn['conn3'] -> prepare("INSERT INTO posts (title, content, image, foreingCategoryID, createdByID) "
        . "VALUES (?, ?, ?, ?, ?)");
        $sql3->execute([$postTitle, $description, $postImage, $category, $createdByID]);

    }

    public function deletePost($conn, $postID) {
        $sql = $conn['conn'] -> prepare("DELETE FROM posts WHERE postID = ?");
        $sql->execute([$postID]);

        $sql1 = $conn['conn1'] -> prepare("DELETE FROM posts WHERE postID = ?");
        $sql1->execute([$postID]);

        // $sql2 = $conn['conn2'] -> prepare("DELETE FROM posts WHERE postID = ?");
        // $sql2->execute([$postID]);

        // $sql3 = $conn['conn3'] -> prepare("DELETE FROM posts WHERE postID = ?");
        // $sql3->execute([$postID]);

        header("location:https://www.facebook.com/");
    }
    
    public function getPostsFromCategory($conn, $categoryID) {

        $sql1 = $conn['conn']->prepare(
                  "SELECT * FROM posts WHERE foreingCategoryID  = $categoryID");
        //vykona SQL prikaz
        $rows = $sql1->execute();

        //zapise SQL prikaz do 
        $rows = $sql1->fetchAll();

        return $rows;
    }
}
?>