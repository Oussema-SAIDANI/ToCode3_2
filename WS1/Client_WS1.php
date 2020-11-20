<?php
require_once('lib/nusoap.php');
	$error  = '';
	$result = array();
	$result_complex = array();
	$guest= " Web";
	$wsdl = "http://localhost/ToCode3_2/WS1/WS1.php?wsdl";
		if(!$error){
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
			    exit();
			}
			 try {
 			   $result_complex = $client->call('reserver', array(
                'ville_depart' => 'Aéroport de Tunis-Carthage', 'ville_arrive'=>'Aéroport de Paris-Charles de Gaulle', 
                'date_debut'=>'29 janvier 2021', 'date_fin'=>'31 juillet 2021','nombre_personne'=>'1'));
 			  echo "<h2>Result<h2/>";
 			  print_r($result_complex);

			  }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}	
?>







