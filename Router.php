<?php 
    
    namespace MVC;
    class Router {

        public $rutasGet = [];
        public $rutasPost = [];

        public function get( $url, $fn ) {
            $this->rutasGet[$url] = $fn;
        }
        public function post( $url, $fn ) {
            $this->rutasPost[$url] = $fn;
        }

        public function comprobarRutas(){

            session_start();

            $auth = $_SESSION['login'] ?? null;

            //arreglo de rutas protegidas..
            $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];

            $urlActual = $_SERVER['PATH_INFO'] ?? '/';
            $metodo = $_SERVER['REQUEST_METHOD'];

            if($metodo === 'GET'){
                $fn = $this->rutasGet[$urlActual] ?? null;
            } else {
                $fn = $this->rutasPost[$urlActual] ?? null;
            }

            if(in_array($urlActual, $rutas_protegidas) && !$auth){
               header('Location: /');
                
            }

            if($fn){
                //LA URL EXISTE Y HAY UNA FUNCION ASOCIADa
                call_user_func($fn, $this);
            }else{
                echo 'Pagina no encontrada';
            }

        }

        public function render($view , $datos = []){
            foreach($datos as $key => $value){
            $$key = $value;
            }
            ob_start(); //almacenamiento en memoria durante un momento...
            include __DIR__ ."/views/$view.php";

            $contenido = ob_get_clean(); //limpia el buffer

            include __DIR__ . "/views/layout.php";
        }

    }