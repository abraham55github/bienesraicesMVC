<main class="contenedor">
    <h1>Actualizar vendedor</h1>

    <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include __DIR__ . '/formularios.php';   ?>

        <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
    </form>
</main>
