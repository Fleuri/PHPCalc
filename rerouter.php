
<?php
function showView($site, $data = array()) {
    $data = (object)$data;
    header("Location: index.php", true, 302);        
    exit();
}
?>

