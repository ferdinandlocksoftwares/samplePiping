<?php
date_default_timezone_set('UTC');
defined('BASEPATH') OR exit('No direct script access allowed');

/*
For LS1-37
First Created by Franz
Last modified 2016-05-11
Last modified by Franz	
*/

class PHPMailer_CI_library {
	
	
	public function __construct()
	{
		$this->CI =& get_instance();
		$CI =& get_instance();
		//$CI->load->model('MailModel');
		//$CI->load->model('PreferedTemplate_model');
        
        $this->CI->load->library('session');
        $this->setSellerDB();
	}
	
    public function setSellerDB()
    {       
        $seller_id = $this->CI->session->userdata('sellerid');   
        
    }
    
	public function phpmailer_sendmail($mail=array())
	{
		require_once('PHPMailer-master/PHPMailerAutoload.php');
		// require_once('PHPMailer-master/class.smtp.php');
		  
		// $mail_arr = array(
			// 'key'=>$key,
			// 'to'=>$to,
			// 'subject'=>$subject,
			// 'from'=>$from,
			// 'message'=>$message
		// );
		
		$email = new PHPMailer();
		$email->IsHTML(true);
		
		$email->IsSMTP(); 
		$email->protocol   = MAIL_PROTOCOL;
		$email->Host       = SMTP_HOST; // SMTP server
		$email->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
												   // 1 = errors and messages
												   // 2 = messages only
		$email->SMTPAuth   = true;                  // enable SMTP authentication
		$email->Port       = SMTP_PORT;                    // set the SMTP port for the GMAIL server
		$email->Username   = (!isset($mail['smtp_u'])) ? SMTP_USER : $mail['smtp_u'] ; // SMTP account username
		$email->Password   = (!isset($mail['smtp_p'])) ? SMTP_PASSWORD : $mail['smtp_p'] ;     // SMTP account password
		
		$email->From      = (!isset($mail['from'])) ? SMTP_USER : $mail['from'];
		$email->FromName  = (!isset($mail['fromname'])) ? SMTP_FROM_NAME : $mail['fromname'];
		$email->Subject   = $mail['subject'];
		$email->Body      = $mail['message'];
		
		$to = explode(',',$mail['to']);
		foreach($to as $t){
			$email->AddAddress( $t,$t );
		}
		
		if(isset($mail['cc'])){
			if(($mail['cc']!='')){
				$temp_cc = $mail['cc'];
				if( is_array($temp_cc))
				{
					foreach($temp_cc as $cc_email){
						$email->AddCC($cc_email,$cc_email);
					}
				}
				else
				{
				  $email->AddCC($mail['cc'],$mail['cc']);
				}
			}
		}
	
		if(isset($mail['bcc'])){
			if(($mail['bcc']!='')){
				$temp_bcc = $mail['bcc'];
				if( is_array($temp_bcc))
				{
					foreach($temp_bcc as $bcc_email){
						$email->AddCC($bcc_email,$bcc_email);
					}
				}
				else
				{
				  $email->AddBCC($mail['bcc'],$mail['bcc']);
				}
			}
		}
		/*
		if(isset($mail['att'])){
			$att = $mail['att'];
			$ctr = 0;
			if(is_array($att)){
				foreach($att as $at){
					$at=str_replace("[",'',$at);
					$at=str_replace("]",'',$at);
					
					
					
					if(isset($mail['atttbl'])){
						if($mail['atttbl']=='tblmCRM_PreferredEmlTemplateAttach'){
							$q=$this->CI->PreferedTemplate_model->get_getattachemnt_by_id($at);
							$d=$q->result('array')[0];
						}
					}else{
						$q=$this->CI->MailModel->get_getattachemnt_by_id($at);
						$d=$q->result('array')[0];
					}
					
					
					
					
					$path = 'crm_uploads/'.$d['path'];
					if(isset($mail['att_dir'])){
						$path = $mail['att_dir'] . $d['path'];
					}
					
					$email->AddAttachment($path,$d['filename']);
					$ctr++;
				}
				
			}
		}
		*/
        $email->Send();
        
		if($email->ErrorInfo != '') {
		   return $email->ErrorInfo;
		} else {
            return 'success';
		}

	}

	
	
	
	public function __destruct()
	{
	
	}
	
}