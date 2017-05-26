<?php

require_once("variablesDb.php");
require_once("variablesEmail.php");
/*
 * Créé la liaison a la base 
 * @input
 * @return
 */

function MyPdo() {
    static $dbc = NULL;
    try {
        if ($dbc == NULL) {
            $dbc = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PWD, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_PERSISTENT => true));
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $dbc;
}

function CreateClient($email, $pwdMd5, $salt, $name, $prenom, $gender, $dtBirth) {
    try {
        $req = "INSERT INTO Tbl_User (Nm_First,Nm_Last,Cd_Gender,Dt_Birth,Txt_Password_Md5,Txt_Password_Salt) VALUES (:nmFirst,:nmLast,:cdGender,:dtBirth,:pwd,:salt)";
        $sql = MyPdo()->prepare($req);
        $sql->bindParam(':nmFirst', $prenom);
        $sql->bindParam(':nmLast', $name);
        $sql->bindParam(':cdGender', $gender);
        $sql->bindParam(':dtBirth', $dtBirth);
        $sql->bindParam(':pwd', $pwdMd5);
        $sql->bindParam(':salt', $salt);
        $sql->execute();

        $last_id = MyPdo()->lastInsertId();
        $uniqueid = uniqid();

        $reqEmail = "INSERT INTO Tbl_Email (Txt_Email ,Is_Verified ,Txt_Challenge ,Id_User ) VALUES (:email,0,:Txt_Challange,:id_User)";
        $sql2 = MyPdo()->prepare($reqEmail);
        $sql2->bindParam(':email', $email);
        $sql2->bindParam(':Txt_Challange', $uniqueid);
        $sql2->bindParam(':id_User', $last_id);
        $sql2->execute();

        $reqClient = "INSERT INTO Tbl_Client (Id_User) VALUES (:id_User)";
        $sql3 = MyPdo()->prepare($reqClient);
        $sql3->bindParam(':id_User', $last_id);
        $sql3->execute();

        //$message = DOMAIN . "?id=" . $last_id . "&txtChallenge=" . $uniqueid;
        //mail($email, 'Confirmation email fat2fit', $message, HEADERS);
    } catch (Exception $ex) {
        
    }
}

function CreateClientPlanning($idClient, $namePlanning) {
    try {
        $req = "INSERT INTO Tbl_Planning (Nm_Planning ,Id_Client ) VALUES (:nmPlanning,:idClient)";
        $sql = MyPdo()->prepare($req);
        $sql->bindParam(':nmPlanning', $namePlanning);
        $sql->bindParam(':idClient', $idClient);
        $sql->execute();
    } catch (Exception $ex) {
        
    }
}

function AddCoursInClientPlanning($idPlanning, $idCours) {
    try {
        $req = "INSERT INTO Tbl_Planning_Class (Id_Planning ,Id_Class) VALUES (:idPlanning,:idCours)";
        $sql = MyPdo()->prepare($req);
        $sql->bindParam(':idPlanning', $idPlanning);
        $sql->bindParam(':idCours', $idCours);
        $sql->execute();
    } catch (Exception $ex) {
        
    }
}

function LoadCoursClient($idClent, $idCourLoadUser) {
    $req = "SELECT * FROM `Tbl_Class`,Tbl_Planning,Tbl_Planning_Class, Tbl_Program, Tbl_Club, Tbl_Fitness WHERE Tbl_Planning.Id_Client = :idClient AND Tbl_Planning_Class.Id_Planning = :idCourLoadUser AND Tbl_Planning.Id_Planning = Tbl_Planning_Class.Id_Planning AND Tbl_Planning_Class.Id_Class = Tbl_Class.Id_Class AND Tbl_Class.Id_Program = Tbl_Program.Id_Program AND Tbl_Class.Id_Club = Tbl_Club.Id_Club AND Tbl_Club.Id_Fitness = Tbl_Fitness.Id_Fitness ORDER BY Tbl_Class.Tm_Class ASC";
    $sql = MyPdo()->prepare($req);
    $sql->bindParam(':idClient', $idClent);
    $sql->bindParam(':idCourLoadUser', $idCourLoadUser);
    $sql->execute();
    return $sql;
}

function EmailExist($email) {
    $req = "SELECT * FROM `Tbl_Email` WHERE Txt_Email = :email";
    $sql = MyPdo()->prepare($req);
    $sql->bindParam(':email', $email);
    $sql->execute();
    return $sql;
}

function VerifiedEmail($idUser, $uniqueId) {
    $req = "UPDATE Tbl_Email SET Is_Verified  = 1 WHERE Txt_Challenge = :txtChallenge AND Id_User = :idUser";
    $sql = MyPdo()->prepare($req);
    $sql->bindParam(':txtChallenge', $uniqueId);
    $sql->bindParam(':idUser', $idUser);
    $sql->execute();
}

function checkLogin($emailUser) {
    $req = "SELECT * FROM Tbl_User, Tbl_Email WHERE Tbl_Email.Txt_Email = :email AND Tbl_Email.Id_user = Tbl_User.Id_User";
    $sql = MyPdo()->prepare($req);
    $sql->bindParam(':email', $emailUser);
    $sql->execute();
    return $sql;
}

