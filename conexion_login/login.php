<html>
  <body> 
<?php
  include("bd_login.php");
  $conn = connect();

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT ID, EMAIL, CONTRASEÑA FROM inscripcion WHERE ID = :ID');
    $records->bindParam(':ID', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }}?>


    <?php if(!empty($user)): ?>
      <div align=right> Bienvenido <?php $user['EMAIL']; ?>
      <a href="exit.php">Salir</a>
    <?php else: 
        require 'cabecera.php';
    endif; ?>
  </body>
</html>