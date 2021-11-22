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

        header("location:http://localhost/semestralny_projekt_dsd_paloriso/dist/");
    }

    public function editPost($conn,$values) {
        var_dump($values);

        $postTitle = $values['postTitle'];
        $description = $values['description'];
        $postID = $values['postID'];


        $sql = $conn['conn'] -> prepare("UPDATE posts SET title = ?, content= ? WHERE postID = ?");
        $sql->execute([$postTitle, $description, $postID]);

        $sql1 = $conn['conn1'] -> prepare("UPDATE posts SET title = ?, content= ? WHERE postID = ?");
        $sql1->execute([$postTitle, $description, $postID]);

        // $sql2 = $conn['conn2'] -> prepare("UPDATE posts SET title = ?, content= ? WHERE postID = ?");
        // $sql2->execute([$postTitle, $description, $postID]);

        // $sql3 = $conn['conn3'] -> prepare("UPDATE posts SET title = ?, content= ? WHERE postID = ?");
        // $sql3->execute([$postTitle, $description, $postID]);


        //header("location: https://www.facebook.com/");
    }
    
    public function getPostsFromCategory($conn, $categoryID) {

        $sql1 = $conn['conn1']->prepare(
                  "SELECT * FROM posts WHERE foreingCategoryID  = $categoryID");
        //vykona SQL prikaz
        $rows = $sql1->execute();

        //zapise SQL prikaz do 
        $rows = $sql1->fetchAll();

        return $rows;
    }

    public function getPostsFromCategoryByKeyWord($conn, $categoryID, $keyWord) {

        $sql1 = $conn['conn1']->prepare(
                  "SELECT * FROM posts WHERE foreingCategoryID  = ? AND content LIKE '%{$keyWord}%'");
        //vykona SQL prikaz
        $searchedRows = $sql1->execute([$categoryID]);

        //zapise SQL prikaz do 
        $searchedRows = $sql1->fetchAll();
        
        return $searchedRows;
    }
}
?>