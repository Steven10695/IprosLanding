<?php
if(isset($_POST) && !empty($_POST)){
	$full_name = (isset($_POST['full_name']))?$_POST['full_name']:'';
	$full_lastname = (isset($_POST['full_lastname']))?$_POST['full_lastname']:'';
	$email = (isset($_POST['email']))?$_POST['email']:'';
	$phonenumber = (isset($_POST['phonenumber']))?$_POST['phonenumber']:'';
	$subject = (isset($_POST['subject']))?$_POST['subject']:'';
	$message = (isset($_POST['message']))?$_POST['message']:'';
	
	$form_type = 'contact';
	$sendMessage = $mailSubject = '';
	
	if($form_type == 'contact'){
		$mailSubject = 'Detalle de Contacto';
		$sendMessage = "<p>Hola,</p><p>".$full_name." ".$full_lastname."ha enviado un mensaje </p><p><b>Teléfono:</b> ".$phonenumber."</p>";
	}elseif($_POST['form_type'] == 'inquiry'){
		$mailSubject = 'Inquiry Details';
		$sendMessage = '';
	}
	
	if($sendMessage != ''){
		$fromEmail = 'marketing@m4g.com.pe';
		$toEmail = 'marketing@m4g.com.pe';
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: <$fromEmail>" . "\r\n";

		if(mail($toEmail , $mailSubject , $sendMessage , $headers )){
		    
			echo 1;
			
		}else{
			echo 0;
		}
	}else{
		echo 0;
	}
}else{
	echo 0;
}
die();
?>

