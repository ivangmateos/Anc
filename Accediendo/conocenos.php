<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../css/diseño.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conocenos</title>
</head>

<body>
    <!--Bloque-Cabecera-->
    <header>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
            <div class="container">
                <a href="../Accediendo/index.php" class="navbar-brand"><img class="imagen" src="../img/logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                            <span class="nav-link active" id="bordenombre">
                                <?php include_once("../Php/Clase_Usuario.php");
                                session_start();
                                if($_SESSION["usuario"]==null){
                                    header("location:../index.php");
                                }
                                $usu = $_SESSION["usuario"]->getUsuario();
                                echo $usu;
                                ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="../Accediendo/editarperfil.php" class="nav-link active" aria-current="page">Editar
                                perfil</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Accediendo/adoptar.php" class="nav-link active" aria-current="page">Adoptar</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Accediendo/tienda.php" class="nav-link active" aria-current="page">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Accediendo/conocenos.php" class="nav-link active"
                                aria-current="page">Conocenos</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Accediendo/donar.php" class="nav-link active" aria-current="page">Donar</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Php/Cerrar_Sesion.php" class="nav-link active" aria-current="page"><i
                                    class="bi bi-box-arrow-right  iconosalir"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="wrap" id="instructor">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 left-side pt-5 text-center">
                    <h2>¿Que hacemos?</h2>


                    <img class="imagenquehacemos" src="../img/fotoquehacemos.png" alt="">

                </div>
                <div class="col-sm-8 pt-5 pb-5 tamañopantalla">
                    <p class="lead">La Asociación para el Respeto y Cuidado de los Animales, ANC, nace en Sevilla en
                        2022, de la mano de
                        un
                        grupo de jóvenes con la ilusión de conseguir que todos los animales puedan disfrutar de una vida
                    </p>
                    <p class="lead">Enfocamos nuestro esfuerzo en su protección y defensa intentando dignificar y
                        mejorar sus
                        condiciones
                        de vida</p>
                    <p class="lead">Desde Adopta No Compres trabajamos para encontrar un hogar a
                        aquellos animales que antes dormían en la calle</p>
                    <p class="lead">Nuestro trabajo se sostiene en mas de un 99% gracias a la generosidad de los
                        donantes, no
                        podriamos
                        seguir provocando cambios positivos a nuestros alrededores sin tu ayuda</p>

                </div>
            </div>
        </div>
    </section>
    <!--Bloque-Video-->
    <section class="wrap" id="video">
        <div class="container">
            <div class="col-sm-12 pb-5 " id="textoyvideoconocenos">
                <h1>Un dia con nuestros peludos</h1>
                <iframe class="videoconocenos" src="https://www.youtube.com/embed/94HwMpEyIws"></iframe>
            </div>
        </div>
    </section>
    <!--Footer-->
    <footer id="footer" class="pt-3 px-3 pb-1 
   ">
        <div class="container-fluid">
            <p>Direccion: C/Ancora <span>|</span> <span>Redes sociales:</span> <a href="" target="_blank"
                    class="badge social twitter"><i class="bi bi-twitter fs-5"></a></i>
                <a href="" target="_blank" class="badge social instagram"> <i class="bi bi-instagram fs-5"></a></i>
                <a href="" target="_blank" class="badge social facebook"> <i
                        class="bi bi-facebook fs-5"></a></i><span>|</span> Contacto: <span> Correo:ANC@gmail.com</span>
                <span>|</span><span> Telefono:622536895</span>
            </p>
            </p>
        </div>
    </footer>
</body>

</html>