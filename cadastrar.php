<?php
require __DIR__.'./vendor/autoload.php';

if (!empty($_POST)) {
    try {
        $pdo = new PDO("mysql:dbname=crud;host=localhost", "root", "");
    
        $nome = $_POST['nome'];
        $email = $_POST['email'];
    
        $sql = "INSERT INTO contatos SET nome = '$nome', email = '$email'";
        $sql =  $pdo->query($sql); 
        
        header("Location: http://crud.test/contatos.php");
            
    } catch (PDOExcepetion $e) {
        echo $e->getMessage();
    }
}

include_once 'src/Templates/header.php';
include_once 'src/Templates/topbar.php';
include_once 'src/Templates/sidebar.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Painel de Administração </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <h2 class="title">Cadastrar Contato</h2>

      <form method="POST" action="/cadastrar.php">
        <div class="form-group">
         <!--  <label for="exampleInputEmail1">Nome Completo</label> -->
          <input name="nome" type="text" class="form-control" id="textNome" aria-describedby="nomeHelp" placeholder="Insira o nome do contato" required>
          <small id="nomeHelp" class="form-text text-muted">Insira o nome.</small>
        </div>
        <div class="form-group">
          <!-- <label for="exampleInputEmail1">E-mail</label> -->
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Insira o e-mail do contato" required>
          <small id="emailHelp" class="form-text text-muted">Não nunca compartilhamos seus dados.</small>
        </div>
    
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>

    </main>
<?php

include_once 'src/Templates/footer.php';


?>



