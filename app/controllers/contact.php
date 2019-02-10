<?php
	if(isset($_POST['message'],$_POST['name'],$_POST['mail']) && 
		!empty($_POST['message']) &&
		!empty($_POST['name']) &&
		!empty($_POST['mail'])) {

		foreach($_POST as $key => $value) {
			$variablesPost[htmlspecialchars(trim($key), ENT_QUOTES | ENT_HTML5, 'UTF-8')] = htmlspecialchars(trim($value), ENT_QUOTES | ENT_HTML5, 'UTF-8');
		}

		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array(
			'secret' => '***REMOVED***',
			'response' => $variablesPost["g-recaptcha-response"]
		);
		$options = array(
			'http' => array (
				'method' => 'POST',
				'content' => http_build_query($data)
			)
		);
		$context  = stream_context_create($options);
		$verify = file_get_contents($url, false, $context);
		$resp=json_decode($verify);

		if ($resp != null && $resp->success) {
			require_once '../lib/swiftmailer/swift_required.php';

			// Create the Transport
		    $transport = Swift_SmtpTransport::newInstance('***REMOVED***', 587, 'tls')
		      ->setUsername('***REMOVED***')
		      ->setPassword('***REMOVED***')
		      ->setStreamOptions(array('ssl' => array('allow_self_signed' => true, 'verify_peer_name' => false, 'verify_peer' => false)))
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