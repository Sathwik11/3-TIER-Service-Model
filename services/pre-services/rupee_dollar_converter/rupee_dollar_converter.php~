<?php 
class rupee_dollar_converter{
function rupee_dollar_converter($a) { 
   return 60*$a;
}   
}
ini_set("soap.wsdl_cache_enabled", "0");   
$server = new SoapServer("http://localhost/providingservice/UDDI/rupee_dollar_converter.wsdl",array('soap_version' => SOAP_1_2));
$server->setClass("rupee_dollar_converter"); 
$server->handle(); 
?>
