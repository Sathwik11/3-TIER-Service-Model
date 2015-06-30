<?php 
class add2{
function add2($a,$b) { 
   return $a+$b;
}   
}
ini_set("soap.wsdl_cache_enabled", "0");   
$server = new SoapServer("http://localhost/providingservice/UDDI/add2.wsdl",array('soap_version' => SOAP_1_2));
$server->setClass("add2"); 
$server->handle(); 
?>
