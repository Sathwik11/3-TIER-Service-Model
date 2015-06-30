<?php 
class mul2{
function mul2($a,$b) { 
   return $a*$b;
}   
}
ini_set("soap.wsdl_cache_enabled", "0");   
$server = new SoapServer("http://localhost/providingservice/UDDI/mul2.wsdl",array('soap_version' => SOAP_1_2));
$server->setClass("mul2"); 
$server->handle(); 
?>
