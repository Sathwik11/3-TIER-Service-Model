<?php 
class add4{
function add4($a,$b,$c,$d) { 
   return $a+$b+$c+$d;
}   
}
ini_set("soap.wsdl_cache_enabled", "0");   
$server = new SoapServer("http://localhost/providingservice/UDDI/add4.wsdl",array('soap_version' => SOAP_1_2));
$server->setClass("add4"); 
$server->handle(); 
?>
