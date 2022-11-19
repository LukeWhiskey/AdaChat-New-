<?php
    session_start();
    if($_SESSION['user']['user'] == Null or $_SESSION['user']['id'] == Null) {
        unset($_SESSION['user']);
        header("Location: Home.php");
    }
    if (!isset($_SESSION['user'])) {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .wel {
            text-shadow: 0px 0px 10px blue;
            font-size: 10vw;
            letter-spacing: 1vw;
            padding-left: 15px;
            color: rgb(255, 0, 255);
        }
        @media screen and (max-width: 767.5px) {
            .wel {
                margin-top: 50%;
                margin-bottom: 50%;
                font-size: 10vw;
                letter-spacing: 2.5vw;
            }
        }
    </style>
</head>
<body id="body" style="margin-top: 0.1%;">
    <cont>
        <div class="headCont">
            <div class="bar">
                <?php
                    if (isset($_SESSION['user'])) {
                        echo '<a class="tabalign" href="signout.php">Signout</a>';
                        echo '<a class="tabalign" href="home.php">Home</a>';
                        echo '<a class="tabalign" href="CreateNewChat.php">New Chat</a>';
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
        <div class="tabcont" id="body2">
            <h1 class="wel">
                <?php
                    echo $_SESSION['user']['user'];
                ?>
            </h1>
        </div>
        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" id="footer" style="background-color: rgba(0, 0, 50, 0.5);">
                ? 2022 Copyright: <a class="text-dark" href="">Copyright Notice</a>
            </div>
            <!-- Copyright -->
        </footer>
    </cont>
    <script src="AdaChat.js"></script>
</body>
</html>