<?php
$dsn = 'mysql:host=localhost;dbname=crud';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$dbh = new PDO($dsn, $username, $password, $options);

$sth = $dbh->prepare("INSERT INTO tarefas (descricao,user_id) VALUES (:descricao , :user_id)");
$sth->execute(array(
    ':descricao' => $_POST["descricao"],
    ':user_id' => $_POST["user_id"]
  ));
print_r($sth);
print_r($_POST);
$rowCount = $sth->rowCount();

if(!empty($rowCount)){
  echo "Tarefa inserida com sucesso!";
}else{
  echo "Ocorreu um erro ao salvar a tarefa, tente novamente mais tarde!";
}
