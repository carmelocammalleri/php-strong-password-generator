<?php
$min= 8;
$max= 32;
$message= "Seleziona un numero di caratteri da $min a $max";
$text= "In generazione";
$password= "";

//si controlla se passa anche una stringa vuota
if(isset($_POST['lngPassword']) && !empty($_POST['lngPassword'])){
  
  $passlen = $_POST['lngPassword'];

  //si può ovviare il controllo inserendo un min ed un max nel tag input number
  if($passlen < $min || $passlen > $max){
    $message = "!!!! Il numero inserito deve essere compreso fra $min e $max !!!!";

  } else{
    $message = "La tua password ha $passlen caratteri";
    
    session_start();
    
    //length è in pratica la lunghezza che prendiamo nel valore passlen che viene letto dall'input
    function passwordGenerator($length){
      //var_dump('manda la funzione');

      $password = '';
      $indexChars = 0;
      $listChars = [
          'abcdefghijklmnopqrstuvwxyz',
          'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
          '0123456789',
          '!?&%$<>^+-*/()[]{}@#_='
      ];
      
      //ciclo il randomizzatore
      while(strlen($password) < $length){
        $listChar = $listChars[$indexChars];
        //randomizzo gli elementi
        $char = $listChar[rand(0, strlen($listChar) -1)];
        //concateno la password con gli elementi randomizzati
        $password .= $char;
        //aumento il contatore
        $indexChars++;
        //resetto il contatore se sale troppo
        if($indexChars === count($listChars)) $indexChars = 0;
      }

      return str_shuffle($password);
    }
    
    //parte la funzione
    $_SESSION['randomPassword'] = passwordGenerator($passlen);

    if($_SESSION['randomPassword']){
      $password = $_SESSION['randomPassword'];
      $text= "";
    }else {
      //non ho capito perchè
      header('Location: ./index.php');
    }
  }
}

require_once __DIR__ . '/partials/head.php';
?>


<body>

  <div class="container">
    <h1>Generatore password casuali</h1>
    <form action="index.php" method="POST">
      <input type="number" name="lngPassword" >
    </form>
    <p><?php echo $message ?></p>

    <div>
      <h4>Password Generata</h4>
      <p><?php echo $password ?></p>
      <p><?php echo $text ?></p>
    </div>
  </div>
  
</body>
</html>