<?php 
class celcius_farenheat_converter{
function celcius_farenheat_converter($a) { 
   return ((9*$a)/5)+32;
}   
}
ini_set("soap.wsdl_cache_enabled", "0");   
$server = new SoapServer("http://localhost/providingservice/UDDI/celcius_farenheat_converter.wsdl",array('soap_version' => SOAP_1_2));
$server->setClass("celcius_farenheat_converter"); 
$server->handle(); 
?>
