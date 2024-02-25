<?php 

namespace Controllers;

use MVC\router;
use Model\Vendedor;

Class   VendedoresController{


    public static function crear(Router $router) {
        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //crear una nueva instanci
            $vendedor = new Vendedor($_POST['vendedor']);
    
            $errores = $vendedor->validar();
    
            if(empty($errores)) {
                $vendedor->guardar();
            }

        }

        $router->render('vendedores/crear', [
            'vendedor'=> $vendedor,
            'errores'=> $errores
        ]); 

    }
    public static function actualizar(Router $router) {
        $id = validarORedireccionar('/admin');
        
        $vendedor = Vendedor::find($id);
    
        // Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //asignar valores
            $args = $_POST['vendedor'];
    
            //Sincronizar la actualizacion
            $vendedor->sincronizar($args);
    
            //validar
            $errores = $vendedor->validar();
    
            if(empty($errores)) {
                $vendedor->guardar();
            }
    
        }
        $router->render('vendedores/actualizar', [
            'vendedor'=> $vendedor,
            'errores'=> $errores
        ]);
    }

    public static function eliminar() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //validar
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){

                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $propiedad = Vendedor::find($id);
                    $propiedad->eliminar();
                }
            }
        }

    }


}