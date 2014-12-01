<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @api
 * @package services\core\generalize\
 * @source 5  
 * @author Arnold Sameroff
 * @email ast@mobileappz.in 
 * @timestamp March/19/2014 10:01AM
 * @copyright nosave
 * @version 1.0
 * This Class Added for defining generalize variables and methods for using in all webservices
 */
final class generalize extends Exception
{	

        static public $_folder = "/";
        //Define Generalize App Id for access in all services  
        static public $_appid = "1";

        static public $_adminemail = "ast@mobileappz.in";

	    /*
		* @method mailSend($message,$subject,$to_email,$from_email='')
		*/			
		public function mailSend($message,$subject,$to_email,$from_email='')
		{
		
			$dest 	 =  $to_email; 
			$name	 =	"Nosave";			
				
			/*------- Mail sending script ------*/
			require("class.phpmailer.php");
			$mail = new PHPMailer(true);

			try {
			$mail->IsSMTP();                                   // send via SMTP
			
            $mail->Host = "mail.mobileappz.in";  // specify main and backup server
			$mail->SMTPAuth = true;     // turn on SMTP authentication
			$mail->Username = "ast@mobileappz.in";  // SMTP username
			$mail->Password = "12ast12"; // SMTP password
			
			if($from_email != '')
			{
				$mail->From     = $from_email; 
			}
			else
			{
				$mail->From     = $this->_adminemail;
			}		
					
			$mail->FromName = $name;
			$mail->AddAddress($dest,"Admin"); 

			$mail->WordWrap = 50;     // set word wrap
			$mail->IsHTML(true);	  // send as HTML

			$mail->Subject  =  $subject;
			$mail->Body     =  $message;
			//$mail->AltBody  =  $title;

			try{
				if($mail->Send())
					{				
		               return true;	
					}  
					else
					{				
		               return false;
					} 

			   }
			catch (phpmailerException $e) {
			return false;		
		}	
		}catch (Exception $e) {			
		  return false;	
		}	 				
	}	    
}
?>
