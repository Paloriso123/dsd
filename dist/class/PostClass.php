<?php

class Post {
    public function addPost($conn, $values) {
        
        $postTitle = $values['postTitle'];
        $description = $values['description'];
        $postImage = $values['postImage'];
        $category = $values['category'];
        $createdByID = $values['createdByID'];
        
        //riso desktop
        $sql = $conn['conn'] -> prepare("INSERT INTO posts (title, content, image, foreingCategoryID, createdByID) "
        . "VALUES (?, ?, ?, ?, ?)");
        $sql->execute([$postTitle, $description, $postImage, $category, $createdByID]);
        
        //palo desktop
        $sql1 = $conn['conn1'] -> prepare("INSERT INTO posts (title, content, image, foreingCategoryID, createdByID) "
        . "VALUES (?, ?, ?, ?, ?)");
        $sql1->execute([$postTitle, $description, $postImage, $category, $createdByID]);
        
        header('Location: https://www.facebook.com/');
        
        //odtialto je to dojebane - niesu rovnake databazy tak to nefunguje
        $sql2 = $conn['conn2'] -> prepare("INSERT INTO posts (title, content, image, foreingCategoryID, createdByID) "
        . "VALUES (?, ?, ?, ?, ?)");
        $sql2->execute([$postTitle, $description, $postImage, $category, $createdByID]);
        
        $sql3 = $conn['conn3'] -> prepare("INSERT INTO posts (title, content, image, foreingCategoryID, createdByID) "
        . "VALUES (?, ?, ?, ?, ?)");
        $sql3->execute([$postTitle, $description, $postImage, $category, $createdByID]);

    }
}
?>