<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&family=Marcellus+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/diseño.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptar</title>
</head>

<body class="bodyperro">
    <?php require_once("../Php/Metodos_Mascotas.php");
    ?>

    <!--Bloque-Cabecera-->
    <header>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
            <div class="container">
                <a href="../Accediendo/index.php" class="navbar-brand"><img class="imagen" src="../img/logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <span class="nav-link active" id="bordenombre">
                                <?php include_once("../Php/Clase_Usuario.php");
                                session_start();
                                if ($_SESSION["usuario"] == null) {
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
                            <a href="../Accediendo/conocenos.php" class="nav-link active" aria-current="page">Conocenos</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Accediendo/donar.php" class="nav-link active" aria-current="page">Donar</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Php/Cerrar_Sesion.php" class="nav-link active" aria-current="page"><i class="bi bi-box-arrow-right  iconosalir"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="d-flex p-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <?php if (isset($_GET["Adopcion_Pendiente"])) {
                    echo " <span class='text-success mt-4  peticionadoptar'>La adopcion de " . $_SESSION['Mascota_Pendiente'] . " esta pendiente,un administrador se pondrá en contacto con usted en los próximos días para realizar una entrevista de evaluación</span>";
                } ?>
                <h1 class="centraradoptaperros pb-5 pt-3">Adopta una mascota</h1>

                <?php
                $mascota = Metodos_Mascotas::get_Mascotas_Adoptar();
                $searchString = ",";
                $replaceString = "";
                $searchespacio = " ";
                $replaceespacio = "";
                foreach ($mascota as $key => $value) {
                   $quitarcomasyespacios=str_replace($searchString,$replaceString,$value->getCaracter());
                ?>
                    <!--Ventana Modal de mascotas-->
                    <div class="modal fade" id="<?=str_replace($searchespacio,$replaceespacio,$quitarcomasyespacios)?>">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header d-flex modalperroscenter">
                                    <img class="modalperros" src="../img/<?= $value->getImg() ?>">
                                    </a>
                                </div>
                                <div class="modal-bodyresponsive">
                                    <p><strong>Nombre:</strong><?= $value->getNombre() ?></p>
                                    <p><strong>Raza:</strong> <?= $value->getRaza() ?></p>
                                    <p><strong>Tamaño:</strong><?= $value->getTamaño() ?></p>
                                    <p><strong>Edad:</strong><?= $value->getEdad() ?></p>
                                    <p><strong>Sexo:</strong><?= $value->getSexo() ?></p>
                                    <p><strong>Carácter:</strong><?= $value->getCaracter() ?></p>
                                    <p><strong>¿Ha convivido con otros animales?: </strong><?= $value->getConvivencia() ?></p>
                                </div>
                                <div class="modal-footerModificado">
                                    <a href="../Accediendo/adoptar.php" class="btn  btn-success btn-block col-12 decoracionbotones">Volver</a>
                                    <form action="../Php/Adoptar_Pendiente.php" method="post">
                                        <input type='hidden' name='id' value="<?= $value->getId() ?>">
                                        <button type="submit" class="btn  btn-success btn-block col-12 decoracionbotones mt-2">Adoptar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-sm-4 mb-4  ">
                        <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#<?=str_replace($searchespacio,$replaceespacio,$quitarcomasyespacios) ?>" href="#">
                            <img class="imagenesperrosadoptar" src="../img/<?= $value->getImg() ?>"></a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <div class="marginbotadoptar">
        <!--Footer-->
        <footer id="footer" class="pt-3 px-3 pb-1 fixed-bottom">
            <div class="container-fluid">
                <p>Direccion: C/Ancora <span>|</span> <span>Redes sociales:</span> <a href="" target="_blank" class="badge social twitter"><i class="bi bi-twitter fs-5"></a></i>
                    <a href="" target="_blank" class="badge social instagram"> <i class="bi bi-instagram fs-5"></a></i>
                    <a href="" target="_blank" class="badge social facebook"> <i class="bi bi-facebook fs-5"></a></i><span>|</span> Contacto: <span>
                        Correo:ANC@gmail.com</span>
                    <span>|</span><span> Telefono:622536895</span>
                </p>
            </div>
    </div>
    </footer>
</body>

</html>