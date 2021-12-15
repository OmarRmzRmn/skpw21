<?php

include("bd_login.php");


$conn = connect();

if (!empty($_POST['EMAIL']) && !empty($_POST['CONTRASEÑA'])) {
  $sql = "SELECT ID, EMAIL, CONTRASEÑA FROM inscripcion WHERE EMAIL = :EMAIL";
  $records = $conn->prepare($sql);
  $records->bindParam(':EMAIL', $_POST['EMAIL']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  

  if(!$results){
    $message = 'El correo que dio no es valido';
  }else{
    if (count($results) > 0 && password_verify($_POST['CONTRASEÑA'], $results['CONTRASEÑA'])) {
      $_SESSION['user_id'] = $results['ID'];
      header('Location:index.php');
    } else {
      $message = 'La contraseña es.....incorrecta';}} 
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </head>
  <body>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1 ><a class="btn " >Login</a>  <a class="btn btn-primary" href="sing_usuario.php">Sing up</a> </h1>

    <form method="POST" name="formLogin" onSubmit="return validar()" action="log_usuario.php" align="center">
      <input name="EMAIL" type="text" placeholder="example@correo.com"> <br>
      <input name="CONTRASEÑA" type="password" placeholder="Contraseña"> <br>
      <input type="submit" value="Submit">
    </form>

    <script> 
      function validar(){
        if((document.formLogin.EMAIL.value.length == 0) || (document.formLogin.CONTRASEÑA.value.length == 0)){
          alert('Error, Falta llenar');
          return false;}
        
        var ercorreo=/^[^@\s]+@[^@\s]+\.[^@\s]+$/;

        if(!(ercorreo.test(document.formLogin.EMAIL.value))){
          alert('Error, Correo no autorizado.');
          return false;}

        return true;}
    </script>
  </body>
</html>