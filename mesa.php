<?php
session_start();
if(!isset($_SESSION['REST-admin'])){
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<?php
error_reporting(0);
include("backEnd/FERRAMENTAS/AX.php");
include("backEnd/FERRAMENTAS/dbWrapper.php");
include("backEnd/FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$usuario = AX::attr($_SESSION["metadata"]["usuario"]);


$ID__MESA = $_GET["opt"];

$conta =  $db->select()->from("conta")->where(["usuario=$usuario","mesa='$ID__MESA'", "fechado=0"])->pegaResultado();

$ID__CONTA = $conta["identificador"];

$mesa =  $db->select()->from("mesa")->where(["usuario=$usuario","numeromesa='$ID__MESA'"])->pegaResultado();
$pedidos =  $db->select()->from("pedido")->where(["usuario=$usuario","conta='$ID__CONTA'", "aceite is null"])->pegaResultados();
$pedidosAceitos =  $db->select()->from("pedido")->where(["usuario=$usuario","conta='$ID__CONTA'", "aceite='1'"])->pegaResultados();
$totalConta =  $db->select(["SUM(total)"])->from("pedido")->where(["usuario=$usuario","conta='$ID__CONTA'", "aceite='1'"])->pegaResultado()["SUM(total)"];
$NOME_CLIENTE_CONTA_MESA =  $db->select(["nome"])->from("mesaocupada")->where(["usuario=$usuario","mesa='$ID__MESA'", "desocupou='0'"])->pegaResultado()["nome"];
//var_dump($mesa);
$todosPedidos;
foreach ($pedidos as $k => $v) {
  $itens = '';
  $totalItem = $v["total"];
  $iten = (array) json_decode($v["itens"]);
  $id = ($v["identificador"]);
  foreach ($iten as $item) {
    #global $itens;
    $item = (array) $item;
    $itemId = $id . "-" . $item["itemnum"];
    $itens .= '<div class="mb-3" id="' . $itemId . '">
      
      <div class="btn btn-light m-1 btn-sm position-relative" style="width:97.5%;cursor:initial;">' . $item["nome"] . '<img src="assets/svg/trash.svg" class="position-absolute" style="cursor:pointer;width:15px;right: 5px;top: 5px;" onclick="removerItem(\'' . $id . '\',\'' . $item["itemnum"] . '\')"></div>
          <div class="container">
            <div class="row">
                <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial" id="itempreco' . $item["itemnum"] . '">' . $item["preco"] . '</p>
                <input type="number" class="col-sm btn btn-light m-1 btn-sm" value="' . $item["qtd"] . '" placeholder="' . $item["qtd"] . '" min="1" onchange="alterarQtdItem(\'' . $id . '\',\'' . $item["itemnum"] . '\')" id="itemqtd' . $item["itemnum"] . '">
                <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial" id="itemtotal' . $item["itemnum"] . '">' . $item["total"] . '</p>
            </div>
          </div>
        </div>
                ';
  }

  $todosPedidos .= '<div class="border border-secondary rounded p-2" id="' . $id . '">
                  <div class="btn-group m-1" role="group" aria-label="Basic mixed styles example">
                    <img src="assets/svg/accept.svg" class="mr-3" style="cursor:pointer;width:35px" onclick="aceitarPedido(' . $id . ')">
                    <img src="assets/svg/reject.svg" style="cursor:pointer;width:35px" onclick="rejeitarPedido(' . $id . ')">
                  </div>
                  <p style="float:right;line-height: 19px">' . count($iten) . ' Item(s) no pedido <br> Total: <b><span class="totalpedido' . $id . '">' . $totalItem . '</span></b></p>';
  $todosPedidos .= $itens . '</div><br>';
}

$todosPedidosAceites;
foreach ($pedidosAceitos as $k => $v) {
  $itens = '';
  $totalItem = $v["total"];
  $iten = (array) json_decode($v["itens"]);
  foreach ($iten as $item) {
    #global $itens;
    $item = (array) $item;
    $itens .= '<div class="mb-3">
      
      <div class="btn btn-light m-1 btn-sm position-relative"  style="width:97.5%;cursor:initial;">' . $item["nome"] . '</div>
          <div class="container">
            <div class="row">
                <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial">' . $item["preco"] . '</p>
                <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial">' . $item["qtd"] . '</p>
                <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial">' . $item["total"] . '</p>
            </div>
          </div>
        </div>
        ';
  }

  $todosPedidosAceites .= '<div class="border border-success rounded p-2">
                  
                  <p style="float:right;line-height: 19px">' . count($iten) . ' Item(s) no pedido <br> Total: <b>' . $totalItem . '</b></p>';
  $todosPedidosAceites .= $itens . '</div><br>';
}
//echo $itens;

$produtos = $db->select(["categoria"])->from("produto")->where(["usuario=$usuario"])->groupBy(["categoria"])->pegaResultados();

$todosProdutos;
foreach ($produtos as $key => $value) {

  $cat = $value["categoria"];
  $todosProdutos[$value["categoria"]] = $db->select()->from("produto")->where(["usuario=$usuario","categoria='$cat'"])->pegaResultados();
}

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Mesa</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- nav include here-->
      <?php include("nav.php"); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Mesa nº <?php echo $ID__MESA ?> <?php if ($mesa["codigo"]) {
                                                  echo '<button class="btn btn-sm btn-success">' . ($mesa["codigo"]) . '</button>';
                                                } ?></h1>
            <input type="hidden" value="<?php echo $ID__MESA; ?>" id="id_mesa">
            <input type="hidden" value="<?php echo $ID__CONTA; ?>" id="id_conta">
            <input type="hidden" value="<?php echo $NOME_CLIENTE_CONTA_MESA; ?>" id="nome_cliente">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
              <div class="breadcrumb-item"><a href="#">Mesas</a></div>
              <div class="breadcrumb-item">Mesa</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <?php
                    if ($mesa["ocupada"]) { ?>
                      <h4>Cliente: <?php echo $NOME_CLIENTE_CONTA_MESA; ?> <br>
                        Total: <span class="total_mesa"><?php echo $totalConta; ?></span></h4>
                    <?php } else {
                    ?>
                      <img src="assets/svg/marker.svg" data-toggle="modal" data-target="#exampleModalEdit" style="width: 5%;float:right;cursor:pointer;margin-top:12px;">
                    <?php
                    } ?>

                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Número da mesa</label>
                      <input type="text" class="form-control" placeholder="00" value="<?php echo $mesa["numeromesa"] ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>Descrição</label>
                      <input type="text" class="form-control" placeholder="..." value="<?php echo $mesa["descricao"] ?>" disabled>
                    </div>
                  </div>
                  <br>
                </div>


                <?php
                if ($mesa["ocupada"]) {
                ?>
                  <div class="card">
                    <div class="card-header">
                      <h4>FECHAR CONTA</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>PAGOU</label>
                        <input type="text" class="form-control" placeholder="" id="total-pago">
                      </div>
                      <button class="btn btn-danger form-control" style="background-color: #6777ef;border-color: #6777ef;box-shadow: 0 2px 6px #6777ef;" onclick="pagarConta()">FECHAR CONTA</button> <br>
                    </div>
                  </div>
                <?php } ?>

              </div>


              <?php
              if ($mesa["ocupada"]) {
              ?>
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="card">
                    <div class="card-body">
                      <h5><span class="qtd_pedidos_aceitar"><?php echo count($pedidos); ?></span> pedidos por aceitar</h5>
                      <br>
                      <div id="pedidos_por_aceitar">
                        <?php echo $todosPedidos; ?>
                      </div>


                    </div>
                    <button class="btn btn-lg btn-success ml-4 mr-4" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      <span class="qtd_pedidos_aceites"><?php echo count($pedidosAceitos) ?></span> pedidos aceites
                    </button>
                    <div class="collapse" id="collapseExample">
                      <div class="card-body">
                        <?php echo $todosPedidosAceites; ?>
                      </div>
                    </div>
                    <br>
                  </div>
                </div>
              <?php
              } else {
              ?>
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h4>ABRIR CONTA</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Nome do cliente</label>
                        <input type="text" class="form-control" placeholder="" id="cliente">
                      </div>
                      <button class="btn btn-danger form-control" style="background-color: #6777ef;border-color: #6777ef;box-shadow: 0 2px 6px #6777ef;" onclick="abrirConta()">ABRIR CONTA</button>
                    </div>
                  </div>
                  <button class="btn btn-warning form-control" style="background-color: #873299;border-color: #873299;box-shadow: 0 2px 6px #873299;" data-toggle="modal" data-target="#contaAnterior">CONTAS ANTERIORES</button>
                </div>
              <?php
              }
              ?>

            </div>
          </div>
          <?php
          if ($mesa["ocupada"]) {
          ?>
            <section class="h-100" style="background-color: #eee;">
              <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h3 class="fw-normal mb-0 text-black">FAZER PEDIDO NOVO</h3>
                      <div>
                        <p onclick="addItem()" style="cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                          </svg></p>
                      </div>
                    </div>

                    <div id="itensPorAdicionar">

                    </div>

                    <div class="card">
                      <div class="card-body">
                        <h4>Total: <span class="pedido-total"></span> <span class="pedido-itens" style="float: right;width:fit-content"></span></h4>
                        <button type="button" class="btn btn-warning btn-block btn-lg" style="background-color: #6777ef;border-color: #6777ef;box-shadow: 0 2px 6px #6777ef;" onclick="novoPedido()">PEDIDO NOVO</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </section>

          <?php
          }
          ?>
        </section>
      </div>
      <!-- footer include here -->
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>


  <!-- JS Libraies -->
  <script src="assets/modules/prism/prism.js"></script>


  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- My JS File -->
  <script src="assets/components/notificacao/notificacao.js"></script>
  <script src="assets/components/loader/loader.js"></script>
  <script src="assets/myJs/mesa/mesa.js"></script>
  <script src="assets/myJs/mesa/pegaProdutos.js"></script>
  <script src="assets/myJs/mesa/pedidoPorAceitar.js"></script>
  <script src="assets/myJs/mesa/novoPedido.js"></script> 
  <script src="assets/myJs/mesa/fecharConta.js"></script>
  <script src="assets/myJs/mesa/contasAnteriores.js"></script>
  <script>
    var loader = new debliwuiloader();
    var notificacao = new debliwuinotificacao();

    document.querySelector("body").append(loader);
    document.querySelector("body").append(notificacao);
  </script>

  <div class="modal fade" id="fecharConta" aria-labelledby="fecharContaLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form style="width: 200px;display:block;margin: 0 auto;" action="#">
            <div>
              <label for="recipient-name" class="col-form-label">Conta</label>
              <strong>
                <p class="col-sm btn btn-primary btn-lg" id="fecharContaConta"></p>
              </strong>

            </div>
            <div>
              <label for="recipient-name" class="col-form-label">Desconto:</label>
              <input type="number" class="form-control btn btn-danger btn-lg" min="0" value="0" id="fecharContaDesconto">
            </div>
            <div>
              <label for="recipient-name" class="col-form-label">Total</label>
              <strong>
                <p class="col-sm btn btn-success btn-lg" id="fecharContaTotal"></p>
              </strong>

            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="fecharConta()">Fechar conta</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ||||||| -->
  <div class="modal fade" id="contaAnterior" aria-labelledby="contaAnteriorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="contas-render">

        </div>
        <div class="modal-footer">
          <nav aria-label="...">
            <ul class="pagination pagination-sm" id="paginacao">
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>



  <!-- ALTERAR -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: red;">Alterar detalhes da mesa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="backEnd/Mesa/update.php" class="p-5">
            <div class="form-group">
              <input type="hidden" name="user" value="<?php echo "6643aeb808e91"; ?>">
              <input type="hidden" name="mesa" value="<?php echo $ID__MESA; ?>">
              <span>Nº da mesa</span>
              <input type="text" name="numero" class="form-control" placeholder="<?php echo $mesa["numeromesa"]; ?>" required> <br>
              <span>Descrição</span>
              <input type="text" name="descricao" class="form-control" placeholder="<?php echo  $mesa["descricao"]; ?>" required>

            </div>
            <button type="submit" class="btn btn-light">Alterar detalhes</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        </div>
        <div style="width: 100%;display:block;height:5px;clear:both"></div>
      </div>
    </div>
  </div>

  <?php 
    include("footer.php");
  ?>
  <script>
    setTimeout(function() {
      contasAnteriores();
    }, 2000);
  </script>
</body>

</html>