function loadCours($idClubs) {
    $param = implode(",", $idClubs);
    $req = "SELECT * FROM Tbl_Class, Tbl_Program, Tbl_Club, Tbl_Fitness WHERE Tbl_Class.Id_Program = Tbl_Program.Id_Program AND Tbl_Class.Id_Club = Tbl_Club.Id_Club AND Tbl_Club.Id_Fitness = Tbl_Fitness.Id_Fitness AND Tbl_Club.Id_Club in (".$param.") ORDER BY Tbl_Class.Tm_Class ASC";
    $sql = MyPdo()->prepare($req);
    $sql->execute();
    return $sql;
}

function loadUserPlanning($idClient) {
    $req = "SELECT * FROM Tbl_Planning,Tbl_Goal WHERE Tbl_Planning.Id_Client = :idClient AND Tbl_Planning.Id_Goal = Tbl_Goal.Id_Goal";
    $sql = MyPdo()->prepare($req);
    $sql->bindParam(':idClient', $idClient);
    $sql->execute();
    return $sql;
}

function LoadFitnessCustomer() {
    $req = "SELECT Id_Fitness,Nm_Fitness FROM Tbl_Fitness";
    $sql = MyPdo()->prepare($req);
    $sql->execute();
    return $sql;
}

function LoadFitnessAsCustomer($idCustomer) {
    $req = "SELECT DISTINCT Id_Fitness  FROM Tbl_Client_Club,Tbl_Club WHERE Tbl_Client_Club.Id_User = :idCustomer AND Tbl_Client_Club.Id_Club = Tbl_Club.Id_Club";
    $sql = MyPdo()->prepare($req);
    $sql->bindParam(':idCustomer', $idCustomer);
    $sql->execute();
    return $sql;
}

function LoadClubAsCustomer($idCustomer) {
    $req = "SELECT Id_Club  FROM Tbl_Client_Club WHERE Tbl_Client_Club.Id_User = :idCustomer";
    $sql = MyPdo()->prepare($req);
    $sql->bindParam(':idCustomer', $idCustomer);
    $sql->execute();
    return $sql;
}

function loadClubAsFitness($idFit) {
    $req = "SELECT Id_Club,Nm_Location,Nm_Fitness FROM Tbl_Club,Tbl_Fitness WHERE Tbl_Club.Id_Fitness = :idFit AND Tbl_Club.Id_Fitness = Tbl_Fitness.Id_Fitness";
    $sql = MyPdo()->prepare($req);
    $sql->bindParam(':idFit', $idFit);
    $sql->execute();
    return $sql;
}

function AddClubAsCustomer($idCustomer, $idClub) {
    try {
        $req = "INSERT INTO Tbl_Client_Club (Id_User ,Id_Club) VALUES (:idCustomer,:idClub)";
        $sql = MyPdo()->prepare($req);
        $sql->bindParam(':idCustomer', $idCustomer);
        $sql->bindParam(':idClub', $idClub);
        $sql->execute();
    } catch (Exception $ex) {
        
    }
}

function DeleteAllClubAsCustomer($idCustomer) {
    try {
        $req = " DELETE FROM `Tbl_Client_Club` WHERE `Id_User` = :idCustomer";
        $sql = MyPdo()->prepare($req);
        $sql->bindParam(':idCustomer', $idCustomer);
        $sql->execute();
    } catch (Exception $ex) {
        
    }
}

function DeletePlanningUser($idPlanning, $idCustomer) {
    try {
        $req = "DELETE FROM `Tbl_Planning` WHERE Id_Planning = :idPlanning AND Id_Client = :idCustomer";
        $sql = MyPdo()->prepare($req);
        $sql->bindParam(':idPlanning', $idPlanning);
        $sql->bindParam(':idCustomer', $idCustomer);
        $sql->execute();
    } catch (Exception $ex) {
        
    }
}

function DeleteCoursAsPlanning($idPlanning,$idCustomer) {
    try {
        $reqDelClassAsPlanning = "DELETE FROM Tbl_Planning_Class WHERE Tbl_Planning_Class.Id_Planning IN (SELECT Id_Planning FROM Tbl_Planning WHERE Tbl_Planning.Id_Client = :idCustomer) AND Tbl_Planning_Class.Id_Planning = :idPlanning";
        $sql1 = MyPdo()->prepare($reqDelClassAsPlanning);
        $sql1->bindParam(':idPlanning', $idPlanning);
        $sql1->bindParam(':idCustomer', $idCustomer);
        $sql1->execute();
    } catch (Exception $ex) {
        
    }
}

function UpdateNamePlanning($idPlanning, $idCustomer, $namePlanning) {
    try {
        $req = "UPDATE Tbl_Planning SET Nm_Planning = :namePlanning WHERE Id_Planning = :idPlanning AND Id_Client = :idCustomer";
        $sql = MyPdo()->prepare($req);
        $sql->bindParam(':namePlanning', $namePlanning);
        $sql->bindParam(':idPlanning', $idPlanning);
        $sql->bindParam(':idCustomer', $idCustomer);
        $sql->execute();
    } catch (Exception $ex) {
        
    }
}

function loadProgramCategory() {
    try {
        $req = "SELECT * FROM Tbl_Program_Category";
        $sql = MyPdo()->prepare($req);
        $sql->execute();
        return $sql;
    } catch (Exception $ex) {
        
    }
}

