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
    <title>Inicio</title>

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
                        <br>
                        <!-- ROW 1 -->
                        <div class="container">
                            <div class="row row-cols-2">
                                <div class="col-8">
                                    <label>Pesquisa</label>
                                    <div class="card">
                                        <div class="card-body" style="height:232px;">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i
                                                                        class="fas fa-search"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Nome do cliente"
                                                                aria-label="Nome do cliente"
                                                                aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 style="margin:0;">Super Junior Chess</h5>
                                                        <p style="margin:0;">Homem</p>
                                                        <p style="margin:0;">AI7684009AH090</p>
                                                        <p style="margin:0;">999 999 999</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label>Contas</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="info-display">
                                                <div class="info-item" style="font-weight:bold;"> <span
                                                        class="info-icon">&#9432;</span>
                                                    <span>Saldo atual:</span> <span
                                                        style="float:right;margin-top: 12px;">500.000</span>
                                                </div>
                                                <div class="info-item"> <span class="info-icon">&#9432;</span>
                                                    <span>Conta:</span> <span
                                                        style="float:right;margin-top: 12px;">Particular</span>
                                                </div>
                                                <div class="info-item"> <span class="info-icon">&#9432;</span>
                                                    <span>Desde:</span> <span
                                                        style="float:right;margin-top: 12px;">23H76M766 17843</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /ROW 1 -->
                        <!-- ROW 2 -->
                        <div class="container">
                            <div class="row row-cols-2">
                                <div class="col-4">
                                    <label>Quantidade de notas/moedas</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group row"> <label for="nota10"
                                                    class="col-sm-4 col-form-label">10</label>
                                                <div class="col-sm-8"> <input type="number" class="form-control"
                                                        id="nota10" placeholder="0"> </div>
                                            </div>
                                            <div class="form-group row"> <label for="nota20"
                                                    class="col-sm-4 col-form-label">20</label>
                                                <div class="col-sm-8"> <input type="number" class="form-control"
                                                        id="nota20" placeholder="0"> </div>
                                            </div>
                                            <div class="form-group row"> <label for="nota50"
                                                    class="col-sm-4 col-form-label">50</label>
                                                <div class="col-sm-8"> <input type="number" class="form-control"
                                                        id="nota50" placeholder="0"> </div>
                                            </div>
                                            <div class="form-group row"> <label for="nota100"
                                                    class="col-sm-4 col-form-label">100</label>
                                                <div class="col-sm-8"> <input type="number" class="form-control"
                                                        id="nota100" placeholder="0"> </div>
                                            </div>
                                            <div class="form-group row"> <label for="nota200"
                                                    class="col-sm-4 col-form-label">200</label>
                                                <div class="col-sm-8"> <input type="number" class="form-control"
                                                        id="nota200" placeholder="0"> </div>
                                            </div>
                                            <div class="form-group row"> <label for="nota500"
                                                    class="col-sm-4 col-form-label">500</label>
                                                <div class="col-sm-8"> <input type="number" class="form-control"
                                                        id="nota500" placeholder="10"> </div>
                                            </div>
                                            <div class="form-group row"> <label for="nota1000"
                                                    class="col-sm-4 col-form-label">1000</label>
                                                <div class="col-sm-8"> <input type="number" class="form-control"
                                                        id="nota1000" placeholder="5"> </div>
                                            </div>
                                            <div class="form-group row"> <label for="nota2000"
                                                    class="col-sm-4 col-form-label">2000</label>
                                                <div class="col-sm-8"> <input type="number" class="form-control"
                                                        id="nota2000" placeholder="2"> </div>
                                            </div>
                                            <div class="form-group row"> <label for="nota5000"
                                                    class="col-sm-4 col-form-label">5000</label>
                                                <div class="col-sm-8"> <input type="number" class="form-control"
                                                        id="nota5000" placeholder="1"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <!-- ROW 2.1 -->
                                    <div class="container">
                                        <div class="row row-cols-2">
                                            <div class="col-12">
                                                <label>Total a levantar</label>
                                                <div class="card">
                                                    <div class="card-body" style="height:150px;">
                                                        <input type="number"
                                                            style="width:100%;height: 100%;text-align:center;font-size:3.5rem"
                                                            class="form-control" value="15000">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label>Total de notas/moedas</label>
                                                <div class="card">

                                                    <div class="card-body" style="height:150px;">
                                                        <input type="number"
                                                            style="width:100%;height: 100%;text-align:center;font-size:3.5rem"
                                                            class="form-control" value="15000" readonly>
                                                    </div>

                                                </div>


                                                <!-- BUTÕES -->
                                                <p class="erro-info"> <span>ERRO</span> <br> TOTAL DAS NOTAS É MAIOR QUE
                                                    O MONTANTE A
                                                    LEVANTAR</p>

                                                <button class="btn btn-primary btn-lg float-right"> Fazer
                                                    Levantamento</button>
                                            </div>
                                            <!-- /ROW 2.1 -->
                                        </div>
                                    </div>

                                    <!-- /ROW 2 -->

                                </div>


                                <!-- CONTAINER CONFIRMAR -->
                                <div class="container">
                                    <div class="row row-cols-1">
                                        <div class="col-12">
                                            <!-- CONFIRMAR -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2 class="text-center">
                                                        Confirme o valor do levantamento <br>
                                                        e a correspondência das notas
                                                    </h2> <br>
                                                    <h1 class="text-danger text-center" style="font-size:3.5rem;">19 000
                                                    </h1>
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">10 notas de 500</li>
                                                        <li class="list-group-item">5 notas de 1000</li>
                                                        <li class="list-group-item">2 notas de 2000</li>
                                                        <li class="list-group-item">1 nota de 5000</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <button class="btn btn-light btn-lg">Voltar</button>
                                            <button class="btn btn-primary btn-lg float-right" data-toggle="modal"
                                                data-target="#confirmar"> Fazer Levantamento</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /CONTAINER CONFIRMAR -->
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