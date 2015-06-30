<?php
$client = new SoapClient("http://localhost/providingservice/UDDI/add6.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));
echo $client->add6(1,2,3,4,5,6);
?>