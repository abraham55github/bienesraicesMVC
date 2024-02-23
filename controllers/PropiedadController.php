<?php

namespace Controllers;


use MVC\router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as image;


class PropiedadController {
    public static function index(Router $router) {

        $propiedades = Propiedad::all();
        //muestra un mensaje condicional
        $resultado = $_GET['resultado'] ?? null ;

        $router->render('propiedades/admin', [
            'propiedades'=> $propiedades,
            'resultado'=> $resultado
        ]);

    }

    public static function crear(Router $router) {
       
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        //arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
       
            //crea una nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);
    
            /** SUBIDA DE ARCHIVOS **/
            //Generar nombre unico
            $nombreImagen = md5(uniqid(rand(), true)). ".jpg";
    
    
            // Setear la imagen
            //realiza un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
    
    
            //validar errores
            $errores = $propiedad->validar();
    
    
            //revisar el arreglo de errores
            if(empty($errores)){
    
                //crear carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
    
                //guardar imagen
                $image->save(CARPETA_IMAGENES . $nombreImagen);
    
                //guarda en la base de datos
                $propiedad->guardar();
    
            };
    
        } 

        $router->render('propiedades/crear', [
           'propiedad' => $propiedad,
           'vendedores' => $vendedores,
           'errores'=> $errores
        ]);
      
    }

    public static function actualizar() {
        echo 'actualizar';
    }

}