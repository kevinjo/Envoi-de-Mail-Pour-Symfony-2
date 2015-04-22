<?php
	
	// ...
$serviceMail = $this->get('app.mail');

$mail= $serviceMail->send('[Boutique]Réservation de nom de domaine pour '.$pharmacist->getName(),
		array('hostmaster@pharmonweb.com','info@lagencedepub.com'), 
		'info@lagencedepub.com', 
		'AppMonBundle:Default:index.mail.twig',
		array(
		'name'=>'John Doe',
		'message' =>'Parturient Egestas Nibh Sem Parturient Egestas Nibh Sem',
		)
	);
	
	if($mail){
		$this->response = 'email';
	}else{
		$mail->response = 'error';
	}

