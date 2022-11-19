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
    $chat = $_GET['chat'];
    if (!isset($chat)) {
        header("Location: home.php");
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4bootstrap.min.js"></script>
    <style>
        @media screen and (min-width: 1000px) {
            .tabalign {
                padding-right: 25px;
            }
        }
        <?php 
            if (isset($_SESSION['user'])) {
                echo '.tabalign { width: 25%; } .bar { width: 22.75% }';
            }
            else {
                echo '.tabalign { width: 33.3333%; } .bar { width: 15% }';
            }
        ?>
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
        <div class="textCont" style="padding-bottom: 87px;">
            <div class="banner">
                <h2 class="title" id="chatName"></h2>
                <div class="chatCont">
                    <div class="chatBack">
                        <div id="chatBox"></div>
                    </div>
                    <form>
                        <input type="text" id="chat" class="form-control" />
                        <input type="button" id="sendChat" class="form-control2" />
                    </form>
                </div>
            </div>
        </div>
        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" id="footer">
                © 2022 Copyright: <a class="text-dark" href="">Copyright Notice</a>
            </div>
            <!-- Copyright -->
        </footer>
    </cont>
    <script src="AdaChat.js"></script>
    <script>
        $(document).ready(function () {
            <?php 
                $chat = $_GET['chat'];
                echo "var Name = '$chat';";
            ?>
            <?php
                $getUser = $_SESSION['user'];
                if(isset($getUser)) {
                    echo "var chatN = '$getUser';";
                }
                else {
                    $postAnonym = "Anonymous". $_SESSION['anonym'][id];
                    echo "var chatN = '$postAnonym';";
                }
            ?>
            $('#chatName').html(Name);
            let jsonFile = "Tabs.json";
            let phpFile = "GenericTabS.php?chat=" + Name;

            $.getJSON(jsonFile, function (chatName) {
                jsonKeys = Object.keys (chatName);
                $.each(jsonKeys, function (k, v) {
                    jsonChat = chatName[v];
                    $.each(jsonChat, function (k, v) {
                        if (Name == jsonChat[k].chatName) {
                            keys = jsonChat[k].msgs;
                            $.each(keys, function (k, v) {
                                stringifiedKey = JSON.stringify(keys[k]);
                                parsedKey = JSON.parse(stringifiedKey);
                                $('#chatBox').append('<div id =' + k + '>' + parsedKey.user + ' |</br>' + parsedKey.msgCont + '</div>');
                            });
                            loadedJsonKeys = keys;
                        }
                    });
                });
            }).fail(function () {
                alert("failed contacting json directory...");
            });

            let arrayNum = [];
            let arrayUsr = [];
            let arrayStr = [];
            setInterval(function () {
                $.getJSON(jsonFile, function (chatName) {
                    jsonKeys = Object.keys (chatName);
                    $.each(jsonKeys, function (k, v) {
                        jsonChat = chatName[v];
                        $.each(jsonChat, function (k, v) {
                            if (Name == jsonChat[k].chatName) {
                                keys = jsonChat[k].msgs;
                            }
                        });
                    });
                });
                
                string = JSON.stringify(keys);
                loadedString = JSON.stringify(loadedJsonKeys);
                if (string != loadedString) {
                    $.getJSON(jsonFile, function (chatName) {
                        jsonKeys = Object.keys (chatName);
                        $.each(jsonKeys, function (k, v) {
                            jsonChat = chatName[v];
                            $.each(jsonChat, function (k, v) {
                                if (Name == jsonChat[k].chatName) {
                                    keys = jsonChat[k].msgs;
                                    $.each(keys, function (k, v) {
                                        stringifiedKey = JSON.stringify(keys[k]);
                                        parsedKeyMsg = JSON.parse(stringifiedKey).msgCont;
                                        parsedKeyUsr = JSON.parse(stringifiedKey).user;
                                        checkedKey = $('#' + k).html();
                                        if (parsedKey != checkedKey) {
                                            arrayNum.push(k);
                                            arrayStr.push(parsedKeyMsg);
                                            arrayUsr.push(parsedKeyUsr);
                                        }
                                    });
                                    $.each(arrayNum, function (k, v) {
                                        if ($('#' + arrayNum[k]).length) {
                                            $('#' + arrayNum[k]).html(arrayUsr[k] + ' |</br>' + arrayStr[k]);
                                        }
                                        else {
                                            $('#chatBox').append("<div id =" + arrayNum[k] + ">" + arrayUsr[k] + ' |</br>' + arrayStr[k] + "</div>");
                                        }
                                    });
                                    arrayNum = [];
                                    arrayUsr = [];
                                    arrayStr = [];
                                    loadedJsonKeys = string;
                                }
                            });
                        });
                    }).fail(function () {
                        alert("failed contacting json directory...");
                    });
                }
                else {
                    return false;
                }
            }, 100);
            
            $("#sendChat").click(function AJAXinputData() {
                var msg = $("#chat").val();
                if (msg == '') {
                    return false;
                }
                <?php
                    $getUser = $_SESSION['user'][user];
                    if(isset($getUser)) {
                        echo "var chatN = '$getUser';";
                    }
                    else {
                        $postAnonym = "Anonymous". $_SESSION['anonym'][id];
                        echo "var chatN = '$postAnonym';";
                    }
                    $chat = $_GET['chat'];
                    echo "var tab ='$chat';";
                ?>

                $.ajax({
                    url: phpFile,
                    method: 'POST',
                    data: {
                        user: chatN,
                        msg: msg
                    },
                    //catch success ajax callback that will append a placeholder message, that will be replaced by message when databse refreshes
                    error: function () {
                        alert("Failed sending message to php directory...");
                    }
                });
            });
        });
    </script>
</body>
</html>