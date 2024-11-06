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

$produtoId = $_GET["id"];
$userId = $_GET["user"];
$usuario = AX::attr($_SESSION["metadata"]["usuario"]);
$categorias = $db->select()->from("produtocategoria")->where(["usuario=$usuario"])->pegaResultados();
$produto = $db->select()->from("produto")->where(["identificador='$produtoId'", "usuario=$usuario"])->pegaResultado();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Produto</title>

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
                        <h1>Ver produto</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
                            <div class="breadcrumb-item"><a href="#">Produtos</a></div>
                            <div class="breadcrumb-item">Produto</div>
                        </div>
                    </div>

                    <div class="section-body">

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Preencha os campos devidamente</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <input type="text" value="<?php echo $produto["categoria"] ?>" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" value="<?php echo $produto["nome"] ?>" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Preço</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        $
                                                    </div>
                                                </div>
                                                <input type="text" value="<?php echo $produto["preco"] ?>" class="form-control currency" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <img src="api/img/<?php echo $produto["img"]; ?>" style="width:150px;display:block:margin:0 auto;">
                                </div>
                                <div>
                                    <button class="btn btn-light form-control" data-toggle="modal" data-target="#alterarimagem">ALTERAR IMAGEM</button> <br><br>
                                    <button class="btn btn-light form-control" data-toggle="modal" data-target="#alterardados">ALTERAR DADOS</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
<!-- Modal -->
<div class="modal fade" id="alterarimagem" tabindex="-1" aria-labelledby="alterarimagemLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $produto['nome']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <img src="api/img/<?php echo $produto["img"]; ?>" style="width:150px;display:block:margin:0 auto;">
                </div>
                <form action="backEnd/Produto/updateimg.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="produto" value="<?php echo $produto['identificador']; ?>">
                    <input type="hidden" name="user" value="<?php echo $produto['usuario']; ?>">
                    <input type="file" name="imagem" class="form-control" accept="image/png, image/jpeg, image/gif" required>

            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                <button type="submit" class="btn btn-primary">Alterar imagem</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="alterardados" tabindex="-1" aria-labelledby="alterardadosLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $produto["nome"]; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="backEnd/Produto/update.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="produto" value="<?php echo $produto['identificador']; ?>">
                    <input type="hidden" name="user" value="<?php echo $produto['usuario']; ?>">


                    <div class="form-group">
                        <label>Categoria</label>
                        <select name="categoria" id="" class="form-control">
                            <option value="<?php echo $produto["categoria"] ?>"><?php echo $produto["categoria"] ?></option>
                            <?php foreach ($categorias as $cat) { ?>
                                <option value="<?php echo $cat["nome"] ?>"><?php echo $cat["nome"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" value="<?php echo $produto["nome"] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Preço</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    $
                                </div>
                            </div>
                            <input type="text" name="preco" value="<?php echo $produto["preco"] ?>" class="form-control currency" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Alterar dados</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include("_partes/notificacao.php");
?>

</html>