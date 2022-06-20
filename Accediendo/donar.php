<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&family=Marcellus+SC&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/diseño.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donar</title>
</head>

<body>
    <!--Bloque-Cabecera-->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <div class="container">
            <a href="../Accediendo/index.php" class="navbar-brand"><img class="imagen" src="../img/logo.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        <a href="" class="nav-link active" aria-current="page">Editar
                            perfil</a>
                    </li>
                    <li class="nav-item">
                            <a href="../Accediendo/adoptar.php" class="nav-link active" aria-current="page">Adoptar</a>
                        </li>
                    <li class="nav-item">
                            <a href="../Accediendo/tienda.php" class="nav-link active" aria-current="page">Tienda</a>
                        </li>
                    <li class="nav-item">
                        <a href="../Accediendo/conocenos.php" class="nav-link active" aria-current="page">Conocenos</a>
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
    <!--Bloque-texto donar-->
    <section id="title-enroll">
        <div class="jumbotron pb-2 text-center">
            <div class="container-fluid">
                <h1 class="letrasdonaciones">AYUDA CON TUS DONACIONES</h1>
                <p>Aporta tu granito de arena para <strong>mejorar</strong> la vida de estos peluditos
                </p>
                <img src="../img/logo.png">
                <p class="text-center"><strong> ¡GRACIAS POR DEFENDER A LOS ANIMALES!</p></strong>
            </div>
        </div>
    </section>
    <section>
        <div class="accordion accordion-flush d-flex justify-content-center pb-5" id="accordionFlushExample">
            <div class="accordion-item w-75">
                <h2>Preguntas frecuentes</h2>
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        ¿Por qué es importante donar?
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body ">
                        <p class="list-group-item">Gracias a los donativos los
                            animales pueden convivir en un espacio óptimo y en unas calidades de vida adecuadas. Todo
                            esto no sería posible sin las donaciones</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            ¿Dónde destinaremos tus donaciones?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse titulo"
                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p class="list-group-item">El 100% de las donaciones
                                se destina para los animales: compra de comida, mejora de instalaciones, el pago de
                                tratamientos médicos necesarios...</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                ¿De qué otras formas puedo ayudar?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p class="list-group-item">Si no quiere o no
                                    puedes aportar un donativo económico existen otras formas de ayudar como presentarse
                                    voluntario para pasear perros, jugar con ellos para que no se sientan solos...
                                    ¡Cualquier gesto ayuda!</p>
                            </div>
                        </div>
                    </div>
                </div> <button type="submit" class="btn  btn-success btn-block col-12 mt-3"> <a
                        class="decoracionbotones" href="https://www.paypal.com/myaccount/transfer/homepage"
                        target="_blank">Donar</a></button>

                <section id="what-learn">
                    <div class="container">
                        <div class="row">
                            <p class="lead mt-2"><strong>*Las donaciones se realizarán a través de
                                    Paypal</strong></span>
                            <p class="lead mt-3">Le informamos que los datos que voluntariamente nos proporcione serán
                                tratados por ANC con la finalidad de dar respuesta a su
                                solicitud y gestionar su colaboración. Sus datos no serán cedidos a terceros, salvo
                                cuando sea indispensable para la prestación del servicio u obligaciones legales. </p>
                            </p>

                        </div>
                    </div>
                </section>

            </div>

    </section>
    <!--Footer-->
    <footer id="footer" class="pt-3 px-3 pb-1 ">
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