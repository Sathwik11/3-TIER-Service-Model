<?php

class add5
{
function add5($a,$b,$c)
{
$client_add2 = new SoapClient("http://localhost/providingservice/UDDI/add2.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));
$client_add3 = new SoapClient("http://localhost/providingservice/UDDI/add3.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));
$client_add4 = new SoapClient("http://localhost/providingservice/UDDI/add4.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));

return 10+$client_add2->add2($a,$b)+$client_add3->add3($a,$b,$c);
}
}
ini_set("soap.wsdl_cache_enabled", "0");
$server = new SoapServer("http://localhost/providingservice/UDDI/add5.wsdl", array('soap_version' => SOAP_1_2));
$server->setClass("add5");
$server->handle();
?>