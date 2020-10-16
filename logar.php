<?php
$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$dbh = new PDO($dsn, $username, $password, $options);
$sth = $dbh->prepare("SELECT * FROM user where email like :email");
$sth->execute(array(
    ':email' => $_POST["email"]
  ));
  $result = $sth->fetchAll();
  
  if(empty($_SESSION)){
    session_start();
  }

  if(empty($result)){
    $_SESSION["mensagem"] = "Usuário ou Senha Errado!";
    header("location: login.php");    
  }else{
    $_SESSION["mensagem"] = "Usuário Logado Com Sucesso";
    header("location: listaDeAtividades.php");
  }

?>