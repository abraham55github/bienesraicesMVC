<?php  ?>
<main class="contenedor">
        <h1>Administrador de Bienes Raices</h1>

        <?php
            if($resultado){
                $mensaje = mostrarMensaje( intval($resultado));
                if($mensaje){ ?>
                    <p class="alerta exito"><?php echo s($mensaje); ?></p>
                <?php } 
                
            }
            ?>

        <a href="/propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
        <a href="/bienesraicesPOO/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo Vendedor</a>

        <!-- PROPIEDADES  -->
        <h2>Propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>IMAGEN</th>
                    <th>PRECIO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados -->
                <?php foreach($propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="../imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id?>">
            
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>
     