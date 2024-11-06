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

$arrayRes = [];
$mesas = $db->select()->from("mesa")->pegaResultados();


?>
<?php

if (isset($_GET["tipo"]) and $_GET["tipo"] == "passe") {
    include("BackEnd/Administrador.php");

    $user = new Administrador(Funcoes::conexao());
    $user->alterarPasse($_GET["email"], Funcoes::FazHash($_GET["passe"]));

    header("Location: definicoes.php");
    return;
}
if (isset($_GET["tipo"]) and $_GET["tipo"] == "detalhes") {
    include("BackEnd/Administrador.php");
    $user = new Administrador(Funcoes::conexao());
    global $res;
    $res = $user->alterarDetalhes($_GET["identificador"], $_GET["nome"], $_GET["email"], $_GET["telefone"]);
    $_SESSION['metadata'] = $res;
    header("Location: definicoes.php");
    return;
}
$res = $_SESSION['metadata'];
$user=$res["usuario"];
$tabela = AX::tb("gerente");

$ver = $db->select()->from($tabela)->where(["usuario='$user'"])->orderBy("nome")->pegaResultados();
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
<style>
    .p-pequeno{margin: 0;}
</style>
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <!-- nav include here-->
            <?php include("nav.php"); ?>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>EQUIPA</h1>
                        <div class="section-header-breadcrumb">
                        </div>
                    </div>

                    <div class="section-body">

                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#novo" style="float:right">
                            Novo membro
                        </button>

                        <br>


                        <div class="row">
                            <div class="col-9">
                                
                        <?php
                        echo '<h3> ' . count($ver) . ' Membros na equipa</h3><br><br><br>';
                        $salt = hash("sha256", md5(time()));
                        foreach ($ver as $res) {
                            if ($res["nome"] == "Dev Senior") {
                                continue;
                            }

                        ?>

                            <div class="card p-4">
                                <p class="p-pequeno"><?php echo $res["nome"]; ?></p>
                                <p class="p-pequeno">Tel: <?php echo $res["telefone"]; ?></p>
                                <p class="p-pequeno">Email: <?php echo $res["email"]; ?></p>
                                <p class="p-pequeno">Função: <?php echo $res["role"]; ?></p>
                                <br>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#alterar<?php echo $res["identificador"]; ?>">
                                                Alterar Info
                                            </button>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#funcao<?php echo $res["identificador"]; ?>">
                                                Alterar Função
                                            </button>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#passe<?php echo $res["identificador"]; ?>">
                                                Alterar palavra passe
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <br><br>
                        <?php }
                        ?>
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
<!-- Modal alterar -->



<?php
foreach ($ver as $res) {
    if ($res["nome"] == "Dev Senior") {
        continue;
    }

?>
<!-- Modal -->
<div class="modal fade" id="alterar<?php echo $res["identificador"]; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alterar Informações</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="BackEnd/Administrador/alterar_info.php">
                <div class="modal-body">
                    <input type="hidden" value="<?php echo $res["identificador"]; ?>" name="membro">
                    <p class="p-pequeno">Nome</p>
                    <input value="<?php echo $res["nome"]; ?>" name="nome" class="form-control">
                    <br>
                    <p class="p-pequeno">Telefone</p>
                    <input value="<?php echo $res["telefone"]; ?>" name="telefone" class="form-control">
                    <br>
                    <p class="p-pequeno">Email</p>
                    <input value="<?php echo $res["email"]; ?>" name="email" class="form-control">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Modal alterar -->

<!-- Modal alterar função-->


<!-- Modal -->
<div class="modal fade" id="funcao<?php echo $res["identificador"]; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alterar Função</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="BackEnd/Administrador/alterar_funcao.php">
                <div class="modal-body">
                    <input type="hidden" value="<?php echo $res["identificador"]; ?>" name="membro">
                    <p class="p-pequeno">Função</p>
                    <select name="funcao" class="form-control">
                        <option value="<?php echo $res["role"]; ?>"><?php echo $res["role"]; ?></option>
                        <option value="tecnico">tecnico</option>
                        <option value="admin">admin</option>
                    </select>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-info">Alterar função</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Modal alterar função -->

<!-- Modal alterar passe-->


<!-- Modal -->
<div class="modal fade" id="passe<?php echo $res["identificador"]; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alterar Palavra passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="BackEnd/Administrador/alterar_passe.php">
                <div class="modal-body">
                    <input type="hidden" value="<?php echo $res["identificador"]; ?>" name="membro">
                    <p class="p-pequeno">Nova palavra passe</p>
                    <input type="password" value="" name="passe" class="form-control">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger">Alterar palavra passe</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Modal alterar passe -->

<?php }
?>

<!-- Modal -->
<div class="modal fade" id="novo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar membro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="BackEnd/Administrador/adicionar.php" method="post">
                    <input type="hidden" name="user" value="<?php echo $res['usuario']; ?>">
                    <p class="p-pequeno">Nome</p>
                    <input type="text" value="" name="nome" class="form-control" autocomplete="off">
                    <br>
                    <p class="p-pequeno">Telefone</p>
                    <input type="number" value="" name="telefone" class="form-control" autocomplete="off">
                    <br>
                    <p class="p-pequeno">Email</p>
                    <input type="email" value="" name="email" class="form-control" autocomplete="off">
                    <br>

                    <p class="p-pequeno">Função</p>
                    <select name="funcao" class="form-control">
                        <option value="tecnico">tecnico</option>
                        <option value="admin">admin</option>
                    </select>
                    <br>
                    <p class="p-pequeno">Palavra passe</p>
                    <input type="password" value="" name="passe" class="form-control" autocomplete="off">
                    <br>
                    <button type="submit" class="btn btn-danger btn-sm">Adicionar novo membro</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal alterar passe -->