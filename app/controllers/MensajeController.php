<?php 

namespace App\controllers;
include($_SERVER['PATH_BASE'] . '/3ros/phpmailer/class.phpmailer.php');

//echo "salslaks ".$_SERVER['PATH_BASE'] . '/3ros/PHPMailer/_lib/class.phpmailer.php';
class MensajeController extends  \core\Controller
{	
      public $useLayout = false;
      	
	function actionInicio(){
            return $this->render('inicio',array('title'=>'Formulario de Contacto'));		
	}
        function actionEnviarmensaje(){
            ///////////////////////////
            $mensaje = $this->getModel();
            //print_r($_REQUEST);
            if(isset($_REQUEST['mail'])) {
                $mensaje->add($_REQUEST);		
            }
            $respuesta = array('status'=>'ok'); 
            return json_encode($respuesta);
            
            /*
            $mail = new \PHPMailer();
	    $mail->AddAddress('clau.reinaudi@gmail.com');
            // Recupero los parámetros        
            $smtp_host = 'smtp.gmail.com';
            $username  = 'clau.reinaudi@gmail.com';
            $port      = 465;
            $from      = $_REQUEST['mail']; //$this->s__datos_form['remitente']
            $fromName  = $_REQUEST['apellido'].', '.$_REQUEST['nombre'];
            $smtpsecure = 'ssl';
            $password  = 'pass';

            // Armo el mail    
            $mail->IsSMTP();
            $mail->SMTPSecure = trim($smtpsecure);
            $mail->SMTPAuth = true;						// set mailer to use SMTP
            $mail->Timeout  = 30;                
            $mail->Host     = trim($smtp_host);	        // specify main and backup server
            $mail->Port     = trim($port);
            $mail->Username = trim($username);	         // SMTP username            
            $mail->Password = trim($password);
            $mail->From     = trim($from);
            $mail->FromName = trim($fromName);            
            $mail->WordWrap = 50;					      // set word wrap to 50 characters
            $mail->IsHTML(true);							// set email format to HTML
            $mail->Subject  = 'Contacto Site';
            $mail->Body     = $_REQUEST['mensaje'];            
            //$mail->SMTPDebug  = 2;
            $mail->Send();
            echo $mail->Send();
            echo "PASA ";
            exit();
            //return ($mail->Send());    
            */
        }
}