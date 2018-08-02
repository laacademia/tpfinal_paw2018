<?php 

namespace App\controllers;
//include($_SERVER['PATH_BASE'] . '/3ros/phpmailer/class.phpmailer.php');
//include($_SERVER['PATH_BASE'] . '/3ros/phpmailer/class.smtp.php');
//require_once('PHPMailer-master/class.smtp.php');

//echo "salslaks ".$_SERVER['PATH_BASE'] . '/3ros/PHPMailer/_lib/class.phpmailer.php';
class MensajeController extends  \core\Controller
{	
      public $useLayout = false;
      	
	function actionInicio(){
		return $this->render('inicio',array('title'=>'Formulario de Contacto'));		
	}
        function actionEnviarmensaje(){
            $mensaje = $this->getModel();
            //print_r($_REQUEST);
		if(isset($_REQUEST['mail'])) {
                    $mensaje->add($_REQUEST);		
                }
		$respuesta = array('status'=>'ok'); 
                return json_encode($respuesta);
		//return $this->actionInicio();
            //echo "viene aca!!!!!";
            
            //$mail = new \PHPMailer();
            //var_dump($mail);
            //$body ="sarasa";
            /*
            $correo = new \PHPMailer();
            $correo->IsSMTP();
            $correo->SMTPAuth = true;
            $correo->SMTPSecure = 'tls';
            $correo->Host = "smtp.office365.com";
            $correo->Port = 587;
            $correo->Username   = "******";//tu corrreo
            $correo->Password   = "**********";// tu clave
            //$correo->SetFrom("*******", "Mi Codigo PHP");//tu corrreo
            $correo->AddAddress("hector58472@yahoo.es", "Jorge");//correo destino
            $correo->Subject = "Mi primero correo con PHPMailer";//asunto
            $correo->MsgHTML("HOLA COMO ESTAS <strong>HTML</strong>");//mensaje o cupor del correo

            if(!$correo->Send()) {
              echo "Hubo un error: " . $correo->ErrorInfo;
            } else {
              echo "Mensaje enviado con exito.";
            }*/
            /*$mail->IsSMTP();
            //Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
            // 0 = off (producción)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 2;
            //Ahora definimos gmail como servidor que aloja nuestro SMTP
            $mail->Host = 'smtp.gmail.com';
            //El puerto será el 587 ya que usamos encriptación TLS
            $mail->Port = 587;
            //Definmos la seguridad como TLS
            $mail->SMTPSecure = 'tls';
            //Tenemos que usar gmail autenticados, así que esto a TRUE
            $mail->SMTPAuth = true;
            //Definimos la cuenta que vamos a usar. Dirección completa de la misma
            $mail->Username   = "clau.reinaudi@gmail.com";
            $mail->Password   = "LoKe9921";
            //Definimos el remitente (dirección y, opcionalmente, nombre)
            $mail->SetFrom('tucuenta@gmail.com', 'Mi nombre');
            //Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
            //$mail->AddReplyTo('replyto@correoquesea.com','El de la réplica');
            //Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
            $mail->AddAddress('clau.reinaudi@gmail.com', 'El Destinatario');
            //Definimos el tema del email
            $mail->Subject = 'Esto es un correo de prueba';
            //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
            $mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
            //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
            $mail->AltBody = 'This is a plain-text message body';
            //Enviamos el correo
            if(!$mail->Send()) {
              echo "Error: " . $mail->ErrorInfo;
            } else {
              echo "Enviado!";
            }*/
        }
}