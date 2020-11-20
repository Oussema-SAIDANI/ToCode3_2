<?php
require('reservation.php');
$options = array("uri" => "http://localhost");
$server = new SoapServer(null, $options);
$server->setClass('Reservation'); 
 $server->handle();
 ?>