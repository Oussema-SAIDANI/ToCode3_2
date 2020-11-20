<form method="POST" >
<h3 style="text-align: center; color:red;">Reservation VOl</h3><br>
<h4 style="text-align: center;">Ville Depart : <input type="text" name="ville_depart"><br>
<h4 style="text-align: center;">Ville arrive : <input type="text" name="ville_arrive"><br>
<h4 style="text-align: center;">Date debut : <input type="text" name="date_debut"><br>
<h4 style="text-align: center;">Date fin : <input type="text" name="date_fin"><br>
<h4 style="text-align: center;">Personne : <input type="text" name="nombre_personne"><br><br>
<input type="submit" value="Reserver">
</h4>
</form>
<?php
require_once('lib/nusoap.php');
	$error  = '';
    $result = array();
    $result1 = array();
	$wsdl = "http://localhost/ToCode3_2/WS1/WS1.php?wsdl";
		if(!$error){
			
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				
			    exit();
			}
			 try {
				 
                  
				    $result1 = $client->call('reserver', array(
                        'ville_depart' => $_POST['ville_depart'], 'ville_arrive'=>$_POST['ville_arrive'], 
                        'date_debut'=>$_POST['date_debut'], 'date_fin'=>$_POST['date_fin'],'nombre_personne'=>$_POST['nombre_personne']
                      ));
			  }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}	

?>
<?php
require_once('lib/nusoap.php');
$wsdl = "https://www.w3schools.com/xml/tempconvert.asmx?WSDL";
$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) {
   echo '<h2>L\'erreur est :</h2>' . $err;
   exit();
}

$result=$client->call('CelsiusToFahrenheit', array('Celsius'=>$result1['prix']));
echo $result['CelsiusToFahrenheitResult'];
?>