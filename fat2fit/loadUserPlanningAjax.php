<?php
session_start();
require_once 'dao.php';
$allplanningarray = array();
foreach (loadUserPlanning($_SESSION['login']['idClient'])->fetchAll() as $planning){
    $response_array['planningName'] = $planning['Nm_Goal'];
    $response_array['planningId'] = $planning['Id_Planning'];
    array_push($allplanningarray, $response_array);
}
echo json_encode($allplanningarray);