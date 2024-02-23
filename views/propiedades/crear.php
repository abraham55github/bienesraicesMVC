<main class="contenedor">
    <h1>Crear</h1>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <?php include __DIR__ . '/formularios.php';   ?>

        <input type="submit" value="Crear propiedad" class="boton boton-verde">
    </form>
</main>
