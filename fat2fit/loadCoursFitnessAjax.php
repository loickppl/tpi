<?php
session_start();
require_once 'dao.php';
$allcoursarray = array();
$idClubs = filter_input(INPUT_POST, 'idClubs', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
foreach (loadCours($idClubs)->fetchAll() as $cours) {
    $heureDebut = date("H:i", strtotime($cours['Tm_Class']));
    $heureFin = date("H:i", strtotime($cours['Tm_Class'] . "+" . $cours['Drn_Class_In_Mn'] . "minute"));
    $response_array['heureDebut'] = $heureDebut;
    $response_array['heureFin'] = $heureFin;
    $response_array['nmCours'] = $cours['Nm_Program'];
    $periode;
    if ($heureDebut < date("H:i", strtotime("12:00"))) {
        $periode = "Matin";
    }elseif ($heureDebut<date("H:i", strtotime("13:00")) && $heureDebut >= date("H:i", strtotime("12:00"))) {
        $periode = "Midi";
    }elseif ($heureDebut < date("H:i", strtotime("18:00")) && $heureDebut >= date("H:i", strtotime("13:00"))) {
        $periode = "Am";
    }elseif ($heureDebut < date("H:i", strtotime("22:00")) && $heureDebut >= date("H:i", strtotime("18:00"))) {
        $periode = "Soir";
    }
    $response_array['div'] = $cours['Cd_Weekday'].$periode;
    $response_array['idCours']= $cours['Id_Class'];
    $response_array['fitness']=$cours['Nm_Fitness'];
    $response_array['logoFit']=$cours['Txt_Filename_Logo'];
    $response_array['club']=$cours['Nm_Location'];
    array_push($allcoursarray, $response_array);
}

 echo json_encode($allcoursarray);