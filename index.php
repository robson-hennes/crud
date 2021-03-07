<?php
require __DIR__.'./vendor/autoload.php';

use App\Classes\Dollar;

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
      
      <h2>Dashboard</h2>
      <div class="row">
      <div class="col">
          <div class="border-secondary card" style="width: 31%;">
              <div class="card-body">
                  <img style="width:100px;" src="public/icons/svg/015-money currency.svg" class="card-img-top" alt="...">
                  <h5 class="card-title">Valor do Dólar hoje:</h5>                      
                  <h6 class="card-subtitle mb-2 "><?php $dollar = new Dollar(); echo $dollar->getDollar(); ?></h6>   
                              
              </div>
          </div> 
        </div>
      </div>  
     <br>
       <!-- <div class="row">
              <div class="col">
                <div class="card">
                <img style="width:100px;" src="public/icons/svg/032-hierarchical structure.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Contatos</h5>
                    <p class="card-text">Veja todos os seus contatos cadastrados!</p>
                    <a href="/contatos.php" class="btn btn-primary">Ver</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                <img src="..." class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                <img src="..." class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
        </div> -->
     
  
    </main>

<?php

include_once 'src/Templates/footer.php';


?>
