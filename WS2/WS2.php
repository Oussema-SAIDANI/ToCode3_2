<?php
require_once("lib/nusoap.php");
	$error  = '';
	$result = array();
	$wsdl = "https://www.w3schools.com/xml/tempconvert.asmx?WSDL";
		if(!$error){
			//create client object
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				 // Call the SOAP method
				$result = $client->call('CelsiusToFahrenheit', array('Celsius' => '100'));
				// Display the result
				echo "<h2>Result<h2/>";
				print_r($result);
			  }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}	
?>





