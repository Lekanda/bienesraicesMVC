<main class="contenedor seccion">
        <h1>Registrar Vendedor</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <!-- Errores -->
        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?> 

        <!-- Formulario -->
        <form method="POST" class="formulario" action="/vendedores/crear" enctype="multipart/form-data">
            <?php include '/laragon/www/bienesraicesMVC/includes/templates/formulario_vendedores.php' ?>
            <input type="submit" value="Crear Vendedor" class="boton boton-verde">
        </form>
</main>