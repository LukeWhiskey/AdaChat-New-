<?php 
    session_start();
    if(isset($_SESSION['user'])) {
        header("Location: ". $_SERVER[HTTP_REFERER]);
    }
?> 
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="AdaChat.css">
    <link rel="stylesheet" href="SLpages.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        #have {
            letter-spacing: 5px;
            font-size: 15px;
        }
        #have:hover {
            color: rgb(255, 0, 255);
        }
        @media screen and (max-width: 1200px) {
            #have {
                text-shadow: 2px 2px 2px black;
                font-weight: 900;
                letter-spacing: 1px;
            }
            .tabalign {
                width: 50%;
            }
        }
        #tos {
            color: rgb(250, 0, 200);
            font-weight: 200;
        }
        #tos:hover {
            color: rgb(255, 0, 255);
        }
    </style>
    <style>
        @media screen and (max-width: 1200px) {
            #container {
                background-image: url(Ada.png);
            }
            #bot, #login {
                margin-top: 2.65vh;
            }
        }
    </style>
    <style>
        .err {
            color: red;
            text-align: center;
        }
        .form-label {
            font-weight: 600;
            letter-spacing: 2px;
        }
        @media screen and (min-width: 1200px) {
            .err {
                height: 3vh;
                padding-top: 10px;
                font-size: 14px;
                font-weight: 100;
            }
        }
        @media screen and (max-width: 1200px) {
            .err {
                height: 3.5vh;
                padding-top: 10px;
                text-align: center;
                font-weight: 900;
                letter-spacing: 2px;
                font-size: 14px;
                text-shadow: 0px 2px 5px black;
            }
            .form-label {
                text-shadow: 0px 2px 5px black;
            }
        }
    </style>
