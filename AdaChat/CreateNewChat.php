<?php 
    session_start();
    
    if(!isset($_SESSION['user'])) {
        header("Location: Login.php");
    }
    else if($_SESSION['user']['user'] == Null or $_SESSION['user']['id'] == Null) {
        unset($_SESSION['user']);
        header("Location: Login.php");
    }
?>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="AdaChat.css">
    <link rel="stylesheet" href="GenericTab.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .form-label {
            padding: 15px;
            font-size: 25px;
        }

        #form3Example1c {
            height: 200px;
            resize: none;
            padding: 15px;
            border-radius: 20px;
        }

        #form3Example2c {
            height: 25px;
            width: 25px;
            margin-left: 20px;
            float: right;
        }

        #form3Example3c {
            font-size: 25px;
            padding: 25px;
            height: 50px;
            width: 900px;
            margin-left: calc(50% - 450px);
            text-align: center;
        }

        .form-outline {
            margin-bottom: 25px;
        }

        #bot {
            text-align: center;
            padding: 20px;
        }
        #reg:active {
            outline: none;
        }

        @media screen and (min-width: 767.5px) {
            #form3Example1c {
                height: 300px;
            }
        }

        @media screen and (max-width: 1000px) {
            #form3Example3c {
                width: 90%;
                margin-left: 5%;
            }
        }

        .form-control {
            width: 100%;
            border-bottom-left-radius: 99999px;
            border-top-right-radius: 99999px;
        }

        #create {
            margin-left: calc(50% - 200px);
            background-color: transparent;
            width: 400px;
        }
    </style>
</head>
<body id="body">
    <cont>
        <div class="headCont">
            <div class="bar">
                <?php
                    if (isset($_SESSION['user'])) {
                        echo '<a class="tabalign" href="signout.php">Signout</a>';
                        echo '<a class="tabalign" href="home.php">Home</a>';
                        echo '<a class="tabalign" href="GenericUser.php">Account</a>';
                    }
                    else {
                        echo '<a class="tabalign" href="login.php">Login</a>';
                        echo '<a class="tabalign" href="home.php">Home</a>';
                        echo '<a class="tabalign" href="signup.php">Signup</a>';
                    }
                ?>
            </div>
            <h1 class="header" id="AdaH"></h1>
            <p class="subHead" id="AdaS"></p>
        </div>
        <div class="textCont" style="padding-bottom: 87px;" id="body2">
            <div class="banner">
                <h2 class="title">Create New Chat</h2>
                <div class="chatCont">
                    <form class="mx-1 mx-md-4" id="formCreate" style="background-color: transparent;" action="CreateNewChatS.php" method="POST">
                        <div class="d-flex flex-row align-items-center mb-4" id="bot" style="background-color: transparent;">
                            <label class="form-label" for="form3Example3c">Chat Name</label>
                            <div class="form-outline flex-fill mb-0" style="background-color: transparent;">
                                <input type="text" id="form3Example3c" class="form-control" name="cName" required />
                            </div>
                        </div>

                        <div style="width: 100%; position: relative; text-align: center; margin-top: 20px; color: red; height: 10px;  letter-spacing: 1.5px;" id="nameCheck"></div>
                        <div class="d-flex flex-row align-items-center mb-4" id="bot" style="background-color: transparent;">
                            <label class="form-label" for="form3Example1c">Chat Description</label>
                            <div class="form-outline flex-fill mb-0" style="background-color: transparent;">
                                <textarea type="text" id="form3Example1c" class="form-control" name="desc" style="font-size: 20px;"></textarea>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4" id="bot" style="background-color: transparent; float: left; width: 100%;">
                            <label class="form-label" for="form3Example2c">
                                Is Chat NSFW?
                                <input type="checkbox" id="form3Example2c" class="form-control" name="nsfw" />
                            </label>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4" id="create">
                            <button type="submit" class="btn btn-primary btn-lg" id="reg" name="reg">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" id="footer" style="background-color: transparent;">
                ? 2022 Copyright: <a class="text-dark" href="">Copyright Notice</a>
            </div>
            <!-- Copyright -->
        </footer>
    </cont>
    <script src="AdaChat.js"></script>
    <script>
        $(document).ready(function () {
            setInterval(function () {
                knownNames = [];
                var name = $("#form3Example3c").val();
                $.getJSON('Tabs.json', function (tabData) {
                    jsonKeys = Object.keys(tabData);
                    $.each(jsonKeys, function (k, v) {
                        stringifiedKey = JSON.stringify(jsonKeys[k]);
                        nameCheck = JSON.parse(stringifiedKey);
                        knownNames.push(nameCheck);
                    });
                    if (knownNames.includes(name)) {
                        error = "Chat Name Already Exists";
                        $('#nameCheck').html(error);
                        return false;
                    }
                    else if ($('#nameCheck').html() == "Chat Name Required") {
                        $('#nameCheck').html("Chat Name Required");
                        return false;
                    }
                    else {
                        $('#nameCheck').html("");
                    }
                }).fail(function () {
                    alert("Failed contacting Tabs.json...");
                });
            }, 1);

            $('#reg').click(function () {
                if ($('#nameCheck').html() == error) {
                    return false;
                }
                else if ($('#nameCheck').html() == "") {
                    $('#nameCheck').html("Chat Name Required");
                }
                document.scrollingElement.scrollTop = 80;
            });
        });
    </script>
</body>
</html>