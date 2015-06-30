<?php
$client_mul5 = new SoapClient("http://localhost/providingservice/UDDI/mul5.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));
try{
echo $client_mul5->mul5($a,$b,$c,$d,$e);
}
catch(SoapFault $exp){
        echo $exp;
          }

?>