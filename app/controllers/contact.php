<?php
	if(isset($_POST['message'],$_POST['name'],$_POST['mail']) && 
		!empty($_POST['message']) &&
		!empty($_POST['name']) &&
		!empty($_POST['mail'])) {

		foreach($_POST as $key => $value) {
			$variablesPost[htmlspecialchars(trim($key), ENT_QUOTES | ENT_HTML5, 'UTF-8')] = htmlspecialchars(trim($value), ENT_QUOTES | ENT_HTML5, 'UTF-8');
		}


		$reCaptcha = new ReCaptcha('***REMOVED***');

		$resp = $reCaptcha->verifyResponse(
			$_SERVER['REMOTE_ADDR'],
			$_POST['g-recaptcha-response']
			);
		if ($resp != null && $resp->success) {
			require_once './lib/swiftmailer/swift_required.php';

			// Create the Transport
			$transport = Swift_SmtpTransport::newInstance('***REMOVED***', 465, 'ssl')
			  ->setUsername('***REMOVED***')
			  ->setPassword('***REMOVED***')
			  ;

			// Create the Mailer using your created Transport
			$mailer = Swift_Mailer::newInstance($transport);

			// Create a message
			$message = Swift_Message::newInstance('Dysnomia Contact  - '.$variablesPost['objet'])
			  ->setFrom(array('***REMOVED***' => 'Dysnomia Contact Form'))
			  ->setTo(array('***REMOVED***' => 'Dysnomia'))
			  ->setBody($variablesPost['message'].'<br/><br/>'.$variablesPost['name'].' - '.$variablesPost['mail'] , 'text/html')
			  ;

			// Send the message
			$result = $mailer->send($message);
			
			$contactMessage = CONTACT_OK;
		} else {
			$contactMessage = CONTACT_PAS_OK;
		}
	}

	$pageData['writeCache'] = false;
	$pageData['readCache'] = false;
	$pageData['pageName'] = 'index.php';
?>