<?php
session_start();
if (!isset($_SESSION['REST-admin'])) {
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
$mesas = $db->select()->from("mesa")->where(["usuario=$usuario"])->pegaResultados();


?>
<?php

if (isset($_GET["tipo"]) and $_GET["tipo"] == "passe") {
    include("BackEnd/Administrador.php");

    $user = new Administrador(Funcoes::conexao());
    $user->alterarPasse($_GET["email"], Funcoes::FazHash($_GET["passe"]));

    header("Location: perfil.php");
    return;
}
if (isset($_GET["tipo"]) and $_GET["tipo"] == "detalhes") {
    include("BackEnd/Administrador.php");
    $user = new Administrador(Funcoes::conexao());
    global $res;
    $res = $user->alterarDetalhes($_GET["identificador"], $_GET["nome"], $_GET["email"], $_GET["telefone"]);
    $_SESSION['metadata'] = $res;
    header("Location: perfil.php");
    return;
}
$res = $_SESSION['metadata'];

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Perfil</title>

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
                        <h1>PERFIL</h1>
                        <div class="section-header-breadcrumb">
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">

                            <div class="div col-6">
                                <div class="box-s">
                                    <div class="box__title form-control"><?php echo $res['nome'] ?></div>
                                </div>

                                <div class="box-s">
                                    <div class="box__title form-control"><?php echo $res['email'] ?></div>
                                </div>
                                <div class="box-s">
                                    <div class="box__title form-control"><?php echo $res['telefone'] ?></div>
                                </div>
                                <div class="box-s">
                                    <div class="box__title form-control"><?php echo $res['role'] ?></div>
                                </div>


                            </div>


                            <div class="div">


                                <div class="box-s">
                                    <div class="modal-box">
                                        <button class="btn form-control" data-toggle="modal" data-target="#myModal">Alterar Palavra-passe</button>
                                    </div>
                                </div>

                                <div class="box-s">

                                    <div class="modal-box">
                                        <button class="btn form-control" data-toggle="modal" data-target="#myDetalhes">Alterar Detalhes</button>
                                    </div>
                                </div>

                            </div>



                        </div>
                        <br>
                        <br>
                        <br>

                        <?php if ($_SESSION['metadata']['role'] == "admin") { ?>
                            <a href="equipa.php"><b>VER EQUIPA</b></a>
                        <?php } ?>
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
include("_partes/notificacao.php");
?>

</html>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Alterar palavra passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="perfil.php" method="get" class="form-modal">
                    <input type="hidden" name="tipo" value="passe">
                    <input type="hidden" name="usuario" value="<?php echo $res['usuario']; ?>">
                    <input type="hidden" name="email" value="<?php echo $res['email'] ?>">
                    <input type="text" name="passe" class="form-control" value="" placeholder="Palavra-passe Nova" required>



                    <button type="submit" class="btn btn-danger">
                        Alterar
                    </button>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="myDetalhes" tabindex="-1" aria-labelledby="myDetalhesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myDetalhesLabel">Alterar detalhes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="definicoes.php" method="get" class="form-modal">
                    <input type="hidden" name="tipo" value="detalhes">
                    <input type="hidden" name="identificador" value="<?php echo $res['identificador'] ?>">
                    <input type="hidden" name="usuario" value="<?php echo $res['usuario']; ?>">
                    <input type="text" name="nome" class="form-control" value="<?php echo $res['nome'] ?>" placeholder="Nome" required>
                    <input type="email" name="email" class="form-control" value="<?php echo $res['email'] ?>" placeholder="Email" required>
                    <input type="number" name="telefone" class="form-control" value="<?php echo $res['telefone'] ?>" placeholder="Telefone" required>



                    <button type="submit" class="btn btn-danger">
                        Alterar
                    </button>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>