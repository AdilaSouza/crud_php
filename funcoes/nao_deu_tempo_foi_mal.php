<?php

class Atividades{
    private $pdo;
    public function __construct($dbname, $host, $user, $senha)
    {
        try {
            $this->pdo = new PDO("mysql: dbname".$dbname.
            ";host" .$host,$user,$senha);     
           } 
           catch (PDOException $e) {
               echo "Erro com banco de dados: ".$e->getMessage();
               exit();
             }
             catch (Exception $e) {
                echo "Erro generico: ".$e->getMessage();
                exit();
             } 
       
    }

    public function buscarDados(){
       $cmd = $this->pdo->prepare("SELECT * FROM tarefa ORDER BY id "); 
    }

    
}









?>