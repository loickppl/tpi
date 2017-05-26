<?php

require_once 'dao.php';
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$mdp = filter_input(INPUT_POST, "confirmPwd", FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_STRING);
$gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_STRING);
$dtBirth = filter_input(INPUT_POST, "dtBirth", FILTER_SANITIZE_SPECIAL_CHARS);
$salt = uniqid();
$pwdMd5 = md5($mdp . $salt);
$res = EmailExist($email)->fetchAll();
if (count($res) == 0) {
    CreateClient($email, $pwdMd5, $salt, $name, $prenom, $gender, $dtBirth);
    $response_array['status'] = 'success';
} else {
    $response_array['status'] = 'error';
}
echo json_encode($response_array);


