<?php

function validateData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    return $data;
}

function connectToDBS($servername, $username, $password, $dbname) {
    $pcName = "";
    if($servername == "25.60.204.245"){
        $pcName = "risoDesktop";
    }
    else if($servername == "25.77.19.200"){
        $pcName = "paloDesktop";
    }
    else if($servername == "25.79.70.7"){
        $pcName = "paloNotebook";
    }
    else if($servername == "25.79.132.0"){
        $pcName = "risoNotebook";
    }
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [
        PDO::ATTR_TIMEOUT => 1, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        // echo "Connection succeded on [ $servername $pcName ] <br>";

        // risoDesktop 25.60.204.245, nefunguje mysql/db a tam nejsu udaje nikoho z pouzivatelov ... natvrdo sme to nakopirovali mysql/db

        return $conn;
    } catch (PDOException $e) {
        // echo "Connection failed [ $servername $pcName ] :  " . $e->getMessage() . " <br>";
        return 0;
    }
}

?>