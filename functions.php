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

        // risoDesktop 25.60.204.245, nefunguje mysql/db a tam nejsu udaje nikoho z pouzivatelov ... natvrdo sme to nakopirovali

        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed $servername :  " . $e->getMessage() . " <br>";
        return 0;
    }
}

?>