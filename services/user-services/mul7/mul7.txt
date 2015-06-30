<?php

class mul7
{
function mul7($a,$b,$c,$d,$e,$f,$g)
{
$client_mul2 = new SoapClient("http://localhost/providingservice/UDDI/mul2.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));
$client_mul5 = new SoapClient("http://localhost/providingservice/UDDI/mul5.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));

return $client_mul5->mul5($a,$b,$c,$d,$e)*$client_mul2->mul2($f,$g);
}
}
ini_set("soap.wsdl_cache_enabled", "0");
$server = new SoapServer("http://localhost/providingservice/UDDI/mul7.wsdl", array('soap_version' => SOAP_1_2));
$server->setClass("mul7");
$server->handle();
?>