<?php
if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION['history'])) {
        $_SESSION['history'] = array();
    }
}
require_once 'logic.php';
header("Content-type: text/html\n\n");
?>

<!DOCTYPE HTML>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <title>Calculator</title>
    </head>
    <body>
        <h1>
            Calculator!
        </h1>
        <form method="GET" name="form">
            <input type="text" id="arg1">
            <input type="button" id="go" value="Submit"></input>
        </form>
        <p id="test2"><p>
        <p id="test"><p>
            <script>
                $("#go").click(function () {
                    $("#test").text($("#arg1").val());
                    var exp = $("#test").text();
                    $('#test').empty();
                    exp = exp.match(/[^\d()]+|[\d.]+/g);
                    exp.reverse();
                    var stack = [];
                    exp.forEach(function (entry) {
                        stack.push(entry);
                    });
                    while (stack.length > 1) {
                        console.log(stack);
                        var arg1 = stack.pop(); var op = stack.pop(); var arg2 = stack.pop();
                        $.ajax({
                            type: "GET",
                            async: false,
                            url: 'logic.php',
                            data: {arg1: arg1,
                                op: op,
                                arg2: arg2
                            },
                            complete: function (response) {
                                stack.push(response.responseText);
                                $('#test').html(response.responseText);
                                $('#history').append("" + arg1 + " " + op + " " + arg2 + "=" +  response.responseText + "<br>");
                            },
                            error: function () {
                                $('#test').html('Bummer: there was an error!');
                            }
                        });
                    }
                });
            </script>



        <h2>Equation history</h2>
        <p id="history"></p>

    </body>
</html>