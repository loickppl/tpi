<?php

session_start();
require_once 'dao.php';
if (!empty($_POST['clubCustomer'])) {   
    DeleteAllClubAsCustomer($_SESSION['login']['idClient']);
    foreach ($_POST['clubCustomer'] as $id_club) {
        AddClubAsCustomer($_SESSION['login']['idClient'], $id_club['idClub']);
    }
    $response_array['status'] = 'success';
}  else {
    $response_array['status'] = 'error';
}


echo json_encode($response_array);