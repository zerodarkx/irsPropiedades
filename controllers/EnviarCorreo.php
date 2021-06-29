<?php
require './public/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EnviarCorreo{

    public function configuracion_creditotal(){
        $mail = new PHPMailer(true);
        //Enable SMTP debugging.
        // $mail->SMTPDebug = 3;
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();            
        //Set SMTP host name                          
        $mail->Host = "irspropiedades.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;
        $mail->Mailer = "smtp";
        //Provide username and password     
        $mail->Username = "noreply@irspropiedades.com";                 
        $mail->Password = "z8aL]@zMRcT@";                           
        // If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = 'ssl/tls';                    
        // Set TCP port to connect to
        $mail->Port = "25";
			
        $mail->From = "noreply@irspropiedades.com"; //quien lo manda
        $mail->FromName = "Sistema Irs Propiedades"; // nombre que sale en el mensaje

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        return $mail;
    }
    
    public function sendMail($data_correo = array()){
        
        $mail = $this->configuracion_creditotal();

        /////////////////////////////////////////////////////////////////////////
        // A QUIEN LE VAMOS A MANDAR EL CORREO CON COPIA AL EJECUTIVO
        $mail->addAddress($data_correo['correo_cliente']);
        // $mail->addAddress("ljofre@creditotal.cl"); //a quien se lo mandamos
        // $mail->addAddress("jellies@creditotal.cl"); //a quien se lo mandamos

        //COPIA OCULTA
        // $mail->addCC('julioelliesflores@gmail.com');
        // $mail->addCC('luisjofre@gmail.com');

        //CARGAR UN ARCHIVO EN EL CORREO
        //$mail->addAttachment("./public/img/icono_pdf.png", "File.txt");        
        //$mail->addAttachment("images/profile.png"); //Filename is optional
        if($data_correo['adjunto']){
            $mail->addAttachment("./public/clientes/Simulacion_Pre-Aprobada.pdf");
        }

        $mail->addEmbeddedImage('./public/img/logo_creditotal.png', 'logo_creditotal');

        $mail->Subject  = 'Simulacion Pre-Aprobada'; // asunto
        $mail->Body     = $data_correo['cuerpo_correo']; //cuerpo del correo
        //$mail->AltBody  = 'This is the plain text version of the email content';

        //$mail->send();
    }

    public function sendNotificacion($data_correo = array()){
        $mail = $this->configuracion_creditotal();

        $mail->addAddress("cponce@irschile.cl");

        $mail->Subject  = $data_correo['asunto_correo'];
        $mail->Body     = $data_correo['cuerpo_correo'];
        
        $mail->send();
    }

    public function sendGestionEjecutivo($data_correo = array()){
        $mail = $this->configuracion_creditotal();

        $mail->addAddress($data_correo['ejecutivo_correo']);

        $mail->Subject  = $data_correo['asunto_correo'];
        $mail->Body     = $data_correo['cuerpo_correo'];
        
        //$mail->send();
    }

    public function sendPasswordLost($data_correo = array()){
        $mail = $this->configuracion_creditotal();

        $mail->addAddress($data_correo['ejecutivo_correo']);

        $mail->Subject  = $data_correo['asunto_correo'];
        $mail->Body     = $data_correo['cuerpo_correo'];
        
        //$mail->send();
    }

    public function __destruct(){
		$this;
	}
}

// try {
//     $mail->send();
//     echo "Message has been sent successfully";
// } catch (Exception $e) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// }


