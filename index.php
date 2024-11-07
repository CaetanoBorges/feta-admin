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

                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label>Contas</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="info-display">
                                                <div class="info-item"> <span class="info-icon">&#9432;</span>
                                                    <span>Todas:</span> <span
                                                        style="float:right;margin-top: 12px;">500.000</span>
                                                </div>
                                                <div class="info-item"> <span class="info-icon">&#9432;</span>
                                                    <span>Particulares:</span> <span
                                                        style="float:right;margin-top: 12px;">500.000</span>
                                                </div>
                                                <div class="info-item"> <span class="info-icon">&#9432;</span>
                                                    <span>Empresa:</span> <span
                                                        style="float:right;margin-top: 12px;">500.000</span>
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
                                <div class="col-8">
                                    <label>Atividade semanal</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="chart-container">
                                                <canvas id="myChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label>Caixa</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container mt-3">
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
                                                <div class="financial-summary">
                                                    <div class="financial-item"> <span class="label">Entrada:</span>
                                                        <span class="value text-success">500,000</span>
                                                    </div>
                                                    <div class="financial-item"> <span class="label">Saida:</span> <span
                                                            class="value text-danger">0</span> </div>
                                                    <hr>
                                                    <div class="financial-item"> <span class="label">Central:</span>
                                                        <span class="value text-danger">470,000</span>
                                                    </div>
                                                    <div class="financial-item"> <span class="label">Ativos:</span>
                                                        <span class="value text-cyan">30,000</span>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /ROW 2 -->
                            <!-- ROW 3 -->
                            <div class="container">
                                <div class="row row-cols-2">
                                    <div class="col-4">
                                        <label>Agentes</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="carouselExampleIndicators" class="carousel slide"
                                                    data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                            class="active"></li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="1">
                                                        </li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="2">
                                                        </li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <div
                                                                class="d-flex justify-content-center align-items-center">
                                                                <div class="icon-box text-center"> <i
                                                                        class="fa fa-home fa-5x" aria-hidden="true"></i>
                                                                    <h5>Item 1</h5>
                                                                    <p>Detalhes do Item 1</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <div
                                                                class="d-flex justify-content-center align-items-center">
                                                                <div class="icon-box text-center"> <i
                                                                        class="fa fa-car fa-5x" aria-hidden="true"></i>
                                                                    <h5>Item 2</h5>
                                                                    <p>Detalhes do Item 2</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <div
                                                                class="d-flex justify-content-center align-items-center">
                                                                <div class="icon-box text-center"> <i
                                                                        class="fa fa-tree fa-5x" aria-hidden="true"></i>
                                                                    <h5>Item 3</h5>
                                                                    <p>Detalhes do Item 3</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <a class="carousel-control-prev"
                                                        href="#carouselExampleIndicators" role="button"
                                                        data-slide="prev"> <span class="carousel-control-prev-icon"
                                                            aria-hidden="true"></span> <span
                                                            class="sr-only">Previous</span> </a> <a
                                                        class="carousel-control-next" href="#carouselExampleIndicators"
                                                        role="button" data-slide="next"> <span
                                                            class="carousel-control-next-icon"
                                                            aria-hidden="true"></span> <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <label>Ativos</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="chart-container"> <canvas id="chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /ROW 3 -->
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Template JS File 
    -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
    <style>
    .financial-summary {
        background-color: #fff;
        padding: 20px 0;
    }

    .financial-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 1.2rem;
    }

    .label {
        font-weight: bold;
    }

    .text-success {
        color: green;
    }

    .text-danger {
        color: red;
    }

    .text-pink {
        color: #ff1493;
    }

    .text-cyan {
        color: cyan;
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
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sab', 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex'],
                datasets: [{
                    label: 'Deposito',
                    data: [200, 100, 250, 300, 150, 200, 250],
                    backgroundColor: 'green'
                }, {
                    label: 'Levantamento',
                    data: [450, 300, 200, 450, 100, 350, 400],
                    backgroundColor: 'red'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            max: 500
                        }
                    }]
                }
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez', 'Jan'],
                datasets: [{
                    label: 'Dados',
                    data: [150, 300, 450, 750, 350, 250, 600],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            max: 800
                        }
                    }]
                }
            }
        });
    });


    $(".search-element").show();
    </script>
</body>

</html>
<?php } else { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>REST - THE BEST</title>
</head>

<body>
    <form action="BackEnd/Administrador/entrar.php" method="post">
        <section class="vh-100" style="background-color: #ffffff;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-5">Login</h3>

                                <div class="form-outline mb-4">
                                    <input type="email" id="typeEmailX-2" name="email"
                                        class="form-control form-control-lg" placeholder="Email" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="typePasswordX-2" name="passe"
                                        class="form-control form-control-lg" placeholder="Palavra passe" required />

                                </div>
                                <div class="form-outline mb-4">
                                    <a href="receber_codigo.php" style="color:red;text-decoration:none;">
                                        <p>Esqueci a passe</p>
                                    </a>
                                </div>


                                <button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>

<?php }