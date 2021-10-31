<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('functions.php');

$conn = connectToDBS('localhost', 'root', 'root', 'c_redakcia');
$conn2 = connectToDBS('25.46.84.8', 'bondra', 'test21', 'c_redakcia');

$connection = [
     'conn' => $conn,
     'conn2' => $conn2
 ];      

