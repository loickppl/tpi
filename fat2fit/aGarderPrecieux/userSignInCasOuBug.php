<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.6-dist/css/style.css" rel="stylesheet">
        <link href="bootstrap-3.3.6-dist/css/half-slider.css" rel="stylesheet">
        <title>Fat 2 Fit : Inscription</title>
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
    </head>

    <body>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Login</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <section id="pricing" class="section">
            <div class="container">
                <div class="row title text-center" >
                    <h2 class="margin-top white" >Inscription</h2>
                    <h4 class="light white">Rejoiniez nous en tant qu'utilisateur et planifier votre semaine selon vos cours !</h4>
                    <h4 class="light white" id="confirmInsc" style="height: 400px;"></h4>
                </div>
                <div id="formInsc" style="background-color: #00a8ff; padding: 30px; width: 50%; margin-right: auto; margin-left: auto;">
                    <form action="javascript:void(0);">
                        <label id="errEmail" style="color: #ff3333"></label>
                        <input type="email" class="form-control form-white" placeholder="Email Address" id="emailS" required><br>
                        <input type="text" class="form-control form-white" placeholder="Nom" id="name" pattern="[A-Z]{}" required><br>
                        <input type="text" class="form-control form-white" placeholder="Prénom" id="prenom" pattern="[A-Z]{}" required><br>
                        <input type="date" class="form-control form-white" placeholder="Date de naissance" id="dtBirth" required><br>
                        <select class="form-control form-white" id="gender" required>
                            <option style="color: #00a8ff">M</option>
                            <option style="color: #00a8ff">Mme</option>
                            <option style="color: #00a8ff">Mlle</option>
                        </select><br>
                        <input type="password" class="form-control form-white" placeholder="Password" id="pwdS" required><br>   
                        <label id="errPassword" style="color: #ff3333"></label>
                        <input type="password" class="form-control form-white" placeholder="Confirm Password" id="pwdConfirmS" required>                
                        <input type="submit" value="Submit" class="btn btn-submit" onclick="signIn()">
                    </form>
                </div>
            </div>
        </section>
        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-popup">
                    <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                    <h3 class="white">Login</h3>
                    <form action="javascript:void(0);" class="popup-form">
                        <input type="email" class="form-control form-white" placeholder="Email Address" id="email">
                        <input type="password" class="form-control form-white" placeholder="Password" id="pwd">
                        <label id="errLogin" style="color: #ff3333"></label>
                        <button type="submit" class="btn btn-submit" onclick="login()">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 text-center-mobile">
                        <h3 class="white">Reserve a Free Trial Class!</h3>
                        <h5 class="light regular light-white">Shape your body and improve your health.</h5>
                        <a href="#" class="btn btn-blue ripple trial-button">Start Free Trial</a>
                    </div>
                    <div class="col-sm-6 text-center-mobile">
                        <h3 class="white">Opening Hours <span class="open-blink"></span></h3>
                        <div class="row opening-hours">
                            <div class="col-sm-6 text-center-mobile">
                                <h5 class="light-white light">Mon - Fri</h5>
                                <h3 class="regular white">9:00 - 22:00</h3>
                            </div>
                            <div class="col-sm-6 text-center-mobile">
                                <h5 class="light-white light">Sat - Sun</h5>
                                <h3 class="regular white">10:00 - 18:00</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bottom-footer text-center-mobile">
                    <div class="col-sm-8">
                        <p>&copy; 2016 All Rights Reserved.</p>
                    </div>
                    <div class="col-sm-4 text-right text-center-mobile">
                        <ul class="social-footer">
                            <li><a href="http://www.facebook.com/pages/Codrops/159107397912"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="http://www.twitter.com/codrops"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://plus.google.com/101095823814290637419"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Holder for mobile navigation -->
        <div class="mobile-nav">
            <ul>
            </ul>
            <a href="#" class="close-link"><i class="arrow_up"></i></a>
        </div>
        <!-- Scripts -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/typewriter.js"></script>
        <script src="js/jquery.onepagenav.js"></script>
        <script src="js/main.js"></script>
        <script>
                            function login() {
                                var email = $('#email').val();
                                var pwd = $('#pwd').val();
                                if ((email.indexOf("@") >= 0) && (email.indexOf(".") > email.indexOf("@"))) {
                                    $.ajax({
                                        method: 'POST',
                                        url: 'loginAjax.php',
                                        data: {'email': email, 'pwd': pwd},
                                        dataType: 'json',
                                        success: function (data) {
                                            if (data.status === "errorEmail") {
                                                $('#errLogin').show();
                                                $('#errLogin').text('E-mail incorrect !');
                                            }
                                            if (data.status === "errorPwd") {
                                                $('#errLogin').show();
                                                $('#errLogin').text('Mot de passe incorrect !');
                                            }
                                            if (data.status === "errorUnverified") {
                                                $('#errLogin').show();
                                                $('#errLogin').text('E-mail pas encore vérifié !');
                                            }
                                            if (data.status === "success") {
                                                document.location.href = "userIndex.php";
                                            }
                                        },
                                        error: function (jqXHR) {
                                            $('#errLogin').text(jqXHR);
                                        }
                                    });
                                }
                            }

                            function signIn() {
                                var email = $('#emailS').val();
                                var pwd = $('#pwdS').val();
                                var pwdConfirm = $('#pwdConfirmS').val();
                                var name = $('#name').val();
                                var prenom = $('#prenom').val();
                                var gender = $('#gender').val();
                                var dtBirth = $('#dtBirth').val();
                                if (email !== "" && pwd !== "" && pwdConfirm !== "" && name !== "" && prenom !== "" && gender !== "" && dtBirth !== "" && (email.indexOf("@") >= 0) && (email.indexOf(".") > email.indexOf("@"))) {
                                    if (pwd === pwdConfirm) {
                                        $.ajax({
                                            method: 'POST',
                                            url: 'createUserAjax.php',
                                            data: {'email': email, 'confirmPwd': pwdConfirm, 'name': name, 'prenom': prenom, 'gender': gender, 'dtBirth': dtBirth},
                                            dataType: 'json',
                                            success: function (data) {
                                                $('#errPassword').hide();
                                                $('#errEmail').hide();
                                                if (data.status === "error") {
                                                    $('#errEmail').show();
                                                    $('#errEmail').text('E-mail déjà utilisé !');
                                                }
                                                if (data.status === "success") {
                                                    $('#confirmInsc').show();
                                                    $('#confirmInsc').text('Un email de confirmation a été envoyé à ' + email + ' !');
                                                    $('#formInsc').hide();
                                                }
                                            },
                                            error: function (jqXHR) {
                                                $('#errPassword').text(jqXHR);
                                            }
                                        });
                                    } else {
                                        $('#errPassword').text("Les mots de passe sont différent !");
                                        $('#errPassword').show();
                                    }
                                }
                            }
                            ;

                            $('#emailS').on('keypress', function (e) {
                                if (e.which === 32)
                                    return false;
                            });

                            $('#name').on('keypress', function (e) {
                                if (e.which <= 90 && e.which >= 65 || e.which <= 122 && e.which >= 97) {

                                } else {
                                    return false;
                                }
                            });

                            $('#prenom').on('keypress', function (e) {
                                if (e.which <= 90 && e.which >= 65 || e.which <= 122 && e.which >= 97) {

                                } else {
                                    return false;
                                }
                            });

                            $(document).ready(function () {
                                $('#errLogin').hide();
                                $('#errEmail').hide();
                                $('#errPassword').hide();
                                $('#confirmInsc').hide();
                            });

        </script>
    </body>
</html>



