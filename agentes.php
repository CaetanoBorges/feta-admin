<!-- inicialize the db -->
<?php

session_start();
if (/* isset($_SESSION['REST-admin']) */ true) {

    error_reporting(0);
    include("backEnd/FERRAMENTAS/AX.php");
    include("backEnd/FERRAMENTAS/dbWrapper.php");
    include("backEnd/FERRAMENTAS/Funcoes.php");

    $funcoes = new Funcoes;
    $db = new dbWrapper($funcoes::conexao());

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Agentes</title>

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
    <link rel="stylesheet" href="assets/components/slideImg/lightSlider.css">
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
                    <div class="section-body">
                        <style>
                            a{color:#aaa;}
                            a:hover {text-decoration: none}
                        </style>
                        <br>
                        <!-- ROW 1 -->
                        <div class="container">
                            <div class="row row-cols-2">
                                <div class="col-8">
                                    <label></label>
                                            <div class="container">
                                                <a class="card" href="agente.php">
                                                    <div class="card-body">
                                                        <h5 style="margin:0;">Agente um <span style="font-size:9px;font-weight:light">Super</span></h5>
                                                        <p style="margin:0;">Luanda, Luanda</p>
                                                    </div>
                                                </a>
                                                <a class="card" href="agente.php">
                                                    <div class="card-body">
                                                        <h5 style="margin:0;">Agente Dois <span style="font-size:9px;font-weight:light">Normal</span></h5>
                                                        <p style="margin:0;">Huambo, Cahala</p>
                                                    </div>
                                                </a>
                                                <a class="card" href="agente.php">
                                                    <div class="card-body">
                                                        <h5 style="margin:0;">Agente Dois <span style="font-size:9px;font-weight:light">Normal</span></h5>
                                                        <p style="margin:0;">Huila, Lubango</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                <div class="col-4">
                                    <label></label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="info-display">
                                                <div class="info-item" style="font-weight:bold;"> <span
                                                        class="info-icon">&#9432;</span>
                                                    <span>Todos:</span> <span
                                                        style="float:right;margin-top: 12px;">50</span>
                                                </div>
                                                <div class="info-item"> <span class="info-icon">&#9432;</span>
                                                    <span>Super agente:</span> <span
                                                        style="float:right;margin-top: 12px;">10</span>
                                                </div>
                                                <div class="info-item"> <span class="info-icon">&#9432;</span>
                                                    <span>Agente normal:</span> <span
                                                        style="float:right;margin-top: 12px;">40</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a class="btn btn-lg btn-primary form-control" href="cadastraragente.php">Cadastrar Agente</a>
                                </div>
                            </div>
                        </div>

                        <!-- /ROW 1 -->
                       
                                
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
    <!-- Template JS File 
    -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
<!-- Modal -->
<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="confirmarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1>Confirmar
                levantamento</h1>
                <button type="button" class="btn btn-primary form-control">Confirmar por aplicativo</button> <br><br>
                <button type="button" class="btn btn-info form-control">Confirmar por USSD</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<style>
.info-display {
    border-radius: 10px;
    background-color: #fff;
}

.info-item {
    padding: 10px 0;
    font-size: 1.2rem;
}

.info-item:not(:last-child) {
    border-bottom: 1px solid #ddd;
}

.info-icon {
    font-size: 1.5em;
    margin-right: 10px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group input {
    font-size: 2rem;
    text-align: center;
    border: 2px solid #ced4da;
    border-radius: 0.25rem;
    padding: 10px;
}

.erro-info {}

.erro-info span {
    font-size: 3.5rem;
}
</style>

</html>
<?php } else { 
 }