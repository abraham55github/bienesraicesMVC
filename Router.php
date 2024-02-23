<?php 
    
    namespace MVC;
    class router {

        public $rutasGet = [];
        public $rutasPost = [];

        public function get( $url, $fn ) {
            $this->rutasGet[$url] = $fn;
        }
        public function post( $url, $fn ) {
            $this->rutasPost[$url] = $fn;
        }

        public function comprobarRutas(){
            $urlActual = $_SERVER['PATH_INFO'] ?? '/';
            $metodo = $_SERVER['REQUEST_METHOD'];

            if($metodo === 'GET'){
                $fn = $this->rutasGet[$urlActual] ?? null;
            } else {
                $fn = $this->rutasPost[$urlActual] ?? null;
            }

            if($fn){
                //LA URL EXISTE Y HAY UNA FUNCION ASOCIADA


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