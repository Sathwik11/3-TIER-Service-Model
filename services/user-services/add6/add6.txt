<?php

class add6
{
function add6($a,$b,$c,$d,$e,$f)
{
$client_add2 = new SoapClient("http://localhost/providingservice/UDDI/add2.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));
$client_add4 = new SoapClient("http://localhost/providingservice/UDDI/add4.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));

return $client_add4->add4($a,$b,$c,$d)+$client_add2->add2($e,$f);
}
}
ini_set("soap.wsdl_cache_enabled", "0");
$server = new SoapServer("http://localhost/providingservice/UDDI/add6.wsdl", array('soap_version' => SOAP_1_2));
$server->setClass("add6");
$server->handle();
?>