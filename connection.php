<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('functions.php');

// $conn = connectToDBS('serverIP', 'meno', 'heslo', 'nazovDatabazy');
// odkomentujes oznacenim danych riadkov a stlacenim klaves L-CTRL + /
/*PALO*/
// $conn = connectToDBS('25.60.204.245', 'paloDesktop', 'Palorisodsd', 'finance_blog');
// $conn1 = connectToDBS('25.77.19.200', 'paloDesktop', 'Palorisodsd', 'finance_blog');
// $conn2 = connectToDBS('25.79.70.7', 'paloDesktop', 'Palorisodsd', 'finance_blog');
// $conn3 = connectToDBS('25.79.132.0', 'paloDesktop', 'Palorisodsd', 'finance_blog');
/**/
/*RISO*/
$conn = connectToDBS('25.60.204.245', 'risoDesktop', 'Palorisodsd', 'finance_blog');
$conn1 = connectToDBS('25.77.19.200', 'risoDesktop', 'Palorisodsd', 'finance_blog');
$conn2 = connectToDBS('25.79.70.7', 'risoDesktop', 'Palorisodsd', 'finance_blog');
$conn3 = connectToDBS('25.79.132.0', 'risoDesktop', 'Palorisodsd', 'finance_blog');
/**/

$connection = [
     'conn' => $conn,
     'conn1' => $conn1,
     'conn2' => $conn2,
     'conn3' => $conn3
];      

