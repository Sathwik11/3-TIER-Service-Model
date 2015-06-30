<?php 
class add3{
function add3($a,$b,$c) { 
   return $a+$b+$c;
}   
}
ini_set("soap.wsdl_cache_enabled", "0");   
$server = new SoapServer("http://localhost/providingservice/UDDI/add3.wsdl",array('soap_version' => SOAP_1_2));
$server->setClass("add3"); 
$server->handle(); 
?>
