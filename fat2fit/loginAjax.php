<?php

require_once 'dao.php';

$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$mdp = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_STRING);
$loginUser = checkLogin($email)->fetch();
if ($loginUser['Txt_Password_Salt'] == NULL) {
    $response_array['status'] = 'errorEmail';
} else {
    $mdpFull = md5($mdp . $loginUser['Txt_Password_Salt']);
    if ($loginUser['Txt_Password_Md5'] != $mdpFull) {
        $response_array['status'] = 'errorPwd';
    } elseif ($loginUser['Is_Verified'] != 1) {
        $response_array['status'] = 'errorUnverified';
    } else { //login ok
        session_start();
        $_SESSION['login']['mail']=$email;
        $_SESSION['login']['idClient'] = $loginUser['Id_User'];
        $response_array['status'] = 'success';
        // TODO load permissions
    }
}

echo json_encode($response_array);
