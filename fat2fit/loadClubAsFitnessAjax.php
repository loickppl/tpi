<?php
session_start();
require_once 'dao.php';
$idFit = filter_input(INPUT_POST, "idFit", FILTER_VALIDATE_INT);
$clubArray = array();
foreach (loadClubAsFitness($idFit)->fetchAll() as $club){
    $response_array['nameFit']= $club['Nm_Fitness'];
    $response_array['idClub']= $club['Id_Club'];
    $response_array['nameClub']= $club['Nm_Location'];
    array_push($clubArray, $response_array);
}
 echo json_encode($clubArray);