<?php
require __DIR__.'./vendor/autoload.php';

if (!empty($_GET['id'])) {
    try {
        $id = $_GET['id']; 
        $pdo = new PDO("mysql:dbname=crud;host=localhost", "root", ""); 
        $confirm = "SELECT * FROM contatos WHERE id='$id'";
        $confirm =  $pdo->query($confirm); 

        if ($confirm->rowCount() > 0) {
            $sql = "DELETE FROM contatos WHERE id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
           
            header("Location: http://crud.test/contatos.php?id=$id&message=success");
        }
        
        
      
            
    } catch (PDOExcepetion $e) {
        echo $e->getMessage();
    }
}

?>