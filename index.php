<?php

if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION['history'])) {
        $_SESSION['history']= array();
    }
}
header("Content-type: text/html\n\n");
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Calculator</title>
    </head>
    <body>
        <h1>

<?php echo isset($_SESSION); ?>

        </h1>
        <form method="GET" name="form">
            <input type="text" name="arg1">
            <select name="op">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <input type="text" name="arg2">
            <input type="submit" name="go" value="SUBMIT"></input>
        </form>

        <?php
        if (isset($_GET["go"])) {
            require_once 'logic.php';
        }
        ?>

        <h2>Equation history</h2>
        <p>
            <?php
           
            $arr = $_SESSION['history'];
            foreach ($arr as $value) {
              echo $value;
              echo "<br>";
            }
            ?>
        </p>

    </body>
</html>