<?php
$dsn = 'mysql:host=localhost;dbname=crud';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

try {
  $dbh = new PDO($dsn, $username, $password, $options);
  $sth = $dbh->prepare("SELECT * FROM usuarios where login like :email AND senha like :senha ");
  $sth->execute(array(
      ':email' => $_POST["email"],
      ':senha' => $_POST["senha"]
  ));

  $result = $sth->fetchAll();
  $user_id = $result[0]['id'];

  if(empty($_SESSION)){
    session_start();
  }

  if(empty($result)){
    $_SESSION["mensagem"] = "Usuário ou Senha Errado!";
    header("location: ../index.php");    
  }else{
    $_SESSION["mensagem"] = "Usuário Logado Com Sucesso";
    $_SESSION["user_id"] = $user_id;
    header("location: ../lista.php");
  }
  
} catch (\Throwable $th) {
  print_r($th);
}




?>