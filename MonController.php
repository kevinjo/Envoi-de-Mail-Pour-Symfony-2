<?php
	
	// ...
$serviceMail = $this->get('app.mail');

$mail= $serviceMail->send('Sujet',
		array('destinataire','autre destinataire'), 
		'expediteur', 
		'AppMonBundle:Default:index.mail.twig',
		array(
		'name'=>'John Doe',
		'message' =>'Parturient Egestas Nibh Sem Parturient Egestas Nibh Sem',
		array() //attachment
		)
	);
	
	if($mail){
		$this->response = 'email';
	}else{
		$mail->response = 'error';
	}

