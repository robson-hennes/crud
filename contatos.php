<?php
require __DIR__.'./vendor/autoload.php';

use App\Classes\Contato;

include_once 'src/Templates/header.php';
include_once 'src/Templates/topbar.php';
include_once 'src/Templates/sidebar.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Painel de Administração </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Compartilhar</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            Essa Semana
          </button>
        </div>
      </div>
        <?php 
            if (!empty($_GET['message']) && $_GET['message'] == 'success') { ?>
                <div class="alert alert-danger" role="alert">
                    Usuário ID:<?php echo $_GET['id']; ?> Deletado!
                </div>
        <?php } ?>
      
      <h2>Todos os contatos</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>E-mail</th>            
              <th>Editar</th>            
              <th>Deletar</th>            
            </tr>
          </thead>
          <tbody>           
            <?php try {
                $pdo = new PDO("mysql:dbname=crud;host=localhost", "root", "");
                $sql = "SELECT * FROM contatos";
                $sql =  $pdo->query($sql);

                if ($sql->rowCount() > 0) {
                    
                    foreach ($sql->fetchAll() as $contato) {
                        $objContato = new Contato($contato['id'],$contato['nome'], $contato['email']);                                                            
                        echo '<tr>';
                        echo '<td>'.$objContato->getId().'</td>';
                        echo '<td>'.$objContato->getNome().'</td>';
                        echo '<td>'.$objContato->getEmail().'</td>';
                        echo '<td><a class="btn btn-primary btn-sm" href="editar.php?id='.$objContato->getId().'" role="button">Editar</a></td>';
                        echo '<td><a class="btn btn-danger btn-sm" href="deletar.php?id='.$objContato->getId().'" role="button">Deletar</a></td></td>';
                        echo '</tr>';
                    }
                   
                } else {
                    echo "Não há dados para mostrar!";
                }
                
                    
            } catch (PDOExcepetion $e) {
                echo $e->getMessage();
            }

            ?>
          
          </tbody>
        </table>
  
    
      </div>
    </main>

<?php

include_once 'src/Templates/footer.php';


?>
