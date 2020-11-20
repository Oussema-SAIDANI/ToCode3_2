<?php 
require_once("lib/nusoap.php");
function reserver($ville_depart, $ville_arrive, $date_debut, $date_fin, $nombre_personne){ 
return array('id_vol'=>101, 'heure_depart'=>'06:00AM', 'prix'=>1000, 'date_debut'=>$date_debut, 'date_fin'=>$date_fin); }
function success($username) {return 'Vous avez bien reservé un vol '.$username.'!'; } 
$server = new nusoap_server();
 $server->configureWSDL('web service with  complex data type', 'urn:localhost');
 $server->wsdl->schemaTargetNamespace = 'urn:localhost';
$server->wsdl->addComplexType(
    'Vol',
    'complexType', 
    'struct','all', 
    '',
    array(
        'id_vol' => array('name' => 'id_vol', 'type' => 'xsd:int'),
        'heure_depart' => array('name' => 'heure_depart', 'type' => 'xsd:string'),
        'date_debut' => array('name' => 'date_debut', 'type' => 'xsd:string'),
        'date_fin' => array('name' => 'date_fin', 'type' => 'xsd:string'),
        'prix' => array('name' => 'prix', 'type' => 'xsd:int'))
);
//this is the second webservice entry point/function 
$server->register('reserver',
array('ville_depart' => 'xsd:string', 'ville_arrive'=>'xsd:string', 'date_debut'=>'xsd:string','date_fin'=>'xsd:string', 'nombre_personne'=>'xsd:int'),  //input
			array('return' => 'tns:Vol'),  //output
			'urn:localhost',   //namespace
			'urn:localhost#reservationServer',  //soapaction
); 
$server->register('success',
			array('username' => 'xsd:string'),  //input
			array('return' => 'xsd:string'),  //output
			'urn:localhost',   //namespace
			'urn:localhost#successServer'  //soapaction
		); 
// Use the request to (try to) invoke the service
$server->service(file_get_contents("php://input"));
?>
