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
        #ada {
            margin-bottom: 40px;
        }
        #smoltext {
            font-size: 16px;
        }
    </style>
    <style>
        @media screen and (max-width: 1200px) {
            #container {
                background-image: url(CardBack.png);
            }
            .form-check d-flex justify-content-center mb-5 {
                text-align: center; 
            }
        }
    </style>
    <style>
        .err {
            text-align: center;
            color: red;
        }
        .form-label {
            font-weight: 600;
            letter-spacing: 2px;
        }
        @media screen and (min-width: 1200px) {
            .err {
                padding-top: 10px;
                font-size: 14px;
                height: 5.75vh;
                font-weight: 100;
            }
        }
        @media screen and (max-width: 1200px) {
            .err {
                height: 8.2875vh;
                font-size: 22px;
                font-weight: 900;
                letter-spacing: 3px;
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
                <a class="tabalign" href="Home.php">Home</a>
                <a class="tabalign" href="Signup.php">Signup</a>
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
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" id="labels">Login</p>
                                        <form class="mx-1 mx-md-4" style="background-color: transparent;">
                                            <div class="d-flex flex-row align-items-center mb-4" id="bot" style="background-color: transparent;">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0" style="background-color: transparent;">
                                                    <label class="form-label" for="form3Example1c" id="user">Email or User Name</label>
                                                    <input type="text" id="form3Example1c" class="form-control" name="id"/>
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

                                            <div class="form-check d-flex justify-content-center mb-5" id="bot" style="background-color: transparent; margin-left: 30px;">
                                                <input type="checkbox" id="cb" name="remMe" />
                                                <label class="form-check-label" for="form2Example3" id="smoltext">
                                                    Remember Me
                                                </label>
                                            </div>

                                            <div class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="margin-top: 10px; background-color: transparent; padding-bottom: 25px;">
                                                <a href="Signup.php" id="have">Don't Have An Account? Click Me!</a>
                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4" id="login" style="background-color: transparent; padding-bottom: 25px;">
                                                <button type="button" class="btn btn-primary btn-lg" id="reg">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                        <img src="CardBack.png" class="img-fluid" id="ada" alt="Sample image" />
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
            $('#reg').click(function () {
                var user = $('#form3Example1c').val();
                var pass = $('#form3Example4c').val();
                if (user == "") {
                    $("#userErr").html("User Name or Email is Required");
                }
                if (pass == "") {
                    $("#passErr").html("Password is Required");
                }
                $.ajax({
                    url: "LoginS.php",
                        type: "POST",
                        data: {
                            id: user,
                            password: pass
                        },
                        success: function (result) {
                            var jsonCallBack = JSON.parse(result);
                            function passCheck() {
                                if (pass == "") {
                                    $("#passErr").html("Password is Required");
                                }
                                else {
                                    $("#passErr").html("Password is incorrect");
                                }
                            }
                            if (jsonCallBack == "User does not exist") {
                                $("#userErr").html("User does not exist");
                                passCheck();
                            }
                            else if (jsonCallBack == "Password is incorrect") {
                                passCheck();
                            }
                            else if (jsonCallBack == jsonCallBack) {
                                location.href = "GenericUser.php";
                            }
                        },
                        error: function () {
                            alert("Error Connecting to Login.php");
                        }
                });
            });
        });
    </script>
</body>
</html>