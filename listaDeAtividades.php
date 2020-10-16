<?php
  if(empty($_SESSION)){
      session_start();  
      if(!empty($_SESSION["mensagem"])){
          echo $_SESSION["mensagem"];
          $_SESSION["mensagem"] = null;
      }
    }?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="funcoes.js"></script>
        <meta charset="UTF-8">
        <title>Lista de Atividades</title>
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body>
    <section id="Formulario">
      <form action="#">
      <div class="form-group">
        <label for="atividade">Escreva sua Atividade</label>
        <textarea class="form-control" id="atividade" name="atividade" rows="3"></textarea>
    </div>
    <a id="btnSalvar" class="btn btn-primary mb-2">adicionar atividade</a>

      </form>
    </section>

    <section id= "Lista">
    <table>
      <tr> 

      <ul class="list-group">
      <li class="list-group-item disabled"> SUAS ATIVIDADES</li>
      <?php
$dsn = 'mysql:host=localhost;dbname=crudpdo';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$dbh = new PDO($dsn, $username, $password, $options);

$sth = $dbh->prepare("SELECT * FROM pessoa");
$sth->execute();
  $pessoas = $sth->fetchAll();
  foreach($pessoas as $pessoa){
      echo'<li class="list-group-item">'.$pessoa["atividades"] .'<span class= <td> <a href="javascript:deletar('.$pessoa["id"].')"> Editar </a><a href=""> Excluir</a></td> </span> </li>';
  }
?>
  
  

</ul>
      </tr>
    </table>

    </section>
        
    </body>
    </html>