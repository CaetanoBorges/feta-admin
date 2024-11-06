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
$mesas = $db->select()->from("mesa")->where(["usuario=$usuario"])->pegaResultados();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Mesas</title>

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
                        <h1>Mesas</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Inicio</a></div>
                            <div class="breadcrumb-item"><a href="#">Mesas</a></div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="p-3" style="display:block;">
                                    <?php
                                    foreach ($mesas as $k => $v) {
                                        $cor = "#6777ef";
                                        if($v["ocupada"]){
                                            $cor="#990000";
                                        }
                                        $params=md5(time()).'='.md5(time()*time())."&opt=".$v["numeromesa"];
                                    ?>
                                    <a href="mesa.php?<?php echo $params; ?>" style="text-decoration:none;">
                                        <div style="width: 200px;height:200px;margin:10px;padding:10px;display:inline-block;border:1px solid <?php echo $cor; ?>;border-radius:5px;">
                                            <p style="font-size: 40px;font-weight:bold;color: <?php echo $cor; ?>"><?php echo $v["numeromesa"] ?></p>
                                            
                                        </div> 

                                    </a>
                                        
                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="card p-3">
                                    <a class="btn btn-danger form-control" href="add_mesa.php" style="background-color: #6777ef;border-color: #6777ef;box-shadow: 0 2px 6px #6777ef;">ADICIONAR MESA</a>
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
    include("_partes/notificacao.php");
?>
</html>