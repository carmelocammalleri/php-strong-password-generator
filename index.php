<?php
$min= 8;
$max= 32;
$message= "Seleziona un numero di caratteri da $min a $max";


$lngPassword = $_POST['lngPassword'];
var_dump($lngPassword);



require_once __DIR__ . '/partials/head.php';
?>


<body>

  <div class="container">
    <h1>Generatore password casuali</h1>
    <p><?php echo $message ?></p>

    <form action="index.php" method="POST">
      <input type="number" name="lngPassword" min="<?php echo $min ?>" max="<?php echo $max ?>">
    </form>

    <div>
      <h4>Password Generata</h4>
      <p>seleziona i caratteri</p>
    </div>
  </div>
  
</body>
</html>