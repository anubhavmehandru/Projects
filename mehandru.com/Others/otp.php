<?php
  if (isset($_POST['refresh'])) {
    random();
  }
  function random() {
    
        $x = 5;
        $min = pow(10,$x);
        $max = pow(10,$x+1)-1;
        $value = rand($min,$max);
        echo $value. " ";
        echo $min. " ";
        echo $max. " ";
    
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
      <input type="submit" name="refresh" value="refresh">
    </form>
</body>
</html>
