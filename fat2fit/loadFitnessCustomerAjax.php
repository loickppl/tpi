<?php
session_start();
require_once 'dao.php';
 
$allFitAsCustomerArray = array();
foreach (LoadFitnessAsCustomer($_SESSION['login']['idClient'])->fetchAll() as $fitness){
    $response_array['idFitAsCustomer']= $fitness['Id_Fitness'];
    array_push($allFitAsCustomerArray, $response_array);
}
 echo json_encode($allFitAsCustomerArray);