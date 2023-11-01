<?php
$min= 8;
$max= 32;
$message= "Seleziona un numero di caratteri da $min a $max";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generatore Password</title>
</head>
<body>

  <div class="container">
    <h1>Generatore password casuali</h1>
    <p><?php echo $message ?></p>

    <form action="index.php" method="POST">
      <input type="number" min="<?php echo $min ?>" max="<?php echo $max ?>">
      <input type="button" value="submit">
    </form>

    <div>
      <h4>Password Generata</h4>
      <p>seleziona i caratteri</p>
    </div>
  </div>
  
</body>
</html>