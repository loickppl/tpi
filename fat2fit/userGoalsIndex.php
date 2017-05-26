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
                        <li class="active"><a href="userGoalsIndex.php">Objectifs</a></li>
                        <li><a href="userIndex.php">Plannings</a></li>
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
            <!--            <div id="userGoal" style="width: 70%; margin: auto;">
                            <div class="panel panel categoryProgram"> 
                                <div class="panel-heading titleCategoryProgram"> 
                                    <h3 class="panel-title">Sélectionez vos activitées :</h3> 
                                </div> 
                                <div id="panelCategory" class="panel-body bodyCategoryProgram">
            
                                </div> 
                            </div> 
                        </div>-->


            <div class="carousel slide" id="myCarousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/mike.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/jeff.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/mike.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/jeff.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/mike.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/mike.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/jeff.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/mike.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/jeff.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/mike.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/mike.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/jeff.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                        <div class="col-sm-3 coach">
                            <div class="thumbnail">
                                <a href="#"><img class="coachImg" src="img/coach/mike.png" alt=""></a>
                                <p class="coachTxtLeft">Minceur Extrem</p>
                                <p class="coachTxtRight">Mike</p>
                            </div>
                        </div>
                    </div>
                </div>


                <nav>
                    <ul class="control-box pager">
                        <li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
                        <li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
                    </ul>
                </nav>  

            </div><!-- /#myCarousel -->


        </section>
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
                                        $(document).ready(function () {
                                            //loadProgramCategory();
                                        });

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

                                        function loadProgramCategory() {
                                            $.ajax({
                                                type: 'POST',
                                                url: 'loadProgramCategoryAjax.php',
                                                data: {},
                                                dataType: 'json',
                                                success: function (data) {
                                                    data.forEach(function (element) {
                                                        $('#panelCategory').append('<div class="categoryPanelCategoryProgram"> <div class="checkBoxPanelCategoryProgram"></div> <span style="color: white;">' + element.categoryName + '</span> </div>');
                                                    });
                                                },
                                                error: function (jqXHR) {
                                                    $('#userSection').html(jqXHR.toString());
                                                }
                                            });
                                        }
        </script>
    </body>
</html>
