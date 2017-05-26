<?php
session_start();
require_once 'dao.php';
 
$allClubAsCustomerArray = array();
foreach (LoadClubAsCustomer($_SESSION['login']['idClient'])->fetchAll() as $club){
    $response_array['idClubAsCustomer']= $club['Id_Club'];
    array_push($allClubAsCustomerArray, $response_array);
}
 echo json_encode($allClubAsCustomerArray);