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
    <script src="../js/Validar_Mascotas.js"></script>
    <script src="../js/SeleccionarTamaño_Sexo_Raza.js"></script>
    <title>Editar mascota</title>
</head>

<body class="bodyfondo">
    <!--Bloque-Cabecera-->
    <header>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
            <div class="container">
                <a href="../Administrador/Administracion.php" class="navbar-brand"><img class="imagen" src="../img/logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <span class="nav-link active" id="bordenombre">
                                <?php include_once("../Php/Clase_Usuario.php");
                                include_once("../Php/Metodos_Usuario.php");
                                include_once("../Php/Metodos_Mascotas.php");
                                session_start();
                                if ($_SESSION["usuario"] == null) {
                                    header("location:../index.php");
                                }
                                if ($_SESSION["usuario"]->getAdministrador() == 0) {
                                    header("location:../index.php");
                                }
                                $usu =  $_SESSION["usuario"]->getUsuario();
                                echo  $usu;
                               $nombre=$_SESSION["mascotamodificar"]->getNombre();
                               $raza=$_SESSION["mascotamodificar"]->getRaza();
                               $tamano=$_SESSION["mascotamodificar"]->getTamaño();
                               $edad=$_SESSION["mascotamodificar"]->getEdad();
                               $sexo=$_SESSION["mascotamodificar"]->getSexo();
                               $caracter=$_SESSION["mascotamodificar"]->getCaracter();
                               $convivencia=$_SESSION["mascotamodificar"]->getConvivencia();

                                ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="../Administrador/administrarUsuarios.php" class="nav-link active" aria-current="page">Editar
                                usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Administrador/administrarMascotas.php" class="nav-link active" aria-current="page">Editar mascotas</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Administrador/administrarProductos.php" class="nav-link active" aria-current="page">Editar productos</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Php/Cerrar_Sesion.php" class="nav-link active" aria-current="page"><i class="bi bi-box-arrow-right  iconosalir"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section>
            <div class="jumbotron pt-5">
                <div class="container contenedorletras">
                    <h1>Editar una mascota</h1>
                    <p>Aqui podras editar a una mascota
                    </p>
                </div>
            </div>
        </section>
        <section class="wrap" id="discussions">
            <div class="container pt-4">
                <div class="row justify-content-center">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="modal-body borde">
                            <form action="../Php/Modificar_Mascota.php" method="post" enctype="multipart/form-data">
                                <div class="datosbasicos">
                                    <p>Datos basicos</p>
                                    <div class="form-group pt-1">
                                        <label for="inputnombre" title="Obligatorio">Nombre*</label>
                                        <input type="text" class="form-control" id="nombre" name="inputnombre" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,30}" value="<?php echo $nombre?>" placeholder="Leo" required>
                                        <p id="ErrorNombre" class="letrasvalidacion"></p>
                                        <?php if (isset($_GET["error"])) {
                                            echo "<span class='text-danger mt-4 error'>La mascota no se puede modificar </span>    
                                        <script>FocusUsuario()</script>";
                                        } ?>
                                    </div>
                                    <div class="form-group mb-2">
                                        <span title="Obligatorio">Raza*</span>
                                        <select name="Raza" id="Raza" class="CampoDesplegable">
                                            <optgroup label="Perros">
                                                <option selected value="" disabled>Elige una opción</option>
                                                <option>Bulldog</option>
                                                <option>Labrador</option>
                                                <option>Pastor aleman</option>
                                                <option>Caniche</option>
                                                <option>Chihuahua</option>
                                                <option>Border collie</option>
                                                <option>Husky siberiano</option>
                                                <option>Pomerania</option>
                                                <option>Boston terrier</option>
                                                <option>Doberman</option>
                                                <option>Yorkshire terrier</option>
                                                <option>Mestizo</option>
                                                <option>Otro</option>
                                            </optgroup>
                                            <optgroup label="Gatos">
                                                <option>Gato persa</option>
                                                <option>Maine coon</option>
                                                <option>British shorkthair</option>
                                                <option>Bengala</option>
                                                <option>Siberiano</option>
                                                <option>Chartreux</option>
                                                <option>Abisinio</option>
                                                <option>Bombay</option>
                                                <option>Curl americano</option>
                                                <option>Toyger</option>
                                                <option>Singapura</option>
                                                <option>Toyger</option>                                           
                                                 <option>Otro</option>
                                            </optgroup> 
                                            <?php echo "<script>seleccionarRaza('$raza');</script>"; ?>
                                        </select>
                                        <p id="ErrorRaza" class="letrasvalidacion"></p>
                                        <div class="form-group mb-2" id="OptionOtro">
                                        <label for="inputraza" title="Obligatorio">Otro*</label>
                                        <input type="text" class="form-control" id="raza" name="inputraza" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,30}">      
                                    </div>   
                                    <p id="ErrorRaza2" class="letrasvalidacion"></p>
                                    </div>
                                    <div class="form-group mb-2">
                                        <span title="Obligatorio">Tamaño*</span>
                                        <select name="Tamaño" id="Tamaño" class="CampoDesplegable">
                                            <optgroup label="Tamaño">
                                                <option selected value="" disabled>Elige una opción</option>
                                                <option>Grande</option>
                                                <option>Mediano</option>
                                                <option>Pequeño</option>
                                            </optgroup>
                                            <?php echo "<script>seleccionarTamano('$tamano');</script>"; ?>
                                        </select>
                                        <p id="ErrorTamaño" class="letrasvalidacion"></p>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="inputedad" title="Obligatorio">Edad*</label>
                                        <input type="number" class="form-control" id="edad" name="inputedad" min="0" max="20" value="<?php echo $edad?>" placeholder="2" required>
                                        <p id="ErrorEdad" class="letrasvalidacion"></p>
                                    </div>
                                    <div class="form-group mb-2">
                                        <span title="Obligatorio">Sexo*</span>
                                        <select name="Sexo" id="Sexo" class="CampoDesplegable">
                                            <optgroup label="Sexo">
                                                <option selected value="" disabled>Elige una opción</option>
                                                <option>Masculino</option>
                                                <option>Femenino</option>
                                            </optgroup>
                                            <?php echo "<script>seleccionarSexo('$sexo');</script>"; ?>
                                        </select>
                                        <p id="ErrorSexo" class="letrasvalidacion"></p>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="inputcaracter" title="Obligatorio">Caracter*</label>
                                        <input type="text" class="form-control" id="caracter" name="inputcaracter" pattern="[^\s][,a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[,a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{3,255}" value="<?php echo $caracter?>" placeholder="Es un perro muy amigable" required>
                                        <p id="ErrorCaracter" class="letrasvalidacion"></p>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="inputconvivencia" title="Obligatorio">Convivencia*</label>
                                        <input type="text" class="form-control" id="convivencia" name="inputconvivencia" pattern="[^\s][,a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[,a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{0,255}" value="<?php echo $convivencia?>" placeholder="Convive tanto con gatos como con perros"  required>
                                        <p id="ErrorConvivencia" class="letrasvalidacion"></p>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input class="formato" type="file" id="inputimagen" name="inputimagen" />
                                        <p id="ErrorImagen" class="letrasvalidacion"></p>
                                    </div>
                                    <div class="form-group mb-2 pt-2">
                                        <button type="submit" class="btn  btn-success btn-block" id="enviar">Modificar</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
</body>
<!--Footer-->
<footer id="footer" class="pt-3 px-3 pb-1 ">
    <div class="container-fluid">
        <p>Direccion: C/Ancora <span>|</span> <span>Redes sociales:</span> <a href="" target="_blank" class="badge social twitter"><i class="bi bi-twitter fs-5"></a></i>
            <a href="" target="_blank" class="badge social instagram"> <i class="bi bi-instagram fs-5"></a></i>
            <a href="" target="_blank" class="badge social facebook"> <i class="bi bi-facebook fs-5"></a></i><span>|</span> Contacto: <span> Correo:ANC@gmail.com</span>
            <span>|</span><span> Telefono:622536895</span>
        </p>
        </p>
    </div>
</footer>

</html>