</head>
<body style="background-color: rgb(0, 0, 30);">
    <cont>
        <div class="headCont">
            <div class="bar">
                <a class="tabalign" href="Login.php">Login</a>
                <a class="tabalign" href="Home.php">Home</a>
            </div>
            <h1 class="header" id="AdaH"></h1>
            <p class="subHead" id="AdaS"></p>
        </div>
        <section class="vh-100" id="container" style="background-color: transparent;">
            <div class="container h-100" style="background-color: transparent;">
                <div class="row d-flex justify-content-center align-items-center h-100" style="background-color: transparent;">
                    <div class="col-lg-12 col-xl-11" style="background-color: transparent;">
                        <div class="card text-black" style="border-radius: 25px; background-color: transparent;">
                            <div class="card-body p-md-5" style="background-color: transparent;">
                                <div class="row justify-content-center" id="text" style="background-color: transparent;">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1" style="background-color: transparent;">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" id="labels">Sign up</p>
                                        <form class="mx-1 mx-md-4" style="background-color: transparent;" action="SignupS.php" method="POST">
                                            <div class="d-flex flex-row align-items-center mb-4" id="bot" style="background-color: transparent;">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0" style="background-color: transparent;">
                                                    <label class="form-label" for="form3Example3c" id="email">Your Email</label>
                                                    <input type="email" id="form3Example3c" class="form-control" name="email" />
                                                    <div class="err" id="emailErr"></div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4" id="bot" style="background-color: transparent;">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0" style="background-color: transparent;">
                                                    <label class="form-label" for="form3Example1c" id="user">User Name</label>
                                                    <input type="text" id="form3Example1c" class="form-control" name="user" />
                                                    <div class="err" id="userErr"></div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4" id="bot" style="background-color: transparent;">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0" style="background-color: transparent;">
                                                    <label class="form-label" for="form3Example4c" id="password">Password</label>
                                                    <input type="password" id="form3Example4c" class="form-control" name="password" />
                                                    <div class="err" id="passErr"></div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4" id="bot" style="background-color: transparent;">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0" style="background-color: transparent;">
                                                    <label class="form-label" for="form3Example4cd" id="passwordRep">Repeat your password</label>
                                                    <input type="password" id="form3Example4cd" class="form-control" name="passwordRep" />
                                                    <div class="err" id="passRepErr"></div>
                                                </div>
                                            </div>

                                            <div class="form-check d-flex justify-content-center mb-5" id="bot" style="background-color: transparent; margin-left: 30px;">
                                                <input type="checkbox" id="cb" name="tosBox" required />
                                                <label class="form-check-label" for="form2Example3" id="smoltext">
                                                    I agree to all statements in <a href="tos.html" id="tos">Terms of service</a>
                                                </label>
                                            </div>

                                            <div class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="margin-top: 10px; background-color: transparent; padding-bottom: 25px;">
                                                <a href="Login.php" id="have">Have An Account? Click Me!</a>
                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4" style="margin-top: 10px; background-color: transparent; padding-bottom: 25px;">
                                                <button type="submit" class="btn btn-primary btn-lg" id="reg" name="reg">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                        <img src="ada.png" class="img-fluid" id="ada" alt="Sample image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" id="footer">
                © 2022 Copyright:
                <a class="text-dark" href="">Copyright Notice</a>
            </div>
            <!-- Copyright -->
        </footer>
    </cont>
    <script src="AdaChat.js"></script>
    <script>
        $(document).ready(function () {
            let emailReq = "Email is Required";
            let userReq = "User Name is Required";
            let passReq = "Password is Required";
            let passRepReq = "Password needs to match";
            setInterval(function () {
                knownEmails = [];
                knownUsers = [];
                var emailIn = $('#form3Example3c').val();
                var userIn = $('#form3Example1c').val();
                var passWIn = $('#form3Example4c').val();
                var passWRepIn = $('#form3Example4cd').val();
                $.getJSON('Users.json', function (data) {
                    keys = data.Users;
                    userKeys = Object.keys(keys);
                    $.each(userKeys, function (k, v) {
                        string = JSON.stringify(keys[v]);
                        parsedEmail = JSON.parse(string).email;
                        knownEmails.push(parsedEmail);
                        parsedName = JSON.parse(string).userName;
                        knownUsers.push(parsedName);
                    });
                    if (knownEmails.includes(emailIn)) {
                        $('#emailErr').html("Email is already registered");
                    }
                    else if (emailIn != "") {
                        $('#emailErr').html("");
                    }

                    if (knownUsers.includes(userIn)) {
                        $('#userErr').html("User Name is already registered");
                    }
                    else if (userIn != "") {
                        $('#userErr').html("");
                    }

                    if (passWIn != "") {
                        $('#passErr').html("");
                        $('#passRepErr').html("");
                    }
                    if (passWIn != "" && passWRepIn != "") {
                        if (passWIn != passWRepIn) {
                            $('#passRepErr').html("Passwords needs to match");
                        }
                        if (/[0-9]/.test(passWIn) == false && /[A-Z]/.test(passWIn) == false) {
                            $('#passErr').html("Password Must Contain Numbers and Capital Letters");
                        }
                        else if (/[0-9]/.test(passWIn) == false) {
                            $('#passErr').html("Password Must Contain Numbers");
                        }
                        else if (/[A-Z]/.test(passWIn) == false) {
                            $('#passErr').html("Password Must Contain Capital Letters");
                        }
                    }
                }).fail(function () {
                    alert("Failed contacting Users.json");
                });
            }, 50);
            $('#reg').click(function () {
                var emailIn = $('#form3Example3c').val();
                var userIn = $('#form3Example1c').val();
                var passWIn = $('#form3Example4c').val();
                var passWRepIn = $('#form3Example4cd').val();
                if (emailIn == "") {
                    $('#emailErr').html(emailReq);
                }
                if (userIn == "") {
                    $('#userErr').html(userReq);
                }
                if (passWIn == "") {
                    $('#passErr').html(passReq);
                }
                if (passWIn != "") {
                    if (passWRepIn == "") {
                        $('#passRepErr').html(passRepReq);
                    }
                }
                if (emailIn == "" || userIn == "" || passWIn == "" || passWRepIn == "") {
                    return false;
                }
                else if (knownEmails.includes(emailIn) || knownUsers.includes(userIn) || passWIn != passWRepIn) {
                    return false;
                }
                ///check unique email and parameters
                ///check unique user
                ///check password matches parameters
                ///check password repeat match
                ///check tos is TRUE

                //My will is iron willed
                //No one will ever save me
                //I'am pissed off with the life i have
                //I believe i can do anything, given enough time
            });
        });
    </script>
</body>
</html>