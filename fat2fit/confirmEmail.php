<?php

require_once 'dao.php';
$uniqueId = $_GET["txtChallenge"];
$idUser = $_GET["id"];
VerifiedEmail($idUser,$uniqueId);
header("Location: index.php");
