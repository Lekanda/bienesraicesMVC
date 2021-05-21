<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>

    <?php if ($mensaje) { ?>
           <p class='alerta exito'> <?php echo $mensaje ?></p>
    <?php }?>

    <picture>
        <source srcset="http://localhost/bienesraicesMVC/public/build/img/destacada3.webp" type="image/webp">
        <source srcset="http://localhost/bienesraicesMVC/public/build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="http://localhost/bienesraicesMVC/public/build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>

    <h2 data-cy="heading-formulario">Llene el formulario de Contacto</h2>

    <form class="formulario" action="http://localhost/bienesraicesMVC/public/index.php/contacto" method="POST">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input data-cy="input-nombre" type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" >

            <label for="mensaje">Mensaje:</label>
            <textarea data-cy="input-mensaje" id="mensaje" name="contacto[mensaje]" ></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select data-cy="input-opciones" id="opciones" name="contacto[tipo]" >
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input data-cy="input-presupuesto" type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]" >

        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <p>Como desea ser contactado</p>

            <div class="forma-contacto">
            <!-- El name en el radius select se pone el mismo,value define que se manda -->
                <label for="contactar-telefono">Teléfono</label>
                <input data-cy="forma-contacto" type="radio" value="Telefono" id="contactar-telefono" name="contacto[contacto]" >

                <label for="contactar-email">E-mail</label>
                <input data-cy="forma-contacto" type="radio" value="Email" id="contactar-email" name="contacto[contacto]" >
            </div>

            <div id="contacto"></div>


        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>