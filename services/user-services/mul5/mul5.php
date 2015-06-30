<?php

class mul5
{
function mul5($a,$b,$c,$d,$e)
{
$client_mul2 = new SoapClient("http://localhost/providingservice/UDDI/mul2.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));
$client_mul3 = new SoapClient("http://localhost/providingservice/UDDI/mul3.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));

return $client_mul2->mul2($a,$b)*$client_mul3->mul3($c,$d,$e);
}
}
ini_set("soap.wsdl_cache_enabled", "0");
$server = new SoapServer("http://localhost/providingservice/UDDI/mul5.wsdl", array('soap_version' => SOAP_1_2));
$server->setClass("mul5");
$server->handle();
?>