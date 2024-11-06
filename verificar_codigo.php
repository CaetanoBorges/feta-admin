<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <title>Verificar código</title>
        </head>
        <body>
            <form action="BackEnd/Administrador/verificar_codigo.php" method="post">
                <section class="vh-100" style="background-color: #ffffff;">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Verificar código</h3>

                            <div class="form-outline mb-4">
                            <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" placeholder="Email"  required />
                            </div>

                            <div class="form-outline mb-4">
                            <input type="text" id="typePasswordX-2" name="codigo" class="form-control form-control-lg" placeholder="Codigo"  required />
                            
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Verificar</button>

                            
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            </form>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        </html>