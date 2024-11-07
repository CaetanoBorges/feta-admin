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
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"> <label for="nome">Nome</label> <input
                                                type="text" class="form-control" id="nome" value="Charlene Medina">
                                        </div>
                                        <div class="form-group col-md-6"> <label for="bi">BI</label> <input type="text"
                                                class="form-control" id="bi" value="AO985435HU905"> </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"> <label for="dataNascimento">Data de
                                                Nascimento</label> <input type="date" class="form-control"
                                                id="dataNascimento" value="25 Janeiro 1990"> </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-6"> <label for="provincia">Província</label>
                                            <input type="text" class="form-control" id="provincia" value="Cabinda">
                                        </div>
                                        <div class="form-group col-md-6"> <label for="municipio">Município</label>
                                            <input type="text" class="form-control" id="municipio" value="Bucuzau">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"> <label for="bairro">Bairro / Distrito</label>
                                            <input type="text" class="form-control" id="bairro" value="São José">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6"> <label for="email">Email</label> <input
                                                type="email" class="form-control" id="email"
                                                value="charlenemedina@gmail.com"> </div>
                                        <div class="form-group col-md-6"> <label for="telefone">Telefone</label> <input
                                                type="text" class="form-control" id="telefone" value="999 999 999">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"> <label for="capitalAdesao">Capital
                                                Adesão</label> <input type="text" class="form-control"
                                                id="capitalAdesao" value="4 000 000"> </div>
                                        <div class="form-group col-md-6"> <label for="tipoAgente">Tipo de Agente</label> 
                                            <select name="" id="" class="form-control">
                                                <option value="normal">Normal</option>
                                                <option value="provincial">Provincial</option>
                                                <option value="Central">Central</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"> 
                                     <label for="password">Password</label> <input type="password" class="form-control" id="password" value="**********">
                                    </div> 
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Cadastrar
                                        agente</button>
                                </form>
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
</style>

</html>
<?php } else { 
 }