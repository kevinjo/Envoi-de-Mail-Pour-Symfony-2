<?php
/**
* @author Kraddle
*/
namespace App\MonBundle\Services;

use Doctrine\ORM\EntityManager;
/**
 * Envoi de mail
 */
class Mailer{

private $mailer;
private $template;

	public function __construct(\Swift_Mailer $mailer, $template){
		$this->mailer = $mailer;
		$this->template = $template;
	}

	/**
	 * send function.
	 *
	 * @access public
	 * @param string $subject Object
	 * @param string $recipient Email(s) des destinataires
	 * @param string $sender Email de l'expéditeur
	 * @param string $bundle (default: null) Template à utiliser
	 * @param array $options  Variables du message
	 * @param Array $attachment  Pièce Jointe
	 * @return boolean
	 */
	public function send($subject,$recipient,$sender, $bundle= null, array $options, Array $attachment){
		$message = \Swift_Message::newInstance();
		$message->setSubject($subject)
		->setContentType('text/html')
		->setCharset('utf-8')
		->setTo($recipient)
		->setFrom($sender);

		if(!empty($bundle)){
			$message->setBody($this->template->render($bundle,$options));
		}else{
			$content ='';
			foreach($options as $key => $value){
				$content .= $value.'<br />';
			}

			$message->setBody($content);
		}

		if(!empty($attachment)){
			foreach($attachment as $file){
				$message->attach(\Swift_Attachment::fromPath($file));
			}
		}

		if($this->mailer->send($message))
			return true;
		else
			return false;
	}
}//end Class
