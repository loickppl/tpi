<?php

session_start();
require_once 'dao.php';
$clientCours = filter_input(INPUT_POST, 'clientCours', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$namePlanning = filter_input(INPUT_POST, "namePlanning", FILTER_SANITIZE_STRING);
if (!empty($clientCours) && !empty($namePlanning)) {
    CreateClientPlanning($_SESSION['login']['idClient'], $namePlanning);
    $last_id_planning = MyPdo()->lastInsertId();
    foreach ($clientCours as $id_cours) {
        AddCoursInClientPlanning($last_id_planning, $id_cours['idCour']);
    }
    $response_array['status'] = 'success';
}  else {
    $response_array['status'] = 'error';
}


echo json_encode($response_array);