<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH . 'third_party/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail {
    private $mail;
    private $CI;

    function __construct() {
        $this->CI =& get_instance();
        $this->mail = new PHPMailer(TRUE);

        //initialization 
        $this->mail->isSMTP(); 
        $this->mail->SMTPAuth   = true; 
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
        $this->mail->Host       = $this->CI->config->item('host');       
        $this->mail->Port       = $this->CI->config->item('port');                    
        $this->mail->Username   = $this->CI->config->item('user_name');   
        $this->mail->Password   = $this->CI->config->item('password');            
        $this->mail->isHTML(true);
    }//end-func

    function send($data_set){
        
        $this->mail->addAddress($data_set['recipient_address'], $data_set['recipient_name']);
        $this->mail->Subject = $data_set['subject'] ;
        $this->mail->Body    = $data_set['body'] . $this->CI->config->item('email_footer');
        
        try {
         return $this->mail->send();
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
        }
    }//end-func
    
    
    
}//end-class	

//end-file