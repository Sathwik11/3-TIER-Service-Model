<?php 
class mul3{
function mul3($a,$b,$c) { 
   return $a*$b*$c;
}   
}
ini_set("soap.wsdl_cache_enabled", "0");   
$server = new SoapServer("http://localhost/providingservice/UDDI/mul3.wsdl",array('soap_version' => SOAP_1_2));
$server->setClass("mul3"); 
$server->handle(); 
?>
