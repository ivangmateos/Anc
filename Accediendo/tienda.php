<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <link rel="stylesheet" href="../css/diseño.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
                <a href="../Accediendo/index.php" class="navbar-brand"><img class="imagen" src="../img/logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <span class="nav-link active" id="bordenombre">
                                <?php include_once("../Php/Clase_Usuario.php");
                                require_once("../Php/Funciones_Tienda.php");
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
    <?php if (isset($_GET["Carrito_Vacio"])) {
                    echo " <span class='text-danger mt-4 carritovacio'>El carrito esta vacio</span>";
                } ?>
    <!--Ventana modal carrito-->
    <div class="modal fade" id="modalcarrito">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container text-center border-bottom pb-4">

                        <h2 class="text-primary">Cesta de la compra</h2>
                    </div>
                    <div class="container p-4 border-bottom">
                        <?php
                        if (!sizeof($tienda->getCesta())) {
                        ?>
                            <p>Selecciona algun producto de nuestro catalogo</p>
                            <?php
                        } else {
                            foreach ($tienda->getCesta() as $producto) {
                            ?>
                                <p><?= $producto->getNombre(); ?>:&nbsp;<span class="text-primary"><?= $producto->getPrecio() ?>€</span></p>
                            <?php
                            }
                            ?>
                            <div class="container d-flex justify-content-between pt-5">
                                <div>
                                    <h3>TOTAL</h3>
                                </div>
                                <div class="text-primary fs-4">
                                    <?= $tienda->getPrecioTotal() ?>€
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="container-fluid mt-4 d-flex justify-content-between">
                            <form method="post">
                                <a href="../Accediendo/tienda.php" type="button" class="btn btn-primary"><i class="bi bi-box-arrow-right"></i></a>
                                <input type="hidden" name="vaciar" value="vaciar">
                                <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                            <form method="post">
                                <input type="hidden" name="pagar" value="pagar">
                                <button class="btn btn-primary">Pagar&nbsp;<i class="bi bi-wallet2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header>
    <a type="button" class="btn btn-primary bi bi-cart4 floatcesta carrito" aria-current="page" data-bs-toggle="modal" data-bs-target="#modalcarrito" href="#"></a>
    <section class="d-flex p-4">
        <div class="container-fluid">
            <div class="row justify-content-center ">
                <?php
                foreach ($tienda->getProductos() as $key => $value) {
                ?>
                    <div class=" col-6 card mb-4  " style="width: 18rem;">
                        <img class="imagenestienda" src="../img/<?= $value->getImg() ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value->getNombre() ?></h5>
                            <p class="card-text" style="width: 300px;">Proveedor: <span class="text-primary"><?= $value->getProveedor_nombre() ?></span></p>
                            <p class="card-text">Precio: <span class="text-primary"><?= $value->getPrecio() ?>€</span></p>
                            <form method="post">
                                <input type="hidden" name="producto" value="<?= $value->getId() ?>">
                                <button class="btn btn-primary">Agregar a la cesta</button>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="container-fluid tiendaresponsive cestatienda">
            <div class="container-fluid mt-5 border border-2 rounded border-light shadow p-4 ">
                <div class="container text-center border-bottom pb-4">

                    <h2 class="text-primary">Cesta de la compra</h2>
                </div>
                <div class="container p-4 border-bottom ">
                    <?php
                    if (!sizeof($tienda->getCesta())) {
                    ?>
                        <p>Selecciona algun producto de nuestro catalogo</p>
                        <?php
                    } else {
                        foreach ($tienda->getCesta() as $value) {
                        ?>
                            <p><?= $value->getNombre(); ?>:&nbsp;<span class="text-primary"><?= $value->getPrecio() ?>€</span></p>
                        <?php
                        }
                        ?>
                        <div class="container d-flex justify-content-between pt-5">
                            <div>
                                <h3>TOTAL</h3>
                            </div>
                            <div class="text-primary fs-4">
                                <?= $tienda->getPrecioTotal() ?>€
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="container-fluid mt-4 d-flex justify-content-between ">
                    <form method="post">
                        <input type="hidden" name="vaciar" value="vaciar">
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                    <form method="post">
                        <input type="hidden" name="pagar" value="pagar">
                        <button class="btn btn-primary">Pagar&nbsp;<i class="bi bi-wallet2"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="marginbottienda">
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