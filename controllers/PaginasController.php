<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';








class PaginasController {

    public static function index (Router $router) {

        $propiedades = Propiedad::get(3);
        $inicio = true;


        $router->render('paginas/index',[
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }


    public static function nosotros (Router $router) {
        $router->render('paginas/nosotros',[]);
    }


    public static function propiedades (Router $router) {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades',[
            'propiedades' => $propiedades
        ]);
        
    }

    public static function propiedad (Router $router) {
        // debuguear($_GET);

        $id = validarORedireccionar('/propiedades');
        
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad',[
            'propiedad' => $propiedad
        ]);
    }


    public static function blog (Router $router) {
        $router->render('paginas/blog');
    }


    public static function entrada (Router $router) {
        $router->render('paginas/entrada');
    }


    public static function contacto (Router $router) {

        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST);

            $respuestas = $_POST['contacto'];

            //Load Composer's autoloader
            require '../vendor/autoload.php';
            
            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();


            // Configurar SMTP
            $mail->isSMTP();//Send using SMTP
            $mail->Host       = 'smtp.mailtrap.io';   //Set the SMTP server to send through
            $mail->SMTPAuth   = true;  //Enable SMTP authentication
            $mail->Username   = '0aa2429c90a0f5';//SMTP username
            $mail->Password   = '3f8880e6995f75'; //SMTP password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;//Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 2525; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


            // Configurar el contenido del mail.
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'Bienes Raices');//Add a recipient
            $mail->Subject = 'Tienes un nuevo Mensaje';

            // Contenido
            $mail->isHTML(true); //Set email format to HTML
            $mail->CharSet = 'UTF-8';


            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            $contenido .= '<p>Contacto preferido: ' . $respuestas['contacto'] . '</p>';
            // Enviar de forma condicional algunos datos en el mail de contacto.
            if ($respuestas['contacto'] === 'Telefono') {
                $contenido .= '<p>Eligio ser contactado por Telefono:</p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha Contacto: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora Cita: ' . $respuestas['hora'] . '</p>';

            } else {
                // Es un Email , solo añadir campo email
                $contenido .= '<p>Eligio ser contactado por Email:</p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio o Presupuesto €: ' . $respuestas['precio'] . '</p>';
            $contenido .= '</html>';

            $mail->Body =$contenido;
            $mail->AltBody = 'Texto alternativo sin HTML';

            // Enviar el email
            if ($mail->send()) {
                $mensaje = "Mensaje Enviado Correctamente";
            } else {
                $mensaje = "Mensaje Fallo al Enviarse";
            }
        }
        
        $router->render('paginas/contacto',[
            'mensaje' => $mensaje
        ]);
    }
    
}