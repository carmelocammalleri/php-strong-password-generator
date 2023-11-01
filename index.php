<?php
$min= 8;
$max= 32;
$message= "Seleziona un numero di caratteri da $min a $max";

//si controlla se passa anche una stringa vuota
if(isset($_POST['lngPassword']) && !empty($_POST['lngPassword'])){
  
  $passlen = $_POST['lngPassword'];

  //si può ovviare il controllo inserendo un min ed un max nel tag input number
  if($passlen < $min || $passlen > $max){
    $message = "!!!! Il numero inserito deve essere compreso fra $min e $max !!!!";

  }else{
    $message = "il numero scelto è $passlen";
    
    session_start();
    
    function passwordGenerator(){
      var_dump('manda la funzione');
      
    }
    
    $_SESSION['randomPassword'] = passwordGenerator();
  }
}

require_once __DIR__ . '/partials/head.php';
?>


<body>

  <div class="container">
    <h1>Generatore password casuali</h1>
    <p><?php echo $message ?></p>

    <form action="index.php" method="POST">
      <input type="number" name="lngPassword" >
    </form>

    <div>
      <h4>Password Generata</h4>
      <p></p>
    </div>
  </div>
  
</body>
</html>