<?php 
  $tervehdys = "Input your equation here"; 
  header("Content-type: text/html\n\n");
?><!DOCTYPE HTML>
<html>
<head><title><?php echo $tervehdys; ?></title></head>
<body>
  <h1><?php echo $tervehdys; ?></h1>
  <form><input type="text" name="equation">
      <input type="submit">
  </form>
  <h2>Equation history</h2>
  <textarea name="History" rows=20 cols="50"></textarea>
  
</body>
</html>