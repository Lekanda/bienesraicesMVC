    <main class="contenedor seccion">
        <h1>Registrar Vendedor</h1>

        <a href="/bienesraicesMVC/public/index.php/admin" class="boton boton-verde">Volver</a>

        <!-- Errores -->
        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?> 

        <!-- Formulario -->
        <form method="POST" class="formulario" action="/bienesraicesMVC/public/index.php/vendedores/crear">
            <?php include  __DIR__ . '/formulario.php' ?>
            <input type="submit" value="Crear Vendedor" class="boton boton-verde">
        </form>
    </main>
