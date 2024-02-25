<?php

namespace Controllers;

use MVC\router; 
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController{
    public static function index(router $router){

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('/paginas/index', [
            'propiedades'=> $propiedades,
            'inicio'=> $inicio
        ]);

    }
    public static function nosotros(router $router){

        $router->render('/paginas/nosotros');
    }
    public static function propiedades(router $router){

        $propiedades = Propiedad::all();

        $router->render('/paginas/propiedades', [
            'propiedades'=> $propiedades
        ]);
    }
    public static function propiedad(router $router){

        $id = validarORedireccionar('/propiedades');

        $propiedad = Propiedad::find($id);  

        $router->render('/paginas/propiedad', [
            'propiedad'=> $propiedad
        ]);
    }
    public static function blog(router $router){
        $router->render('/paginas/blog');
    }
    public static function entradaBlog(router $router){
        $router->render('/paginas/entradaBlog');
    }
    public static function contacto(router $router){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $respuestas = $_POST['contacto'];


            //crear una instancia de PHPMAILER
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '6263254cb89a22';
            $mail->Password = '345ec497101338';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //configurar contenido de mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //definir contenido
            $contenido = '<html>'; 
            $contenido .='<p>Tienes un nuevo mensaje </p> ';
            $contenido .='<p>Nombre: '. $respuestas['nombre'] .' </p> ';
            $contenido .='<p>Email: '. $respuestas['email'] .' </p> ';
            $contenido .='<p>Telefono: '. $respuestas['telefono'] .' </p> ';
            $contenido .='<p>Mensaje: '. $respuestas['mensaje'] .' </p> ';
            $contenido .='<p>Vende o Compra: '. $respuestas['tipo'] .' </p> ';
            $contenido .='<p>Precio o Presupuesto: $'. $respuestas['precio'] .' </p> ';
            $contenido .='<p>Prefiere ser contactado Por: '. $respuestas['contacto'] .' </p> ';
            $contenido .='<p>Fecha: '. $respuestas['fecha'] .' </p> ';
            $contenido .='<p>Hora: '. $respuestas['hora'] .' </p> ';
            


            $contenido .='</html>';


            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin Html';

           

            //enviar el mail
            if($mail->send()){
                echo "mensaje enviado correctamente";
            }else {
                echo "El mensaje no se pudo enviar...";
            }

        }

       $router->render('paginas/contacto', [

       ]);
    }

}