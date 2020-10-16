<?php
$dsn = 'mysql:host=localhost;dbname=crudpdo';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$dbh = new PDO($dsn, $username, $password, $options);

$sth = $dbh->prepare("INSERT INTO pessoa(atividades) VALUES (:atividade)");
$sth->execute(array(
    ':atividade' => $_POST["atividade"]
  ));
  $rowCount = $sth->rowCount();
  echo $rowCount;
?>