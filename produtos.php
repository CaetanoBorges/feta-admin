<?php
session_start();
if(!isset($_SESSION['REST-admin'])){
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<?php
include("backEnd/FERRAMENTAS/AX.php");
include("backEnd/FERRAMENTAS/dbWrapper.php");
include("backEnd/FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$usuario = AX::attr($_SESSION["metadata"]["usuario"]);
$arrayRes = [];
$categorias = $db->select()->from("produtocategoria")->where(["usuario=$usuario"])->pegaResultados();
foreach ($categorias as $k => $cat) {
    $categoria = $cat["nome"];
    $res = $db->select()->from("produto")->where(["categoria='$categoria'", "usuario=$usuario"])->pegaResultados();
    $arrayRes[$categoria] = $res;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Produtos</title>

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
                        <h1>Produtos</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
                            <div class="breadcrumb-item"><a href="#">Produtos</a></div>
                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">Selecione a categoria para ver os produtos</h2>

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card p-3">
                                    <?php
                                    foreach ($arrayRes as $k => $v) {
                                    ?>
                                        <div>
                                            <button type="button" class="btn btn-lg btn-light" data-toggle="modal" data-target="#exampleModal-<?php echo $k ?>" style="width: 90%;">
                                                <?php echo $k ?>
                                            </button>
                                            <img src="assets/svg/marker.svg" data-toggle="modal" data-target="#exampleModalEdit-<?php echo $k ?>" style="width: 5%;float:right;cursor:pointer;margin-top:12px;">
                                        </div> <br>

                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card p-3">
                                    <a class="btn btn-danger form-control" href="add_categoria.php" style="background-color: #6777ef;border-color: #6777ef;box-shadow: 0 2px 6px #6777ef;">CADASTRAR CATEGORIA</a>
                                    <br>
                                    <a class="btn btn-danger form-control" href="add_produto.php" style="background-color: #6777ef;border-color: #6777ef;box-shadow: 0 2px 6px #6777ef;">CADASTRAR PRODUTO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- footer include here -->
            <?php
                include("footer.php");
            ?>
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
    <script src="assets/modules/cleave-js/dist/cleave.min.js"></script>
    <script src="assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
    <script src="assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>


    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
<?php
foreach ($arrayRes as $k => $v) {
?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal-<?php echo $k ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo count($v)." ".$k ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    foreach ($v as $prod) { ?>
                        <a href="produto.php?<?php echo md5(time()); ?>=<?php echo md5(time()); ?>&id=<?php echo $prod["identificador"] ?>&user=<?php echo $prod["usuario"] ?>&<?php echo md5(time()); ?>=<?php echo md5(time()); ?>&<?php echo md5(time()); ?>=<?php echo md5(time()); ?>" class="btn btn-lg btn-light" style="width: 100%;text-align: left;margin-bottom: 10px;">
                            <?php echo $prod["nome"] ?>
                            <span style="float: right;"><?php echo $prod["preco"] ?></span>
                        </a> 
                    <?php }
                    ?>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
<?php }
?>


<?php
foreach ($arrayRes as $k => $v) {
?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalEdit-<?php echo $k ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red;">Opções de <?php echo $k ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="backEnd/Categoria/update.php" class="p-5"> 
                        <div class="form-group">
                            <input type="hidden" name="user" value="<?php echo "6643aeb808e91"; ?>">
                            <input type="hidden" name="categoria" value="<?php echo $k; ?>">
                            <label>Alterar nome da categoria</label>
                            <input type="text" name="nome" class="form-control" placeholder="<?php echo $k; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-light">Alterar nome</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" data-toggle="collapse" href="#collapseExample-<?php echo $k ?>">Apagar categoria</button>
                </div>
                <div style="width: 100%;display:block;height:5px;clear:both"></div>
                    <div class="collapse" id="collapseExample-<?php echo $k ?>" style="z-index: 99;">
                        <div class="card card-body p-5">
                            Ao apagar essa categoria também irá eliminar todos produtos contidos nela. Tem certeza que deve tomar essa ação?
                            <form action="backEnd/Categoria/delete.php" method="post">
                                <input type="hidden" name="user" value="<?php echo "6643aeb808e91"; ?>">
                                <input type="hidden" name="categoria" value="<?php echo $k; ?>">
                                <button class="btn btn-danger" type="submit">Apagar mesmo assim</button>
                                <a class="btn btn-success" data-toggle="collapse" href="#collapseExample-<?php echo $k ?>">Cancelar</a>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<?php }
?>


<?php 
    include("_partes/notificacao.php");
?>
</html>