<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

<?php
$error = "";
$usuarios = [
  [
    'Usuario' => 'Jorge',
    'Password' => '123456'
  ],
  [
    'Usuario' => 'Admin',
    'Password' => 'root'
  ]
  ];
if($_SERVER['REQUEST_METHOD'] === "POST"){
  $name = $_POST['name'];
  $password = $_POST['password'];
  $auth = false;
  $user = false;
  $pass= "";

  foreach($usuarios as $usuario){
    if($usuario['Usuario'] === $name && $usuario['Password'] === $password){
      $auth = true;
    }
  }
  if($auth){ 
    header("location: autorizado.php");
  }else{
    foreach($usuarios as $usuario){
    if($usuario['Usuario'] === $name ){
      $user = true;
      $pass = $usuario['Password'];
    }
  }
  }

  if ($user === false){
    $error = "El usuario no existe";
  }
  if($user){
      if($password != $pass){
        $error = 'La contraseña es incorrecta';
      }
  }
}
?>

    <div class="contenedor">
    <h1>Iniciar sesion</h1>
    </div>
<div id='wrapper'>
  <form action='/' class='form' method="POST">
    <p class='field required half'>
      <label class='label required' for='name'>Usuario:</label>
      <input class='text-input' id='name' name='name' required type='text'>
    </p>
    <p class='field required half'>
      <label class='label' for='password'>Password:</label>
      <input class='text-input' id='password' name='password' required type='password'>
    </p>
    <p class='field'>
      <input class='button' type='submit' value='Iniciar Sesion'>
    </p>
  </form>
</div>

<div class="contenedor alerta">
      <p><?php if($error != ""){echo $error;} ?></p>
</div>

<script src="js.js"></script>
</body>
</html>