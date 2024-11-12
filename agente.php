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
                                    <label></label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button class="btn btn-sm btn-primary">INFO</button>
                                                        <h5 style="margin:0;"><br>Super Junior Chess</h5>
                                                        <p style="margin:0;">AI7684009AH090</p>
                                                        <p style="margin:0;">999 888 777</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label></label>
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
                </section>
                <section class="container">
                    <div class="row">
                        <div class="col-3">

                            <div class="row mb-4">
                                <div class="col-md-6"> <select class="form-control" id="year">
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <!-- Adicione mais anos conforme necessário -->
                                    </select> </div>
                                <div class="col-md-6"> <select class="form-control" id="month">
                                        <option value="Janeiro">Janeiro</option>
                                        <option value="Fevereiro">Fevereiro</option>
                                        <!-- Adicione mais meses conforme necessário -->
                                    </select> </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="">
                            <ul id="tabs" class="nav nav-tabs">
                                <li class="nav-item"><a href="" data-target="#todas-transacoes" data-toggle="tab"
                                        class="nav-link small text-uppercase active">Todas</a></li>
                                <li class="nav-item"><a href="" data-target="#entrada-transacoes" data-toggle="tab"
                                        class="nav-link small text-uppercase">Entrada</a></li>
                                <li class="nav-item"><a href="" data-target="#saida-transacoes" data-toggle="tab"
                                        class="nav-link small text-uppercase">Saida</a></li>
                            </ul>
                            <br>
                            <div id="tabsContent" class="tab-content" style="overflow-y:scroll;max-height:500px">
                                <div id="todas-transacoes" class="tab-pane fade active show">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th></th>
                                                    <th>Descrição</th>
                                                    <th>ID Transação</th>
                                                    <th>Tipo</th>
                                                    <th>Cliente</th>
                                                    <th>Data</th>
                                                    <th>Valor</th>
                                                    <th>Comprovativo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><i class="fas fa-arrow-down text-danger"></i></td>
                                                    <td> Levantamento </td>
                                                    <td>#12548796</td>
                                                    <td> Saída</td>
                                                    <td>999 999 999</td>
                                                    <td>28 Jan, 12.30 AM</td>
                                                    <td class="text-danger">- 2500</td>
                                                    <td><a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-download"></i> Baixar</a></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-arrow-up text-success"></i></td>
                                                    <td>Depósito</td>
                                                    <td>#12548796</td>
                                                    <td> Entrada</td>
                                                    <td>999 999 999</td>
                                                    <td>25 Jan, 10.40 PM</td>
                                                    <td class="text-success">+ 750</td>
                                                    <td><a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-download"></i> Baixar</a></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-arrow-down text-danger"></i>
                                                    </td>
                                                    <td> Levantamento
                                                    </td>
                                                    <td>#12548796</td>
                                                    <td> Saída</td>
                                                    <td>999 999 999</td>
                                                    <td>20 Jan, 10.40 PM</td>
                                                    <td class="text-danger">- 150</td>
                                                    <td><a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-download"></i> Baixar</a></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-arrow-down text-danger"></i>
                                                    </td>
                                                    <td>Levantamento</td>
                                                    <td>#12548796</td>
                                                    <td> Saída</td>
                                                    <td>999 999 999</td>
                                                    <td>15 Jan, 03.29 PM</td>
                                                    <td class="text-danger">- 1050</td>
                                                    <td><a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-download"></i> Baixar</a></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-arrow-up text-success"></i>
                                                    </td>
                                                    <td>Depósito</td>
                                                    <td>#12548796</td>
                                                    <td> Entrada</td>
                                                    <td>999 999 999</td>
                                                    <td>14 Jan, 10.40 PM</td>
                                                    <td class="text-success">+ 840</td>
                                                    <td><a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-download"></i> Baixar</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="entrada-transacoes" class="tab-pane fade">

                                </div>
                                <div id="saida-transacoes" class="tab-pane fade">

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-lg btn-primary form-control">Baixar Extrato</button>
                            <button class="btn btn-lg btn-danger form-control">Enviar Extrato ao Cliente</button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-lg btn-primary form-control">Receber Numerário</button>
                            <button class="btn btn-lg btn-danger form-control">Bloquear agente</button>
                        </div>
                    </div>
                </div>
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
                <h1>Confirmar levantamento</h1>
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
.table {
    border-collapse: separate !important;
    border-spacing: 0 !important;
    border: none !important;
}

.table th,
.table td {
    vertical-align: middle !important;
    border: none !important;
    border-bottom: 1px solid #dee2e6 !important;
    text-align: center;
    padding: 12px !important;
}

.table th:first-child,
.table td:first-child {
    border-left: 2px solid #dee2e6 !important;
    border-radius: 10px 0 0 10px !important;
}

.table th:last-child,
.table td:last-child {
    border-right: 2px solid #dee2e6 !important;
    border-radius: 0 10px 10px 0 !important;
}

.table thead th {
    background-color: #e9ecef !important;
    font-weight: bold !important;
}

.table tbody tr:hover {
    background-color: #f1f1f1 !important;
}

.table .btn {
    border-radius: 50px !important;
    padding: 5px 15px !important;
}

.table .text-primary,
.table .text-danger,
.table .text-success {
    display: inline-flex;
    align-items: center;
}

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