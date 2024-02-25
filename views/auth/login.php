
<main class="contenedor seccion contenido-centrado" >
        <h1>Registro de autenticacion</h1>
        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>
        <form method="POST" class="formulario" action="/login">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-Mail</label>
                <input type="email" placeholder="Tu email" name="email" id="email" >

                <label for="password">Password</label>
                <input type="password" placeholder="Tu password" name="password" id="password" >

            </fieldset>
            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        </form>

    </main>