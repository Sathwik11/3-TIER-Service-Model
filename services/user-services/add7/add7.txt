<?php

class add7
{
function add7($a,$b,$c,$d,$e,$f,$g)
{
$client_add3 = new SoapClient("http://localhost/providingservice/UDDI/add3.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));
$client_add4 = new SoapClient("http://localhost/providingservice/UDDI/add4.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));

return $client_add4->add4($a,$b,$c,$d)+$client_add3->add3($e,$f,$g);
}
}
ini_set("soap.wsdl_cache_enabled", "0");
$server = new SoapServer("http://localhost/providingservice/UDDI/add7.wsdl", array('soap_version' => SOAP_1_2));
$server->setClass("add7");
$server->handle();
?>