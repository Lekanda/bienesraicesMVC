<?php 
    // Para cerrar la conexion de autenticacion. 1º traer el $_SESSION a la pantalla donde ponemos el boton de cerrar sesion.
    if (!isset($_SESSION)) {
        session_start();
    }
    // var_dump($_SESSION);
    $auth=$_SESSION['login'] ?? false;
    // var_dump($auth);

    if (!isset($inicio)) {
        $inicio = false;
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="http://localhost/bienesraicesMVC/public/build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : '';?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraicesMVC/public/index.php">
                    <img src="http://localhost/bienesraicesMVC/public/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="http://localhost/bienesraicesMVC/public/build/img/barras.svg" alt="icono menu responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="http://localhost/bienesraicesMVC/public/build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/bienesraicesMVC/public/index.php/nosotros">Nosotros</a>
                        <a href="/bienesraicesMVC/public/index.php/propiedades">Anuncios</a>
                        <a href="/bienesraicesMVC/public/index.php/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($auth) : ?>
                            <a href="/cerrar-sesion">Cerrar Sesion</a>
                        <?php else : ?>
                            <a href="/login.php">Login</a>
                        <?php endif ?>
                    </nav>
                </div>
                
            </div> <!--.barra-->

            <!-- <?php echo $inicio ? "<h1>Venta de Casas De Lujo y Apartamentos Exclusivos</h1>" : ''; ?> -->

        </div>
    </header>


    <?php echo $contenido; ?>



    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>
    <script src="http://localhost/bienesraicesMVC/public/build/js/bundle.min.js"></script>
</body>
</html>