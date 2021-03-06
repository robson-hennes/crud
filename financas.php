<?php
require __DIR__ . './vendor/autoload.php';

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
if (!empty($_GET['message']) && $_GET['message'] == 'success') {?>
                <div class="alert alert-danger" role="alert">
                    Usuário ID:<?php echo $_GET['id']; ?> Deletado!
                </div>
        <?php }?>

      <h2>Finanças</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Transação</th>
              <th>Valor</th>
              <th>Tipo</th>
              <th>Data</th>
              <th>Editar</th>
              <th>Deletar</th>
            </tr>
          </thead>
          <tbody>
            <?php
                    try {
                        $total = 0;
                        $gastos = 0;
                        $ganhos = 0;
                        $pdo = new PDO("mysql:dbname=crud;host=localhost", "root", "");
                        $sql = "SELECT * FROM financas";
                        $sql = $pdo->query($sql);

                        if ($sql->rowCount() > 0) {

                            foreach ($sql->fetchAll() as $trans) {
                                $data = new DateTime($trans['data']);
                                $trans['tipo'] == 'gasto' ? $tipo = 'danger' : $tipo = 'success';                                
                                 if ($trans['tipo'] == 'gasto') {
                                     $gastos = $gastos + $trans['valor'];
                                 } else {
                                    $ganhos = $ganhos + $trans['valor'];
                                 }
                                echo '<tr>';
                                echo '<td>' . $trans['id'] . '</td>';
                                echo '<td>' . utf8_encode($trans['titulo']) . '</td>';
                                echo '<td>R$ ' . number_format($trans['valor'], 2, ',', '.') . '</td>';
                                echo '<td><span class="fin-badger badge badge-' . $tipo . '">' . ucfirst($trans['tipo']) . '</span></td>';
                                echo '<td>' . $data->format('d/m/Y') . '</td>';
                                echo '<td><a class="btn btn-primary btn-sm" href="editar.php?id=' . $trans['id'] . '" role="button">Editar</a></td>';
                                echo '<td><a class="btn btn-danger btn-sm" href="deletar.php?id=' . $trans['id'] . '" role="button">Deletar</a></td></td>';
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
            <div style="text-align:right; margin-top: 50px;" class="container">
                <div class="row">
                        <div class="col">
                            <div class="border-success card" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title">Ganhos</h5>
                                    <h6 class="card-subtitle mb-2 "><?php echo 'R$ '.number_format($ganhos, 2, ',', '.'); ?></h6>               
                                </div>
                            </div> 
                        </div>
                        <div class="col">
                            <div class="border-danger card" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title">Gastos</h5>
                                    <h6 class="card-subtitle mb-2 "><?php echo 'R$ '.number_format($gastos, 2, ',', '.'); ?></h6>               
                                </div>
                            </div> 
                        </div>
                        <div class="col">
                            <div class="border-secondary card" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title">Resto</h5>
                                        
                                    <h6 class="card-subtitle mb-2 "><?php $total = $ganhos - $gastos;  echo 'R$ '.number_format($total, 2, ',', '.'); ?></h6>               
                                </div>
                            </div> 
                        </div>
                </div>
            </div>
      </div>
    </main>

<?php

include_once 'src/Templates/footer.php';

?>
