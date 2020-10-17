<?php
  if(empty($_SESSION)){
    session_start();   
  }
  if(!empty($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
    echo '<input name="user_id" hidden="hidden" id="user_id" type="text" value='.$_SESSION["user_id"].'>';
  }
  else if(!empty($_SESSION["mensagem"])){
    echo $_SESSION["mensagem"];
    $_SESSION["mensagem"] = null;
  }
?>
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
                    //listando atividades do banco
                    $dsn = 'mysql:host=localhost;dbname=crud';
                    $username = 'root';
                    $password = '';
                    $options = array(
                      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    ); 

                    $dbh = new PDO($dsn, $username, $password, $options);

                    $sth = $dbh->prepare("SELECT * FROM tarefas where user_id = :user_id");
                    $sth->execute(array(
                      ':user_id' => $user_id
                    ));
                    $tarefas = $sth->fetchAll();
                    foreach($tarefas as $tarefa){
                      echo'<li class="list-group-item">'.$tarefa["descricao"] .'<span class= <td> <a href="javascript:deletar('.$tarefa["id"].')">
                        Excluir 
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/></svg>
                      </a></td> </span> </li>';
                    }
                  ?>
              </ul>
            </tr>
        </table>
      </section>
  </body>
</html>
