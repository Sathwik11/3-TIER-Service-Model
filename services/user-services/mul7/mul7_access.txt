<?php
$client_mul7 = new SoapClient("http://localhost/providingservice/UDDI/mul7.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));
try{
echo $client_mul7->mul7($a,$b,$c,$d,$e,$f,$g);
}
catch(SoapFault $exp){
        echo $exp;
          }

?>