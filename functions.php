<?php

function validateData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    return $data;
}

function connectToDBS($servername, $username, $password, $dbname) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [
        PDO::ATTR_TIMEOUT => 1, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        echo "Connection succeded on  $servername <br>";

        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed $servername :  " . $e->getMessage() . " <br>";
        return 0;
    }
}

?>