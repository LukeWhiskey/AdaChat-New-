<?php 
    session_start(); 
    if($_SESSION['user']['user'] == Null or $_SESSION['user']['id'] == Null) {
        unset($_SESSION['user']);
    }
    if(!isset($_SESSION['user'])) {
        if(!isset($_SESSION['anonym'])) {
            $id = uniqid(rand(), true);
	        $_SESSION['anonym'] = array(
		        'id' => $id
	        );
        }
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
</head>
<body id="body">
    <cont>
        <div class="headCont">
            <div class="bar">
                <?php
                    if (isset($_SESSION['user'])) {
                        echo '<a class="tabalign" href="signout.php">Signout</a>';
                        echo '<a class="tabalign" href="GenericUser.php">Account</a>';
                        echo '<a class="tabalign" href="CreateNewChat.php">New Chat</a>';
                    }
                    else {
                        echo '<a class="tabalign" href="login.php">Login</a>';
                        echo '<a class="tabalign" href="signup.php">Signup</a>';
                        echo '<a class="tabalign" href="CreateNewChat.php">New Chat</a>';
                    }
                ?>
            </div>
            <h1 class="header" id="AdaH"></h1>
            <p class="subHead" id="AdaS"></p>
        </div>
        <div class="tabcont" id="body2"></div>
        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" id="footer" style="background-color: rgba(0, 0, 50, 0.5);">
                ? 2022 Copyright: <a class="text-dark" href="">Copyright Notice</a>
            </div>
            <!-- Copyright -->
        </footer>
    </cont>
    <script src="AdaChat.js"></script>
    <script>
        $(document).ready(function () {
            alert(<?php echo $_SESSION['user']['id']; ?>);
            $.getJSON('Tabs.json', function (tabData) {
                jsonName = tabData.Chats;
                jsonKeys = Object.keys (jsonName);
                $.each(jsonKeys, function (k, v) {
                    stringifiedKey = JSON.stringify(jsonName[v].chatName);
                    tabName = JSON.parse(stringifiedKey);
                    $('.tabcont').append('<a href="GenericTab.php?chat=' + tabName + '"><div class="col-sm-4"><div class="tab" id=' + tabName + ' ">' + tabName + '</div></div></a>');               
                });
            }).fail(function () {
                alert("failed contacting json directory...");
            }); 
        });
    </script>
</body>
</html>