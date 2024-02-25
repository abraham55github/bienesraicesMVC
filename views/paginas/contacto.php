
<main class="contenedor">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="webp">
            <source srcset="build/img/destacada3.jpg" type="jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Texto entrada blgo">
        </picture>

        <h2>Llene el formulario de contacto</h2>
        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Informacion personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" >


                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="contacto[mensaje]" ></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <label for="opciones">Vende o Compra: </label>
                <select id="opciones" name="contacto[tipo]" >
                    <option value="" disabled selected>Seleccione</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" >
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" >

                    <label for="contactar-email">Email</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" >
                    
                </div>

                <div id="contacto"></div>


            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
            
        </form>
    </main>
    