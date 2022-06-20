<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&family=Marcellus+SC&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <link rel="stylesheet" href="../css/diseño.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de usuarios</title>
</head>

<body class="bodyadmin">
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
                                session_start();
                                if ($_SESSION["usuario"] == null) {
                                    header("location:../index.php");
                                }
                                if ($_SESSION["usuario"]->getAdministrador() == 0) {
                                    header("location:../index.php");
                                }
                                $usu =  $_SESSION["usuario"]->getUsuario();
                                echo  $usu;


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
        <!--bloque:administracion-->
        <section class="wrap" id="admin-course">
            <div class="container">
                <h1>Administracion de los usuarios</h1>
                <p class="lead">Aqui podras añadir, editar y borrar usuarios</p>
                <?php if (isset($_GET["Usuario_Modificado"])) {
                    echo "<span class='text-success mt-4 usuariomodificado'>Usuario Modificado</span>";
                } ?>
                <?php if (isset($_GET["Usuario_Registrado"])) {
                    echo "<span class='text-success mt-4 usuariomodificado'>Usuario Registrado</span>";
                } ?>
                <?php if (isset($_GET["Usuario_Eliminado"])) {
                    echo "<span class='text-success mt-4 usuariomodificado'>El usuario " . $_SESSION['usuarioeliminado'] . " se ha eliminado</span>";
                } ?>
                <div class="row comentario">
                    <div class="col-sm-12  mt-2">
                        <a href="../Administrador/añadirUsuario.php" class='btn  btn-success btn-block col-12 mb-2'>Añadir usuario</a>
                        <!--MOSTRAR TODOS LOS USUARIOS-->
                        <?php
                        Metodos_Usuario::get_Usuarios();

                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!--Footer-->
        <div class="marginbotusu">
            <footer id="footer" class="pt-3 px-3 pb-1 mt-3 fixed-bottom">
                <div class="container-fluid">
                    <p>Direccion: C/Ancora <span>|</span> <span>Redes sociales:</span> <a href="" target="_blank" class="badge social twitter"><i class="bi bi-twitter fs-5"></a></i>
                        <a href="" target="_blank" class="badge social instagram"> <i class="bi bi-instagram fs-5"></a></i>
                        <a href="" target="_blank" class="badge social facebook"> <i class="bi bi-facebook fs-5"></a></i><span>|</span> Contacto: <span>
                            Correo:ANC@gmail.com</span>
                        <span>|</span><span> Telefono:622536895</span>
                    </p>
                    </p>
                </div>
            </footer>
        </div>
</body>

</html>