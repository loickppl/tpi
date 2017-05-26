<?php
session_start();
require_once 'dao.php';
$idPlanning = filter_input(INPUT_POST, "idPlanning", FILTER_VALIDATE_INT);
DeleteCoursAsPlanning($idPlanning, $_SESSION['login']['idClient']);
DeletePlanningUser($idPlanning, $_SESSION['login']['idClient']);
