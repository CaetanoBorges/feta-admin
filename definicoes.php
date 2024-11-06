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

if (isset($_POST["user"])) {
    $usuario = AX::attr($_SESSION["metadata"]["usuario"]);
    $img = time() . "-" . $_FILES["imagem"]["name"];

    $defIMG = $db->select(["img"])->from("usuario")->where(["identificador=$usuario"])->pegaResultado()["img"];
    $res = $db->update("usuario")->set(["img='$img'"])->where(["identificador=$usuario"])->executaQuery();

    move_uploaded_file($_FILES["imagem"]["tmp_name"], 'api/img/' . $img);
    unlink("api/img/" . $defIMG);

    header("Location: definicoes.php");
    return;
}
if (isset($_GET["tipo"]) and $_GET["tipo"] == "detalhes") {
    $nome = $_GET["nome"];
    $telefone = $_GET["telefone"];
    $email = $_GET["email"];
    $localizacoes = $_GET["localizacoes"];
    $bancos = $_GET["bancos"];
    $sobre = $_GET["sobre"];
    $usuario = $_GET["usuario"];

    $db->update("usuario")->set(["nome='$nome'", "telefone='$telefone'", "email='$email'", "localizacoes='$localizacoes'", "bancos='$bancos'", "sobre='$sobre'",])->where(["identificador='$usuario'"])->executaQuery();

    header("Location: definicoes.php");
    return;
}
$res = $_SESSION['metadata'];
$user = $res["usuario"];
$def = $db->select()->from("usuario")->where(["identificador='$user'"])->pegaResultado();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Definições</title>

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
                        <h1>DEFINICOES</h1>
                        <div class="section-header-breadcrumb">
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">

                            <div class="div col-6">
                                <div class="box-s">
                                    <div class="box__title form-control"><?php echo $def['nome'] ?></div>
                                </div>

                                <div class="box-s">
                                    <div class="box__title form-control"><?php echo $def['email'] ?></div>
                                </div>
                                <div class="box-s">
                                    <div class="box__title form-control"><?php echo $def['telefone'] ?></div>
                                </div>
                                <div class="box-s">
                                    <div class="box__title form-control"><?php echo $def['sobre'] ?></div>
                                </div>
                                <div class="box-s">
                                    <div class="box__title form-control"><?php echo $def['localizacoes'] ?></div>
                                </div>
                                <div class="box-s">
                                    <div class="box__title form-control"><?php echo $def['bancos'] ?></div>
                                </div>


                            </div>


                            <div class="div">

                                <?php if ($_SESSION['metadata']['role'] == "admin") { ?>
                                
                                    <div class="box-s">
                                        <div class="modal-box">
                                            <button class="btn form-control" data-toggle="modal" data-target="#myModal">Alterar Logotipo</button>
                                        </div>
                                    </div>
                                    <div class="box-s">
                                        <div class="modal-box">
                                            <button class="btn form-control" data-toggle="modal" data-target="#myDetalhes">Alterar Info</button>
                                        </div>
                                    </div>
                            
                                <?php } ?>
                                <div class="form-group">
                                    <img src="api/img/<?php echo $def["img"]; ?>" style="width:150px;display:block:margin:0 auto;">
                                </div>
                            </div>



                        </div>
                        <br>
                        <br>
                        <br>

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
                <h5 class="modal-title" id="myModalLabel">Alterar banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <img src="api/img/<?php echo $def["img"]; ?>" style="width:150px;display:block:margin:0 auto;">
                </div>
                <form action="definicoes.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user" value="<?php echo $def['identificador']; ?>">
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
                    <input type="hidden" name="usuario" value="<?php echo $res['usuario'] ?>">
                    <span>Nome:</span>
                    <input type="text" name="nome" class="form-control" value="<?php echo $def['nome'] ?>" placeholder="Nome" required>
                    <br>
                    <span>Email:</span>
                    <input type="email" name="email" class="form-control" value="<?php echo $def['email'] ?>" placeholder="Email" required>
                    <br>
                    <span>Telefone:</span>
                    <input type="number" name="telefone" class="form-control" value="<?php echo $def['telefone'] ?>" placeholder="Telefone" required>
                    <br>
                    <span>Localização:</span>
                    <input type="text" name="localizacoes" class="form-control" value="<?php echo $def['localizacoes'] ?>" placeholder="Localização" required>
                    <br>
                    <span>IBAN:</span>
                    <input type="text" name="bancos" class="form-control" value="<?php echo $def['bancos'] ?>" placeholder="IBAN" required>
                    <br>
                    <span>Sobre:</span>
                    <input type="text" name="sobre" class="form-control" value="<?php echo $def['sobre'] ?>" placeholder="Sobre" required>

                    <br>

                    <button type="submit" class="btn btn-danger">
                        Alterar detalhes
                    </button>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>