<?php


header("Content-type: text/html\n\n");
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Calculator</title>
    </head>
    <body>
        <h1>



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
            
                <?php
            if (isset($_GET['history'])) {
                $history[] = $_GET['history'];
            } else {
                $history[] = array();
            }
            
            foreach ($history as $value) {
            ?>
            <input type="hidden" name="history[]" value="<?php echo $value?>">
            <?php
            }
            ?>
            <input type="submit" name="go" value="SUBMIT"></input>
        </form>

        <?php
        if (isset($_GET["go"])) {
            require_once 'logic.php';
             
            }
        ?>

        <h2>Equation history</h2>
        <textarea name="History" rows=20 cols="50">
            <?php
            foreach ($history as $value) {
                echo $value;
            }
            ?>
        </textarea>

    </body>
</html>