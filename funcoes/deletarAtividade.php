<?php
$dsn = 'mysql:host=localhost;dbname=crud';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$dbh = new PDO($dsn, $username, $password, $options);

$sth = $dbh->prepare("DELETE FROM `tarefas` WHERE `tarefas`.`id` = :id");
$sth->execute(array(
    ':id' => $_POST["id"]
  ));
print_r($sth);
print_r($_POST);
$rowCount = $sth->rowCount();

if(!empty($rowCount)){
  echo "Tarefa deletada com sucesso!";
}else{
  echo "Ocorreu um erro ao deletar a tarefa, tente novamente mais tarde!";
}
