<?php
$client_add5 = new SoapClient("http://localhost/providingservice/UDDI/add5.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));
try{
echo $client_add5->add5($a,$b,$c);
}
catch(SoapFault $exp){
        echo $exp;
          }

?>