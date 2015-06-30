<?php

class ser
{
function ser($a,$b,$c)
{
$uri_service2=array('location'=>'http://localhost/providingservice/services/pre-services/service2.php','uri'=>'http://localhost/providingservice/services/pre-services/');
$client_service2=new SoapClient(NULL,$uri_service2);
$uri_service3=array('location'=>'http://localhost/providingservice/services/pre-services/service3.php','uri'=>'http://localhost/providingservice/services/pre-services/');
$client_service3=new SoapClient(NULL,$uri_service3);
$uri_service4=array('location'=>'http://localhost/providingservice/services/pre-services/service4.php','uri'=>'http://localhost/providingservice/services/pre-services/');
$client_service4=new SoapClient(NULL,$uri_service4);


return $a*$client_service3->service3()*$client_service4->service4();
}
}

$uri=array('uri'=>'http://localhost/');
$server=new SoapServer(NULL,$uri);
$server->setClass('');
$server->handle();