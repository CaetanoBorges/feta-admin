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
$reclamacoes = $db->select()->from("reclamacao")->where(["usuario=$usuario"])->pegaResultados();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Reclamações</title>

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
                        <h1>Reclamações</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
                            <div class="breadcrumb-item"><a href="#">Reclamações</a></div>
                        </div>
                    </div>

                    <div class="section-body">

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card p-3">
                                    <?php
                                    foreach ($reclamacoes as $k => $v) {
                                    ?>
                                        <div>
                                            <button type="button" class="btn btn-lg  <?php if(!$v["estado"]){ echo 'btn-danger'; }else{ echo 'btn-light'; } ?> form-control" data-toggle="modal" data-target="#exampleModal-<?php echo $v["identificador"] ?>" >
                                                <?php echo $v["quando"] ?>
                                            </button>
                                        </div> <br>

                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
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
foreach ($reclamacoes as $k => $v) {
?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal-<?php echo $v["identificador"] ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: <?php if(!$v["estado"]){ echo 'red;'; }else{ echo '#eaeaea'; } ?>">Reclamação <br><?php echo $v["quando"]; ?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <span>Nome</span>
                        <input type="text" name="nome" class="form-control" placeholder="<?php echo $v["nome"]; ?>" disabled>
                        <span>Telefone</span>
                        <input type="text" name="nome" class="form-control" placeholder="<?php echo $v["telefone"]; ?>" disabled>
                        <span>Email</span>
                        <input type="text" name="nome" class="form-control" placeholder="<?php echo $v["email"]; ?>" disabled>
                        <span>Detalhes</span>
                        <textarea name="" id="" cols="30" rows="10" disabled class="form-control"><?php echo $v["detalhes"]; ?></textarea>
                    </div>
                    <?php if(!$v["estado"]){ ?>
                            <form method="post" action="backEnd/Reclamacao/visto.php" class="p-5"> 
                                <div class="form-group">
                                    <input type="hidden" name="user" value="<?php echo "6643aeb808e91"; ?>">
                                    <input type="hidden" name="reclamacao" value="<?php echo $v["identificador"] ?>">
                                </div>
                                <button type="submit" class="btn btn-danger">Marcar como visto</button>
                            </form>
                        <?php } ?>
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