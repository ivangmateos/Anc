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
    <script src="../js/Validacion_Registro_EditarPerfil.js"></script>
    <script src="../js/Focus_Usuario_Registro.js"></script>
    <title>Registro</title>
</head>

<body class="bodyregistro">
    <!--Bloque-Cabecera-->
    <header>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
            <div class="container">
                <a href="../index.php" class="navbar-brand"><img class="imagen" src="../img/logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                            <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#modalLogin" href="#">Accede<span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="../Sinacceder/Registro.php" class="nav-link active" aria-current="page">Registrate</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Sinacceder/adoptar.php" class="nav-link active" aria-current="page">Adoptar</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Sinacceder/conocenos.html" class="nav-link active" aria-current="page">Conocenos</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Sinacceder/donar.html" class="nav-link active" aria-current="page">Donar</a>
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
                        <form action="../Php/Login_Usuario.php" method="Post">
                            <div class="form-group">
                            <img class="imagen logo" src="../img/logo.png">
                                <label class="letrasennegro" for="inputUsuario">Usuario</label>
                                <input type="usuario" class="form-control" id="inputUsuario" name="usuario" placeholder="Escribe tu usuario" required>
                            </div>
                            <div class="form-group mb-2">
                                <label class="letrasennegro" for="inputPassword">Contraseña</label>
                                <input type="password" class="form-control" id="inputPassword" name="contrasena" placeholder="Escribe tu contraseña..." required>
                            </div>
                            <button type="submit" class="btn  btn-success btn-block col-12 decoracionbotones" id="iniciarsesion">Iniciar sesion</button>
                            <hr>
                            <a href="../Sinacceder/Registro.php" class="btn  btn-success btn-block col-12 decoracionbotones">Registrate</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="jumbotron pt-5">
            <div class="container contenedorletras">
                <h1>Registro</h1>
                <p>Aqui podras registrarte para poder acceder a mas contenidos de nuestra pagina
                </p>
            </div>
        </div>
    </section>
    <section class="wrap" id="discussions">
        <div class="container pt-4">
            <div class="row justify-content-center">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="modal-body borde">
                        <form action="../Php/Registro_Usuario.php" method="post">
                            <div class="datosbasicos">
                                <p>Datos basicos</p>
                                <div class="form-group pt-1">
                                    <label for="inputnombre" title="Obligatorio">Nombre*</label>
                                    <input type="text" class="form-control" id="nombre" name="inputnombre" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,30}" placeholder="Leo" required>
                                    <p id="ErrorNombre" class="letrasvalidacion"></p>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="inputapellidos" title="Obligatorio">Apellidos*</label>
                                    <input type="text" class="form-control" id="apellidos" name="inputapellidos" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{4,30}" placeholder="Gomez Mateos" required>
                                    <p id="ErrorApellidos" class="letrasvalidacion"></p>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="inputedad" title="Obligatorio">Edad*</label>
                                    <input type="number" class="form-control" id="edad" name="inputedad" min="18" max="99" placeholder="18" required>
                                    <p id="ErrorEdad" class="letrasvalidacion"></p>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="inputausuario" title="Obligatorio">Usuario*</label>
                                    <input type="text" class="form-control" id="usuario" name="inputusuario" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,16}" placeholder="Leon" required>
                                    <p id="ErrorUsuario" class="letrasvalidacion"></p>
                                    <?php if (isset($_GET["error"])) {
                                        echo "<span class='text-danger mt-4 error'>El nombre de usuario ya existe </span>    
                                        <script>FocusUsuario()</script>";
                                    } ?>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="inputcontrasena" title="Obligatorio">Contraseña*</label>
                                    <input type="password" class="form-control" id="contrasena" name="inputcontrasena" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ@$!%?&.-¿¡∂ð ]+[a-zA-Zàáâäãåąčćęè@$!%?&.-¿¡éêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{3,16}" placeholder="Leon123?" required>
                                    <p id="ErrorContrasena" class="letrasvalidacion"></p>
                                </div>
                                <div class="form-group mb-2">
                                    <span title="Obligatorio">Provincia*</span>
                                    <select name="Provincia" id="Provincia" class="CampoDesplegable">
                                        <optgroup label="Provincia">
                                            <option selected value="" disabled>Elige una opción</option>
                                            <option>Sevilla</option>
                                            <option>Huelva</option>
                                            <option>Burgos</option>
                                            <option>Cordoba</option>
                                            <option>Granada</option>
                                            <option>Madrid</option>
                                            <option>Soria</option>
                                            <option>Zamora</option>
                                        </optgroup>
                                    </select>
                                    <p id="ErrorProvincia" class="letrasvalidacion"></p>
                                </div>
                            </div>

                            <div class="datosdecontacto">
                                <p>Datos de contacto</p>
                                <div class="form-group mb-2">
                                    <label for="inputemail" title="Obligatorio">Email*</label>
                                    <input type="email" class="form-control" id="email" name="inputemail" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" placeholder="Leon@gmail.com" required>
                                    <p id="ErrorEmail" class="letrasvalidacion"></p>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="inputtelefono" title="Obligatorio">Telefono*</label>
                                    <input type="text" class="form-control" id="telefono" name="inputtelefono" pattern="[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{3}" placeholder="125-255-255" required>
                                    <p id="ErrorTelefono" class="letrasvalidacion"></p>
                                </div>
                            </div>
                                <div class="form-group mb-2 pt-2">
                                    <button type="submit" class="btn  btn-success btn-block" id="enviar">Registrarse</button>
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