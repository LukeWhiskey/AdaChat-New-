$(document).ready(function () {
    var loc = window.location.pathname;
    var lastIndex = loc.substring(loc.lastIndexOf('/') + 1);
    var dir = lastIndex.replace(".html", "");
    let jsonFile = dir + ".json";
    let phpFile = dir + ".php";
    $('#chatName').html(dir);
    $.getJSON(jsonFile, function (chatData) {
        jsonKeys = Object.keys(chatData);
        $.each(jsonKeys, function (k, v) {
            stringifiedKey = JSON.stringify(chatData[v]);
            parsedKey = JSON.parse(stringifiedKey).msg;
            $('#chatBox').append('<div id =' + v + '>' + parsedKey + '</div>')
        });
        loadedJsonKeys = jsonKeys;
    }).fail(function () {
        alert("failed contacting json directory...");
    });

    let arrayNum = [];
    let arrayStr = [];
    setInterval(function () {
        $.getJSON(jsonFile, function (chatData) {
            jsonKeys = Object.keys(chatData);
        });
        string = JSON.stringify(jsonKeys);
        loadedString = JSON.stringify(loadedJsonKeys);
        if (string != loadedString) {
            $.getJSON(jsonFile, function (chatData) {
                jsonKeys = Object.keys(chatData);
                $.each(jsonKeys, function (k, v) {
                    stringifiedKey = JSON.stringify(chatData[v]);
                    parsedKey = JSON.parse(stringifiedKey).msg;
                    checkedKey = $('#' + v).html();
                    if (parsedKey != checkedKey) {
                        arrayNum.push(v);
                        arrayStr.push(parsedKey);
                    }
                });
                $.each(arrayNum, function (k, v) {
                    if ($('#' + arrayNum[k]).length) {
                        $('#' + arrayNum[k]).html(arrayStr[k]);
                    }
                    else {
                        $('#chatBox').append("<div id =" + arrayNum[k] + ">" + arrayStr[k] + "</div>");
                    }
                });
                arrayNum = [];
                arrayStr = [];
                loadedJsonKeys = jsonKeys;
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
        $.ajax({
            url: phpFile,
            method: 'POST',
            data: { msg: msg },
            success: function () {
            },
            error: function (xhr, status, error) {
                alert("Failed sending message to php directory...");
            }
        });
    });
});