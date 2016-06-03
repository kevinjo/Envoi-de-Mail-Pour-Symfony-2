<?php

$serviceMail = $this->get('app.mail');

$mail= $serviceMail->send('Sujet',
		array('destinataire','autre destinataire'), //to
		'expediteur', //sender
		array(), //Bcc	
		'AppMonBundle:Default:index.mail.twig', //template
		array(
			'name'=>'John Doe',
			'message' =>'Parturient Egestas Nibh Sem Parturient Egestas Nibh Sem',
		),
		array() //attachment
	);

	if($mail){
		$this->response = 'email';
	}else{
		$mail->response = 'error';
	}
