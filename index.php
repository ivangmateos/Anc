<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/diseño.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./js/AbrirVentanaModal.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<body>

    <!--Bloque-Cabecera-->
    <header>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
            <div class="container">
                <a href="index.php" class="navbar-brand"><img class="imagen" src="img/logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#modalLogin" href="#">Accede<span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="Sinacceder/Registro.php" class="nav-link active" aria-current="page">Registrate</a>
                        </li>
                        <li class="nav-item">
                            <a href="Sinacceder/adoptar.php" class="nav-link active" aria-current="page">Adoptar</a>
                        </li>
                        <li class="nav-item">
                            <a href="Sinacceder/conocenos.html" class="nav-link active" aria-current="page">Conocenos</a>
                        </li>
                        <li class="nav-item">
                            <a href="Sinacceder/donar.html" class="nav-link active" aria-current="page">Donar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Ventana Modal de login-->
        <div class="modal fade" id="modalLogin">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="Php/Login_Usuario.php" method="Post">
                            <div class="form-group">
                                <img class="imagen logo" src="img/logo.png">
                                <label class="letrasennegro" for="inputUsuario">Usuario</label>
                                <input type="usuario" class="form-control" id="inputUsuario" name="usuario" placeholder="Escribe tu usuario" required>
                            </div>
                            <div class="form-group mb-2">
                                <label class="letrasennegro" for="inputPassword">Contraseña</label>
                                <input type="password" class="form-control" id="inputPassword" name="contrasena" placeholder="Escribe tu contraseña..." required>
                            </div>
                            <button type="submit" class="btn  btn-success btn-block col-12"> <a id="iniciarsesion" class="decoracionbotones">Iniciar sesion</a></button>
                            <hr>
                            <a href="Sinacceder/Registro.php" class="btn  btn-success btn-block col-12 decoracionbotones">Registrate</a>
                            <div class="row text-center">
                                <?php if (isset($_GET["Usuario_Registrado"])) {
                                    echo "
                                        <script>abrirventana()</script>     
                                        <span class='text-success mt-4 '>Usuario registrado con exito</span>";
                                } ?>
                                <?php if (isset($_GET["error"])) {
                                    echo "
                                        <script>abrirventana()</script>
                                        <span class='text-danger mt-4 '>Usuario o contrasena incorrectos</span>";
                                } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/16402750018255.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/thinkstockphotos-478872471-114621_1_780x462.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/pexels-andrea-bova-2850609.webp" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="alinearlasletras bg-primary">
        <h1 class="pt-3 textoadoptanocompres">Adopta No Compres</h1>
    </section>
    <section id="what-learn">
        <div class="container">
            <p>Organización <strong>sin ánimo de lucro </strong>enfocada en el bienestar y cuidado de los
                animales
            </p>
            <div class="row">
                <div class="col-sm-4">
                    <img class="rounded-circle imagenesdeinicio" src="img/huellas.png" alt="">
                    <h3>Adopta</h3>
                    <p>Te facilitaremos todo el proceso de adopción</p>
                </div>
                <div class="col-sm-4">
                    <img class="rounded-circle  imagenesdeinicio" src="img/megafono.png" alt="">
                    <h3>Consejos</h3>
                    <p>Aprende cómo cuidar a tu peludo
                    </p>
                </div>
                <div class="col-sm-4">
                    <img class="rounded-circle imagenesdeinicio" src="img/cerdito.png" alt="">
                    <h3>Dona</h3>
                    <p>Ayuda a animales que lo necesiten</p>
                </div>
            </div>
        </div>
    </section>
    <!--Footer-->
    <footer id="footer" class="pt-3 px-3 pb-1">
        <div class="container-fluid">
            <p>Direccion: C/Ancora <span>|</span> <span>Redes sociales:</span> <a href="" target="_blank" class="badge social twitter"><i class="bi bi-twitter fs-5"></a></i>
                <a href="" target="_blank" class="badge social instagram"> <i class="bi bi-instagram fs-5"></a></i>
                <a href="" target="_blank" class="badge social facebook"> <i class="bi bi-facebook fs-5"></a></i><span>|</span> Contacto: <span> Correo:ANC@gmail.com</span>
                <span>|</span><span> Telefono:622536895</span>
            </p>
            </p>
        </div>
    </footer>
</body>

</html>