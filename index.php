<?php
if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION['history'])) {
        $_SESSION['history'] = array();
    }
}
require_once 'logic.php';
require 'sin.php';
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
        <p>Basic operands +,-,*,/ are supported. <br>
            Equations in the form 'number-operand-number+operand-number....' <br>
            No actual calculation order is supported ergo the operations are count from left to right. <br>
            No error checking for the input. You are on you own.</p>
        <form method="GET" name="form">
            <input type="text" id="arg1">
            <input type="button" id="go" value="Submit"></input>
        </form>
        <input type="button" id="sin" value="sin(x) (Serverside)"/>
        <input type="button" id="sinloc" value="sin(x) (Clientside)"/><br>
        <input type="button" id="sinmixed" value="sin(x) (Mixed)"/><br>
        <img src="" id="img">
        <canvas id="myCanvas" width="360" height="360" style="border:1px solid #d3d3d3;" hidden="true"></canvas>
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
                        var arg1 = stack.pop();
                        var op = stack.pop();
                        var arg2 = stack.pop();
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
                                $('#history').append("" + arg1 + " " + op + " " + arg2 + "=" + response.responseText + "<br>");
                            },
                            error: function () {
                                $('#test').html('Bummer: there was an error!');
                            }
                        });
                    }
                });
            </script>

            <script>
                $("#sin").click(function () {
                    $.ajax({
                        type: "GET",
                        async: false,
                        url: 'sin.php',
                        data: {sin: 'set'},
                        complete: function (response) {
                            $("#img").attr("src", "output.png");
                        },
                        error: function () {
                            $('#test').html('Bummer: there was an error!');
                        }

                    })
                });
            </script>

            <script>
                $("#sinmixed").click(function () {
                    $("#myCanvas").attr('hidden', false);
                    var canvas = document.getElementById("myCanvas");
                    var ctx = canvas.getContext("2d");
                    ctx.moveTo(0, 180);
                    ctx.lineTo(360, 180);
                    ctx.moveTo(180, 0);
                    ctx.lineTo(180, 360);
                    ctx.stroke();

                    var x = 0, y = 180;
                    var mover = -Math.PI;
                    while (mover <= Math.PI) {
                        ctx.moveTo(x, y);
                        y = 180 - Math.sin(mover) * 120;
                        x += 5.7;
                        ctx.lineTo(x, y);
                        ctx.stroke();
                        mover += 0.1;
                    }
                    ;
                });
            </script>

            <script>
                $("#sinmixed").click(function () {
                    $("#myCanvas").attr('hidden', false);
                    var canvas = document.getElementById("myCanvas");
                    var ctx = canvas.getContext("2d");
                    ctx.moveTo(0, 180);
                    ctx.lineTo(360, 180);
                    ctx.moveTo(180, 0);
                    ctx.lineTo(180, 360);
                    ctx.stroke();

                    var x = 0, y = 180;
                    var mover = -Math.PI;
                    while (mover <= Math.PI) {
                        ctx.moveTo(x, y);
                        y = 180 - Math.sin(mover) * 120;
                        x += 5.7;
                        ctx.lineTo(x, y);
                        ctx.stroke();
                        mover += 0.1;
                    }
                    ;
                });
            </script>


        <h2>Equation history</h2>
        <p id="history"></p>

    </body>
</html>