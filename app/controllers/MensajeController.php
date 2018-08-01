<?php 

namespace App\controllers;
include($_SERVER['PATH_BASE'] . '/3ros/PHPMailer/_lib/class.phpmailer.php');
//echo "salslaks ".$_SERVER['PATH_BASE'] . '/3ros/PHPMailer/_lib/class.phpmailer.php';
class MensajeController extends  \core\Controller
{	
      public $useLayout = false;
      	
	function actionInicio(){
		return $this->render('inicio',array('title'=>'Formulario de Contacto'));		
	}
        function actionEnviarmensaje(){
            echo "viene aca!!!!!";
            
            $mail = new \PHPMailer();
            var_dump($mail);
            $body ="sarasa";
            //Esta línea la he tenido que comentar
            //porque si la pongo me deja el $body vacío
            // $body = preg_replace('/[]/i','',$body);

            //defino el email y nombre del remitente del mensaje
            //$mail->SetFrom('email@remitente.com', 'Nombre completo');

            //defino la dirección de email de "reply", a la que responder los mensajes
            //Obs: es bueno dejar la misma dirección que el From, para no caer en spam
            $mail->AddReplyTo("email@remitente.com","Nombre Completo");
            //Defino la dirección de correo a la que se envía el mensaje
            $address = "clau.reinaudi@gmail.com";
            //la añado a la clase, indicando el nombre de la persona destinatario
            $mail->AddAddress($address, "Nombre completo");

            //Añado un asunto al mensaje
            //$mail->Subject( "Envío de email con PHPMailer en PHP");

            //Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
            //$mail->AltBody ( "Cuerpo alternativo del mensaje");

            //inserto el texto del mensaje en formato HTML
            $mail->MsgHTML($body);

            //asigno un archivo adjunto al mensaje
            //$mail->AddAttachment("ruta/archivo_adjunto.gif");

            //envío el mensaje, comprobando si se envió correctamente
            if(!$mail->Send()) {
            echo "Error al enviar el mensaje: " . $mail->ErrorInfo;
            } else {
            echo "Mensaje enviado!!";
            }
        }
}