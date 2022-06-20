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
    <script src="../js/Validar_Productos.js"></script>
    <script src="../js/SeleccionarProveedor.js"></script>
    <title>editar producto</title>
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
                                include_once("../Php/Metodos_Proveedor.php");
                                include_once("../Php/Metodos_Productos.php");
                                session_start();
                                if ($_SESSION["usuario"] == null) {
                                    header("location:../index.php");
                                }
                                if ($_SESSION["usuario"]->getAdministrador() == 0) {
                                    header("location:../index.php");
                                }
                                $usu =  $_SESSION["usuario"]->getUsuario();
                                echo  $usu;
                                $imagen = $_SESSION["productmodificar"]->getImg();
                                $nombre = $_SESSION["productmodificar"]->getNombre();
                                $proveedor = $_SESSION["productmodificar"]->getProveedor_nombre();
                                $precio = $_SESSION["productmodificar"]->getPrecio();

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
                    <h1>Modificar un producto</h1>
                    <p>Aqui podras modificar un producto
                    </p>
                </div>
            </div>
        </section>
        <section class="wrap" id="discussions">
            <div class="container pt-4">
                <div class="row justify-content-center">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="modal-body borde">
                            <form action="../Php/Modificar_Producto.php" method="post" enctype="multipart/form-data">
                                <div class="datosdelproducto">
                                    <p>Datos del producto</p>
                                    <?php if (isset($_GET["error"])) {
                                        echo "<span class='text-danger mt-4 error'>El producto no se puede modificar </span>";
                                    } ?>
                                    <div class="form-group pt-1">
                                        <label for="inputnombre" title="Obligatorio">Nombre*</label>
                                        <input type="text" class="form-control" id="nombre" name="inputnombre" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{0,}+[,a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,30}" value="<?php echo $nombre ?>" placeholder="Correa" required>
                                        <p id="ErrorNombre" class="letrasvalidacion"></p>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="inputprecio" title="Obligatorio">Precio*</label>
                                        <input type="number" class="form-control" id="precio" name="inputprecio" step="0.01" value="<?php echo $precio ?>" placeholder="25,30" required>
                                        <p id="ErrorPrecio" class="letrasvalidacion"></p>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input class="formato" type="file" id="inputimagen" name="inputimagen" value="<?php echo $imagen ?>" />
                                        <p id="ErrorImagen" class="letrasvalidacion"></p>
                                    </div>

                                    <div class="form-group mb-2">
                                        <span title="Obligatorio">Proveedor*</span>
                                        <select name="Proveedor" id="Proveedor" class="CampoDesplegable">
                                            <optgroup label="Proveedor">
                                                <?php echo Metodos_Proveedor::getProveedores() ?>
                                            </optgroup>
                                            <?php echo "<script>seleccionarProveedor('$proveedor');</script>"; ?>
                                        </select>
                                        <p id="ErrorProveedor" class="letrasvalidacion"></p>
                                    </div>

                                </div>
                                <div class="form-group mb-4 pt-1 pb-5">
                                    <button type="submit" class="btn  btn-success btn-block" id="enviar">Modificar</button>
                                </div>
                        </div>

                        </form>

                    </div>
                </div>
            </div>
        </section>
</body>
<div class="marginbotAñadirYEditarmascota">
    <!--Footer-->
    <footer id="footer" class="pt-3 px-3 pb-1 fixed-bottom">
        <div class="container-fluid">
            <p>Direccion: C/Ancora <span>|</span> <span>Redes sociales:</span> <a href="" target="_blank" class="badge social twitter"><i class="bi bi-twitter fs-5"></a></i>
                <a href="" target="_blank" class="badge social instagram"> <i class="bi bi-instagram fs-5"></a></i>
                <a href="" target="_blank" class="badge social facebook"> <i class="bi bi-facebook fs-5"></a></i><span>|</span> Contacto: <span> Correo:ANC@gmail.com</span>
                <span>|</span><span> Telefono:622536895</span>
            </p>
        </div>
    </footer>
</div>

</html>