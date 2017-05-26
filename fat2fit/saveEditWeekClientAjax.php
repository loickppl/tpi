<?php

session_start();
require_once 'dao.php';
$clientCours = filter_input(INPUT_POST, 'clientCours', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$namePlanning = filter_input(INPUT_POST, "namePlanning", FILTER_SANITIZE_STRING);
$id_planning = filter_input(INPUT_POST, "idPlanning", FILTER_VALIDATE_INT);

if (!empty($clientCours) && !empty($namePlanning)) {
    UpdateNamePlanning($id_planning, $_SESSION['login']['idClient'], $namePlanning);
    DeleteCoursAsPlanning($id_planning, $_SESSION['login']['idClient']);
    foreach ($clientCours as $id_cours) {
        AddCoursInClientPlanning($id_planning, $id_cours['idCour']);
    }
    $response_array['status'] = 'success';
} else {
    $response_array['status'] = 'error';
}

echo json_encode($response_array);