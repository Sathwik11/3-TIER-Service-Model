<?php
$client_add6 = new SoapClient("http://localhost/providingservice/UDDI/add6.wsdl", array('soap_version' => SOAP_1_2,'trace' => 1 ));
try{
echo $client_add6->add6($a,$b,$c,$d,$e,$f);
}
catch(SoapFault $exp){
        echo $exp;
          }

?>