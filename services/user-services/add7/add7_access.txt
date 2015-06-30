<?php
$client_add7 = new SoapClient("http://localhost/providingservice/UDDI/add7.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));
try{
echo $client_add7->add7($a,$b,$c,$d,$e,$f,$g);
}
catch(SoapFault $exp){
        echo $exp;
          }

?>