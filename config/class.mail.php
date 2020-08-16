<?php
/*
 * Created By : J.R.M. Jeewandara
 * Email : jewandara@gmail.com
 * Contact : +94 77 363 2682
*/
array_push($_CONSOLE, 'LOAD_CLASS_MAIL_PHP:'.$_SERVER['PHP_SELF']);

class WhiteDwMail {
	public $contents = NULL;

	public function newTemplateMsg($template,$additionalHooks)
	{
		global $mail_templates_dir,$debug_mode;
		$this->contents = file_get_contents($mail_templates_dir.$template);
		if(!$this->contents || empty($this->contents))
		{ return false; }
		else
		{
			$this->contents = replaceDefaultHook($this->contents);
			$this->contents = str_replace($additionalHooks["searchStrs"],$additionalHooks["subjectStrs"],$this->contents);
			return true;
		}
	}
	
	public function sendMail($email, $email_header, $subject, $msg = NULL)
	{
		global $_SYS;
		if($msg == NULL){ $msg = $this->contents; }
		$message = wordwrap($msg, 70);
	    $mail = new PHPMailer();
	    try {
	        //Server settings
	        $mail->isSMTP();                                            // Set mailer to use SMTP
	        $mail->SMTPDebug = 1; 
	        $mail->Host       = $_SYS['EMAIL_HOST'];    // Specify main and backup SMTP servers
	        $mail->SMTPAuth   = false;                                   // Enable SMTP authentication
	        $mail->Username   = $_SYS['EMAIL_USER'];                     // SMTP username
	        $mail->Password   = $_SYS['EMAIL_PASS'];                              // SMTP password
	        $mail->SMTPSecure = $_SYS['EMAIL_SMTP'];                                   // Enable TLS encryption, `ssl` also accepted
	        $mail->Port       = $_SYS['EMAIL_PORT'];                                    // TCP port to connect to

	        $mail->setFrom($_SYS['EMAIL_USER'], $_SYS['EMAIL_HEADER']);
	        $mail->addReplyTo($_SYS['EMAIL_USER'], $_SYS['EMAIL_HEADER']);
	        $mail->addAddress($email, $email_header);
	        $mail->addCC($_SYS['EMAIL_USER']);
	        $mail->addBCC($_SYS['EMAIL_USER']);

	        // Content
	        $mail->isHTML(true);                                        // Set email format to HTML
	        $mail->Subject = $subject." : ".$_SYS['DOMAIN'];
	        $mail->Body    = $message;
	        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	        //send the message, check for errors
	        if (!$mail->send()) { echo "Mailer Error: " . $mail->ErrorInfo; } 
	        else { return true; }
	    } 
	    catch (Exception $e) { echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; }

	}
}

?>