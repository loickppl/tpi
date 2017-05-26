<?php
session_start();
require_once 'dao.php';
if (!isset($_SESSION['login']['mail'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.6-dist/css/style.css" rel="stylesheet">
        <link href="bootstrap-3.3.6-dist/css/half-slider.css" rel="stylesheet">
        <title>Fat 2 Fit : Utilisateur</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Cardio is a free one page template made exclusively for Codrops by Luka Cvetinovic" />
        <meta name="keywords" content="html template, css, free, one page, gym, fitness, web design" />
        <meta name="author" content="Luka Cvetinovic for Codrops" />
        <link rel="icon" type="image/png" href="img/logo-active.png" >
        <!-- Normalize -->
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
        <!-- Owl -->
        <link rel="stylesheet" type="text/css" href="css/owl.css">
        <!-- Animate.css -->
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
        <!-- Elegant Icons -->
        <link rel="stylesheet" type="text/css" href="fonts/eleganticons/et-icons.css">
        <!-- Main style -->
        <link rel="stylesheet" type="text/css" href="css/cardio.css">
        <!-- Jquery modal style -->
        <link rel="stylesheet" type="text/css" href="css/jquery.modal.css">
    </head>

    <body id="userBody">
        <div class="preloader">
            <img src="img/loader.gif" alt="Preloader image">
        </div>
        <nav class="navbar">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="img/logo.png" data-active-url="img/logo-active.png" alt=""></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right main-nav">
                        <li><a href="userGoalsIndex.php">Objectifs</a></li>
                        <li class="active"><a href="userIndex.php">Plannings</a></li>
                        <li>
                            <div class="dropdown" >
                                <button class="btn btn-blue dropdown-toggle" style="padding: 10px!important;" type="button" data-toggle="dropdown"><?php echo $_SESSION['login']['mail']; ?> <span class="caret"></span></button>
                                <ul class="dropdown-menu collapsed" >
                                    <li><a href="#" onclick="disconnection()">déconnexion</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <section id="userSection">
            <div id="fitnessclub" class="clubClient">
                <div class="form-inline" style="width: 100%; text-align: center;">
                    <div class="form-group inline">
                        <h5 class="inlineh5">Vos Fitness :</h5>
                        <select class="selectpicker" id="fitClient" multiple>
                            <?php
                            //J'ai choisi de ne pas charger les fitness en ajax car on doit les avoir pour utiliser le site.
                            foreach (LoadFitnessCustomer()->fetchAll() as $fitness) {
                                ?> 
                                <option value="<?php echo $fitness['Id_Fitness']; ?>"><?php echo $fitness['Nm_Fitness']; ?></option>
                            <?php } ?>
                        </select> 
                    </div>
                    <div class="form-group">
                        <h5 class="inlineh5">Vos Clubs :</h5>
                        <select class="selectpicker" id="clubClient" multiple>

                        </select>  
                    </div>
                    <!--                    <div class="form-group inline">
                                            <input style="display: inline-block;" type="submit" value="Enregistrer" class="btn btn-registerClub" onclick="SaveClubCustomer()" id="btnUser">
                                        </div>-->
                </div>
            </div>

            <div id="calendar-2" class="hidden-xs hidden-sm" id="letsgo">
                <div id="loadPlanning" >
                    <label for="userPlanning"><h3 style="color: white;" id="userPlanningTitle">Ma semaine : </h3></label>
                    <select class="selectpicker" id="userPlanning" >
                    </select>
                    <span class="glyphicon glyphicon-plus colorWhite" onclick="newWeekClient()" aria-hidden="true" title="Ajouter un planning"></span>
                    <span class="glyphicon glyphicon-pencil colorWhite" onclick="editWeekClient()" aria-hidden="true" title="Modifier ce planning"></span>
                    <a class="glyphicon glyphicon-trash colorWhite" href="#ex2" rel="modal:open" aria-hidden="true" title="Supprimer ce planning"></a>
                    <input type="text" class="form-control form-white" style=" width: 20%; padding: 5px!important; display: inline-block;" placeholder="Nom de votre planning" id="namePlanning">
                    <input class="btn btn-blue" id="btnSavePlanningUser" type="button" onclick="saveWeekClient()" value="Sauvegarder">
                    <input class="btn btn-blue" id="btnSaveEditPlanningUser" type="button" onclick="saveEditWeekClient()" value="Sauvegarder">
                    <input class="btn btn-blue" id="btnCancelPlanningUser" type="button" onclick="cancelActionPlanningUser()" value="Annuler">
                </div>

                <div class="row eight-cols day-of-week text-center">
                    <div class="col-md-1 period">

                    </div>
                    <div class="col-md-1">
                        LUNDI
                    </div>
                    <div class="col-md-1">
                        MARDI
                    </div>
                    <div class="col-md-1">
                        MERCREDI
                    </div>
                    <div class="col-md-1">
                        JEUDI
                    </div>
                    <div class="col-md-1">
                        VENDREDI
                    </div>
                    <div class="col-md-1">
                        SAMEDI
                    </div>
                    <div class="col-md-1">
                        DIMANCHE
                    </div>
                </div>

                <hr class="hr-gradient">
                <div class="week-period row eight-cols cours text-center">
                    <div class="col-md-1 period" style="top:0px;">
                        <div class="period-content">
                            <div class="name-period">
                                MATIN
                            </div>
                            <div class="schedule-period">
                                06h - 12h
                            </div>
                        </div>

                    </div>
                    <div class="cours-week col-md-1 row" id="userlunMatin">
                    </div>
                    <div class="cours-week col-md-1 row" id="usermarMatin">
                    </div>
                    <div class="cours-week col-md-1 row" id="usermerMatin">
                    </div>
                    <div class="cours-week col-md-1 row" id="userjeuMatin">
                    </div>
                    <div class="cours-week col-md-1 row" id="uservenMatin">
                    </div>
                    <div class="cours-week col-md-1 row" id="usersamMatin">
                    </div>
                    <div class="cours-week col-md-1 row" id="userdimMatin">
                    </div>
                </div>
                <hr class="hr-gradient">
                <div class="week-period row eight-cols cours text-center">
                    <div class="col-md-1 period" style="top:0px;">
                        <div class="period-content">
                            <div class="name-period">
                                MIDI
                            </div>
                            <div class="schedule-period">
                                12h - 13h
                            </div>
                        </div>
                    </div>
                    <div class="cours-week col-md-1 row" id="userlunMidi">
                    </div>
                    <div class="cours-week col-md-1 row" id="usermarMidi">
                    </div>
                    <div class="cours-week col-md-1 row" id="usermerMidi">
                    </div>
                    <div class="cours-week col-md-1 row" id="userjeuMidi">
                    </div>
                    <div class="cours-week col-md-1 row" id="uservenMidi">
                    </div>
                    <div class="cours-week col-md-1 row" id="usersamMidi">
                    </div>
                    <div class="cours-week col-md-1 row" id="userdimMidi">
                    </div>
                </div>

                <hr class="hr-gradient">
                <div class="week-period row eight-cols cours text-center">
                    <div class="col-md-1 period" style="top:0px;">
                        <div class="period-content">
                            <div class="name-period">
                                APRES MIDI
                            </div>
                            <div class="schedule-period">
                                13h - 18h
                            </div>
                        </div>
                    </div>
                    <div class="cours-week col-md-1 row" id="userlunAm">
                    </div>
                    <div class="cours-week col-md-1 row" id="usermarAm">
                    </div>
                    <div class="cours-week col-md-1 row" id="usermerAm">
                    </div>
                    <div class="cours-week col-md-1 row" id="userjeuAm">
                    </div>
                    <div class="cours-week col-md-1 row" id="uservenAm">
                    </div>
                    <div class="cours-week col-md-1 row" id="usersamAm">
                    </div>
                    <div class="cours-week col-md-1 row" id="userdimAm">
                    </div>
                </div>

                <hr class="hr-gradient">
                <div class="week-period row eight-cols cours text-center">
                    <div class="col-md-1 period" style="top:0px;">
                        <div class="period-content">
                            <div class="name-period">
                                SOIR
                            </div>
                            <div class="schedule-period">
                                18h - 22h
                            </div>
                        </div>
                    </div>
                    <div class="cours-week col-md-1 row" id="userlunSoir">
                    </div>
                    <div class="cours-week col-md-1 row" id="usermarSoir">
                    </div>
                    <div class="cours-week col-md-1 row" id="usermerSoir">
                    </div>
                    <div class="cours-week col-md-1 row" id="userjeuSoir">
                    </div>
                    <div class="cours-week col-md-1 row" id="uservenSoir">
                    </div>
                    <div class="cours-week col-md-1 row" id="usersamSoir">
                    </div>
                    <div class="cours-week col-md-1 row" id="userdimSoir">
                    </div>
                </div>
                <!--                <div style="width: 100%; " id="savePlanning">
                                    <div style="width: 25%; margin-right: auto; margin-left: auto;">
                                        <input type="text" class="form-control form-white" style="padding: 5px!important; margin-bottom: 10px;" placeholder="Nom de votre planning" id="namePlanning">
                                        <input class="btn btn-blue" type="button" data-toggle="dropdown" style="padding: 5px; white-space: normal !important; word-wrap: break-word;" onclick="saveWeekClient()" value="Sauvegarder votre semaine">
                                    </div>
                                                        <div style="width: 10%; display: inline-block;" id="saved">
                                                            <img id="imgSave">
                                                        </div>
                                </div>-->
            </div>

            <div id="calendar-2" class="hidden-xs hidden-sm" >
                <div id="fitCalendar">
                    <h3 style="color: white;">Mes Fitness :</h3><br>
                    <div class="row eight-cols day-of-week text-center">
                        <div class="col-md-1 period">

                        </div>
                        <div class="col-md-1">
                            LUNDI
                        </div>
                        <div class="col-md-1">
                            MARDI
                        </div>
                        <div class="col-md-1">
                            MERCREDI
                        </div>
                        <div class="col-md-1">
                            JEUDI
                        </div>
                        <div class="col-md-1">
                            VENDREDI
                        </div>
                        <div class="col-md-1">
                            SAMEDI
                        </div>
                        <div class="col-md-1">
                            DIMANCHE
                        </div>
                    </div>

                    <hr class="hr-gradient">
                    <div class="week-period row eight-cols cours text-center">
                        <div class="col-md-1 period" style="top:0px;">
                            <div class="period-content">
                                <div class="name-period">
                                    MATIN
                                </div>
                                <div class="schedule-period">
                                    06h - 12h
                                </div>
                            </div>

                        </div>
                        <div class="cours-week col-md-1 row" id="lunMatin">
                        </div>
                        <div class="cours-week col-md-1 row" id="marMatin">
                        </div>
                        <div class="cours-week col-md-1 row" id="merMatin">
                        </div>
                        <div class="cours-week col-md-1 row" id="jeuMatin">
                        </div>
                        <div class="cours-week col-md-1 row" id="venMatin">
                        </div>
                        <div class="cours-week col-md-1 row" id="samMatin">
                        </div>
                        <div class="cours-week col-md-1 row" id="dimMatin">
                        </div>


                    </div>
                    <hr class="hr-gradient">
                    <div class="week-period row eight-cols cours text-center">
                        <div class="col-md-1 period" style="top:0px;">
                            <div class="period-content">
                                <div class="name-period">
                                    MIDI
                                </div>
                                <div class="schedule-period">
                                    12h - 13h
                                </div>
                            </div>
                        </div>
                        <div class="cours-week col-md-1 row" id="lunMidi">
                        </div>
                        <div class="cours-week col-md-1 row" id="marMidi">
                        </div>
                        <div class="cours-week col-md-1 row" id="merMidi">
                        </div>
                        <div class="cours-week col-md-1 row" id="jeuMidi">
                        </div>
                        <div class="cours-week col-md-1 row" id="venMidi">
                        </div>
                        <div class="cours-week col-md-1 row" id="samMidi">
                        </div>
                        <div class="cours-week col-md-1 row" id="dimMidi">
                        </div>


                    </div>

                    <hr class="hr-gradient">
                    <div class="week-period row eight-cols cours text-center">
                        <div class="col-md-1 period" style="top:0px;">
                            <div class="period-content">
                                <div class="name-period">
                                    APRES MIDI
                                </div>
                                <div class="schedule-period">
                                    13h - 18h
                                </div>
                            </div>
                        </div>
                        <div class="cours-week col-md-1 row" id="lunAm">
                        </div>
                        <div class="cours-week col-md-1 row" id="marAm">
                        </div>
                        <div class="cours-week col-md-1 row" id="merAm">
                        </div>
                        <div class="cours-week col-md-1 row" id="jeuAm">
                        </div>
                        <div class="cours-week col-md-1 row" id="venAm">
                        </div>
                        <div class="cours-week col-md-1 row" id="samAm">
                        </div>
                        <div class="cours-week col-md-1 row" id="dimAm">
                        </div>
                    </div>

                    <hr class="hr-gradient">
                    <div class="week-period row eight-cols cours text-center">
                        <div class="col-md-1 period" style="top:0px;">
                            <div class="period-content">
                                <div class="name-period">
                                    SOIR
                                </div>
                                <div class="schedule-period">
                                    18h - 22h
                                </div>
                            </div>
                        </div>
                        <div class="cours-week col-md-1 row" id="lunSoir">
                        </div>
                        <div class="cours-week col-md-1 row" id="marSoir">
                        </div>
                        <div class="cours-week col-md-1 row" id="merSoir">
                        </div>
                        <div class="cours-week col-md-1 row" id="jeuSoir">
                        </div>
                        <div class="cours-week col-md-1 row" id="venSoir">
                        </div>
                        <div class="cours-week col-md-1 row" id="samSoir">
                        </div>
                        <div class="cours-week col-md-1 row" id="dimSoir">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--dialog box--> 
        <a id="modalDeletePlanning" style="display:none;" href="#ex2" rel="modal:open"></a>
        <a id="modalDeletePlanning" style="display:none;" href="#ex2" rel="modal:close"></a>
        <div id="ex2" style="display:none;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Suppression Planning !</h5>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ce planning ?</p>
                </div>
                <div class="modal-footer">
                    <a type="button" onclick="deleteUserPlanning()" class="btn btn-success btn-modal" href="#ex2" rel="modal:close">Oui</a>
                    <a class="btn btn-danger btn-modal" href="#ex2" rel="modal:close">Non</a>
                </div>
            </div>
            <!-- Modal HTML embedded directly into document -->
            <a id="modalSave" style="display:none;" href="#ex1" rel="modal:open"></a>
            <a id="modalSaveClose" style="display:none;" href="#ex1" rel="modal:close"></a>
            <div id="ex1" style="display:none;">
                <img id="imgSave">
            </div>
            <!-- Scripts -->
            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/wow.min.js"></script>
            <script src="js/typewriter.js"></script>
            <script src="js/jquery.onepagenav.js"></script>
            <script src="js/main.js"></script>
            <script src="js/bootstrap-select.min.js"></script>
            <script src="js/jquery.modal.js"></script>

            <script>
                        var clientCours = [];
                        var fitCours = [];
                        
                        function loadUserPalnning() {
                            $('#userPlanning').html("");
                            $('#btnSavePlanningUser').hide();
                            $('#btnCancelPlanningUser').hide();
                            $('#btnSaveEditPlanningUser').hide();
                            $('#namePlanning').hide();
                            $('#userPlanning').selectpicker('show');
                            $('#loadPlanning .colorWhite').show();
                            $.ajax({
                                type: 'POST',
                                url: 'loadUserPlanningAjax.php',
                                data: {},
                                dataType: 'json',
                                success: function (data) {
                                    //$('#userPlanning').append(new Option("Nouvelle semaine", "ns"));
                                    data.forEach(function (element) {
                                        $('#userPlanning').append(new Option(element.planningName, element.planningId));
                                    });
                                    $('#userPlanning').selectpicker('refresh');
                                    $('#userPlanning').change();
                                },
                                error: function (jqXHR) {
                                    $('#userPlanning').html(jqXHR.toString());
                                }
                            });
                        }
                        
                        function disconnection() {
                            $.ajax({
                                type: 'POST',
                                url: 'disconnectionAjax.php',
                                data: {},
                                dataType: 'html',
                                success: function () {
                                    document.location.href = "index.php";
                                },
                                error: function (jqXHR) {
                                    $('#userSection').html(jqXHR.toString());
                                }
                            });
                        }
                        
                        function newWeekClient() {
                            $('#btnSavePlanningUser').show();
                            $('#btnCancelPlanningUser').show();
                            $('#namePlanning').val("");
                            $('#namePlanning').show();
                            clearUserPlanning();
                            $('#userPlanning').selectpicker('hide');
                            $('#loadPlanning .glyphicon').hide();
                            fitCours.forEach(function (cours) {
                                $('#fit' + cours.idCour).find('.cours-title').append('<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&#43</span></button>').attr({onclick: 'addInUserPlanningFromFitPlanning(' + cours.idCour + ',"' + cours.div + '")'})
                            });
                        }
                        
                        function editWeekClient() {
                            $('#userPlanning').selectpicker('hide');
                            $('#loadPlanning .glyphicon').hide();
                            $('#namePlanning').val($('#userPlanning option:selected').text());
                            $('#namePlanning').show();
                            $('#btnCancelPlanningUser').show();
                            $('#btnSaveEditPlanningUser').show();
                            //J'ajoute aux cours dans le planning user un onclick deleteCoursInUserPlanning pour pouvoir supprimer la div lors de la modif.
                            clientCours.forEach(function (cours) {
                                //$('#' + cours.idCour).attr({onclick: 'deleteCoursInUserPlanning("' + cours.div + '","' + cours.idCour + '","' + cours.index + '")'});
                                $('#' + cours.idCour).find('.cours-title').append('<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>').attr({onclick: 'deleteCoursInUserPlanning("' + cours.div + '","' + cours.idCour + '")'});
                            });
                            fitCours.forEach(function (cours) {
                                $('#fit' + cours.idCour).find('.cours-title').append('<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&#43</span></button>').attr({onclick: 'addInUserPlanningFromFitPlanning(' + cours.idCour + ',"' + cours.div + '")'})
                            });
                        }
                        
                        $('#userPlanning').change(function () {
                            clearUserPlanning();
                            loadCoursClient();
                        });
                        
                        function loadCoursFitness(idClubs) {
                            $.ajax({
                                type: 'POST',
                                url: 'loadCoursFitnessAjax.php',
                                data: {'idClubs': idClubs},
                                dataType: 'json',
                                success: function (data) {
                                    data.forEach(function (element) {
                                        var cours = {idCour: element.idCours, div: element.div};
                                        fitCours.push(cours);
                                        addCoursInDiv(element);
                                    });
                                },
                                error: function (jqXHR) {
                                    $('#userSection').html(jqXHR.toString());
                                }
                            });
                        }
                        
                        function loadCoursClient() {
                            var idCourLoad = $('#userPlanning').val();
                            $.ajax({
                                type: 'POST',
                                url: 'loadCoursClientAjax.php',
                                data: {'idCourLoad': idCourLoad},
                                dataType: 'json',
                                success: function (data) {
                                    data.forEach(function (element) {
                                        var cours = {idCour: element.idCours, div: element.div};
                                        clientCours.push(cours);
                                        $("#user" + element.div)
                                                .append($('<div>').attr("id", element.idCours)
                                                        .append($('<div class="cours-odd">')
                                                                .append($('<div class="col-md-12 cours-left">')
                                                                        .append($('<div class="cours-title">').text(element.nmCours))
                                                                        .append($('<div class="cours-schedule">').text(element.heureDebut + " - " + element.heureFin))
                                                                        .append($('<div class="cours-schedule">').html('<img src="img/fit/' + element.logoFit + '" width="60%" > ' + element.club + '')
                                                                                )
                                                                        )
                                                                )
                                                        );
                                    });
                                },
                                error: function (jqXHR) {
                                    $('#userSection').html(jqXHR.toString());
                                }
                            });
                        }
                        
                        function loadFitnessAsCustomer() {
                            $.ajax({
                                type: 'POST',
                                url: 'loadFitnessCustomerAjax.php',
                                data: {},
                                dataType: 'json',
                                success: function (data) {
                                    data.forEach(function (fit) {
                                        $('#fitClient option[value="' + fit.idFitAsCustomer + '"]').attr("selected", "selected");
                                    });
                                    $('#fitClient').selectpicker('refresh');
                                    $('#fitClient').change();
                                    setTimeout(function () {
                                        loadClubAsCustomer();
                                    }, 100);
                                },
                                error: function (jqXHR) {
                                    $('#fitClient').html(jqXHR.toString());
                                }
                            });
                        }
                        
                        function loadClubAsCustomer() {
                            $.ajax({
                                type: 'POST',
                                url: 'loadClubCustomerAjax.php',
                                data: {},
                                dataType: 'json',
                                cache: false,
                                success: function (data) {
                                    data.forEach(function (element) {
                                        $('#clubClient option[value="' + element.idClubAsCustomer + '"]').attr("selected", "selected");
                                        $('#clubClient').selectpicker('refresh');
                                    });
                                    $('#clubClient').selectpicker('refresh');
                                    $('#clubClient').change();
                                },
                                error: function (jqXHR) {
                                    $('#clubClient').html(jqXHR.toString());
                                }
                            });
                        }
                        
                        $("#fitClient").change(function () {
                            $("#clubClient").empty();
                            $("#fitCalendar div.cours-week.col-md-1.row").empty();
                            $('#fitClient').selectpicker('refresh');
                            $("#fitClient option:selected").each(function () {
                                loadClubAsFitness($(this).val());
                            });
                        });
                        
                        function loadClubAsFitness(idFit) {
                            $.ajax({
                                type: 'POST',
                                url: 'loadClubAsFitnessAjax.php',
                                data: {'idFit': idFit},
                                dataType: 'json',
                                success: function (data) {
                                    data.forEach(function (element) {
                                        $('#clubClient').append($('<optgroup>').attr('label', element.nameFit).append(new Option(element.nameClub, element.idClub)));
                                        $('#clubClient').selectpicker('refresh');
                                    });
                                },
                                error: function (jqXHR) {
                                    $('#clubClient').html(jqXHR.toString());
                                }
                            });
                        }
                        
                        $("#clubClient").change(function () {
                            fitCours = [];
                            $("#fitCalendar div.cours-week.col-md-1.row").empty();
                            var idClubs = [];
                            $("#clubClient :selected").each(function () {
                                idClubs.push($(this).val());
                            });
                            if (idClubs.length > 0) {
                                loadCoursFitness(idClubs);
                                SaveClubCustomer();
                            }
                        });
                        
                        function addCoursInDiv(data) {
                            $("#" + data.div).append($('<div>').attr({id: 'fit' + data.idCours}).append($('<div class="cours-odd">').append($('<div class="col-md-12 cours-left">').append($('<div class="cours-title">').text(data.nmCours)).append($('<div class="cours-schedule">').text(data.heureDebut + " - " + data.heureFin).append($('<div class="cours-schedule">').html('<img src="img/fit/' + data.logoFit + '" width="60%" > ' + data.club + ''))))));
                        }
                        
                        function addInUserPlanningFromFitPlanning(idCours, div) {
                            if (!$("#user" + div).find("#" + idCours).length)
                            {
                                var cours = {idCour: idCours, div: div};
                                clientCours.push(cours);
                                $("#fit" + idCours).clone().attr('id', idCours).appendTo('#user' + div);
                                $("#user" + div).find("span").html("&times");
                                $("#user" + div).find("#" + idCours).find(".cours-title").attr('onclick', 'deleteCoursInUserPlanning("' + div + '","' + idCours + '")');
                            }
                        }
                        
                        function clearUserPlanning() {
                            clientCours.forEach(function (element) {
                                deleteDisplayCoursInUserPlanning(element.div, element.idCour);
                            });
                            clientCours = [];
                        }
                        
                        function deleteDisplayCoursInUserPlanning(div, idCours) {
                            $("#user" + div).find("#" + idCours).remove();
                        }
                        
                        function deleteCoursInUserPlanning(div, idCours) {
                            deleteDisplayCoursInUserPlanning(div, idCours);
                            var indexCours = searchIndexInArray(idCours, clientCours, "idCour");
                            clientCours.splice(indexCours, 1);
                        }
                        
                        function searchIndexInArray(termSearch, array, propSearch) {
                            var index;
                            var cmpt = -1;
                            array.forEach(function (element) {
                                cmpt = cmpt + 1;
                                if (element[propSearch] === termSearch) {
                                    index = cmpt;
                                }
                            });
                            return index;
                        }
                        
                        function deleteUserPlanning() {
                            var idPlanning = $('#userPlanning').val();
                            $.ajax({
                                type: 'POST',
                                url: 'deleteUserPlanningAjax.php',
                                data: {'idPlanning': idPlanning},
                                success: function () {
                                    $("#userPlanning").val($("#userPlanning option:first").val());
                                    $("#userPlanning option[value='" + idPlanning + "']").remove();
                                    $('#userPlanning').selectpicker('refresh');
                                    $('#userPlanning').change();
                                },
                                error: function (jqXHR) {
                                    $('#userPlanning').html(jqXHR.toString());
                                }
                            });
                        }
                        
                        function saveWeekClient() {
                            var namePlanning = $("#namePlanning").val();
                            $.ajax({
                                type: 'POST',
                                url: 'savePlanningAjax.php',
                                data: {'clientCours': clientCours, 'namePlanning': namePlanning},
                                dataType: 'json',
                                success: function (data) {
                                    if (data.status === "success") {
                                        $("#imgSave").attr("src", "img/checked.png");
                                        $('#modalSave').click();
                                        setTimeout(function () {
                                            $('#modalSaveClose').click();
                                            $("#namePlanning").val("");
                                        }, 2000);
                                        loadUserPalnning();
                                        lockEditFitCours();
                                        //$("#userPlanning").val("ns").change();
                                    }
                                    if (data.status === "error") {
                                        $("#imgSave").attr("src", "img/cancel.png");
                                        $('#modalSave').click();
                                        setTimeout(function () {
                                            $('#modalSaveClose').click();
                                            $("#namePlanning").val("");
                                        }, 2000);
                                        loadUserPalnning();
                                        lockEditFitCours();
                                    }
                                },
                                error: function (jqXHR) {
                                    $('#userSection').html(jqXHR.toString());
                                }
                            });
                        }
                        
                        function SaveClubCustomer() {
                            var clubCustomer = [];
                            $("#clubClient :selected").each(function () {
                                var club = {idClub: $(this).val(), nameClub: $(this).text()};
                                clubCustomer.push(club);
                            });
                            $.ajax({
                                type: 'POST',
                                url: 'saveClubCustomerAjax.php',
                                data: {'clubCustomer': clubCustomer},
                                success: function () {

                                },
                                error: function (jqXHR) {
                                    $('#userSection').html(jqXHR.toString());
                                }
                            });
                        }
                        
                        function saveEditWeekClient() {
                            var namePlanning = $('#namePlanning').val();
                            var idPlanning = $("#userPlanning").val();
                            $.ajax({
                                type: 'POST',
                                url: 'saveEditWeekClientAjax.php',
                                data: {'clientCours': clientCours, 'namePlanning': namePlanning, 'idPlanning': idPlanning},
                                dataType: 'json',
                                success: function (data) {
                                    if (data.status === "success") {
                                        $("#imgSave").attr("src", "img/checked.png");
                                        $('#modalSave').click();
                                        setTimeout(function () {
                                            $('#modalSaveClose').click();
                                            $("#namePlanning").val("");
                                        }, 2000);
                                        
                                        loadUserPalnning();
                                        lockEditFitCours();
                                        //$("#userPlanning").val("ns").change();
                                    }
                                    if (data.status === "error") {
                                        $("#imgSave").attr("src", "img/cancel.png");
                                        $('#modalSave').click();
                                        setTimeout(function () {
                                            $('#modalSaveClose').click();
                                            $("#namePlanning").val("");
                                        }, 2000);
                                        
                                        loadUserPalnning();
                                        lockEditFitCours();
                                    }
                                },
                                error: function (jqXHR) {
                                    $('#userSection').html(jqXHR.toString());
                                }
                            });
                        }
                        
                        function cancelActionPlanningUser() {
                            $('#btnSavePlanningUser').hide();
                            $('#btnCancelPlanningUser').hide();
                            $('#btnSaveEditPlanningUser').hide();
                            $('#namePlanning').hide();
                            $('#userPlanning').selectpicker('show');
                            $('#loadPlanning .colorWhite').show();
                            $('#userPlanning').change();
//                            lockEditClientCours();
                            lockEditFitCours();
                        }
                        
//                        function lockEditClientCours(){
//                            clientCours.forEach(function (cours) {
//                                $('#' + cours.idCour).find('.cours-title').attr({onclick: ''});
//                                $('#' + cours.idCour).find('span').remove();
//                            });
//                        }
                        
                        function lockEditFitCours() {
                            fitCours.forEach(function (cours) {
                                $('#fit' + cours.idCour).find('.cours-title').attr({onclick: ''});
                                $('#fit' + cours.idCour).find('span').remove();
                            });
                        }
                        
                        $(document).ready(function () {
                            loadFitnessAsCustomer();
                            loadUserPalnning();
                        });
            </script>
    </body>
</html>
