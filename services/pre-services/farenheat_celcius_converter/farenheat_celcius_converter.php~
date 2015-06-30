<?php 
class farenheat_celcius_converter{
function farenheat_celcius_converter($a) { 
   return (5*($a-32))/9;
}   
}
ini_set("soap.wsdl_cache_enabled", "0");   
$server = new SoapServer("http://localhost/providingservice/UDDI/farenheat_celcius_converter.wsdl",array('soap_version' => SOAP_1_2));
$server->setClass("farenheat_celcius_converter"); 
$server->handle(); 
?>
