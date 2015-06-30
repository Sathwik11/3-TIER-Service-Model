<?php
$con=mysqli_connect("localhost","root","toor","service1");

$sname   =$_POST['sname'];
//$iptypes=$_POST['iptypes'];
$iptypes =explode(",", $_POST['iptypes']);
$iptypes_1=$_POST['iptypes'];
$optypes=$_POST['optypes'];
$ip     =$_POST['ip'];
$selectservice=unserialize($_POST['selectservice']);

$n_service=$_POST['n_service'];
$cli_return="";   //client return value

$i=0;
$j=0;
$len=strlen($n_service);

//inserting into db----start
$add_wsdl="http://localhost/providingservice/UDDI/".$sname.".wsdl";
$sql="insert into services (sname,type,add_wsdl) values ('$sname','1','$add_wsdl')"; 

if(!mysqli_query($con,$sql))
{
echo "error";
die('Error  :'.mysqli_error($con));
}

$sql="insert into io (ip_count, ip_types, op_count, op_types) values ('$ip', '$iptypes_1', '1', '$optypes')";

if(!mysqli_query($con,$sql))
{
echo "error";
die('Error  :'.mysqli_error($con));
}

//inserting into db----end

for($i=0;$i<$len;$i++)
{

if(($n_service{$i}>=chr(97))&&($n_service{$i}<=chr(97+25)))
{

if(($n_service{$i+1}>=chr(97))&&($n_service{$i+1}<=chr(97+25)))
{
    $j=1;

    while($n_service{$i+$j}!='(')
     {
      $j++;
     }
    $cli_return=$cli_return."$"."client_".substr($n_service,$i,$j)."->".substr($n_service,$i,$j);
    $i=$i+$j;
    $cli_return=$cli_return.$n_service{$i};
    $i++;
   while($n_service{$i}!=')')
    {
      if(($n_service{$i}>=chr(97))&&($n_service{$i}<=chr(97+$ip-1)))
      $cli_return=$cli_return."$".$n_service{$i};
      else
      $cli_return=$cli_return.$n_service{$i};
      $i++;
    }
    $cli_return=$cli_return.$n_service{$i}.$n_service{++$i};
}  
                                                                                  //end of 2-if
else
{
 $cli_return=$cli_return."$".$n_service{$i}.$n_service{++$i};
}
}


else
{
if(($n_service{$i}>=chr(48))&&($n_service{$i}<=chr(48+9)))
   {
   $k=$i;
  while(($n_service{$k}>=chr(48))&&($n_service{$k}<=chr(48+9)))
   {
    $cli_return=$cli_return.$n_service{$k};
    $k++;
   }
    $cli_return=$cli_return.$n_service{$k};
    $i=$k;
   }
}


                                                                                   //end of 1-if
}                           

//end of parsing the string


//starting of writing in to client file

$code="<?php\n\n";
$code=$code."class ".$sname."\n{\n";
$code=$code."function ".$sname."(";
  foreach (range(chr(97), chr(97+$ip-2)) as $char) 
    $code=$code."$".$char.",";
$code=$code."$".chr(97+$ip-1).")\n{\n";

   foreach($selectservice as $serv) 
    { 
     $result = mysqli_query($con,"SELECT *from services where id=$serv "); 
     while($row = mysqli_fetch_array($result))
       {
        $code=$code."$"."client_".$row['sname']." = new SoapClient(\"".$row['add_wsdl']."\", array('soap_version' => SOAP_1_2,'trace' => 1 ));\n";
       }
    } 

$code=$code."\n";
$code=$code."return ".$cli_return.";\n}\n}\n";

$code=$code."ini_set(\"soap.wsdl_cache_enabled\", \"0\");\n";
$result = mysqli_query($con,"SELECT *from services ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_array($result);
$code=$code."$"."server = new SoapServer(\"".$row['add_wsdl']."\", array('soap_version' => SOAP_1_2));\n";
$code=$code."$"."server->setClass(\"".$row['sname']."\");\n";
$code=$code."$"."server->handle();\n?>";

//end of client file

//making directory and writing client file
$old=umask(0);
mkdir("/var/www/html/providingservice/services/user-services/".$sname,0777);
umask($old);
$path="/var/www/html/providingservice/services/user-services/".$sname."/".$sname.".php";
$file=fopen("$path",'x+');
$n=fwrite($file,$code);
fclose($file); 
$path="/var/www/html/providingservice/services/user-services/".$sname."/".$sname.".txt";
$file=fopen("$path",'x+');
$n=fwrite($file,$code);
fclose($file);                    
//end of writing into client file


//patch code for programmers-----start
$code="<?php\n";
$code=$code."$"."client_".$row['sname']." = new SoapClient(\"".$row['add_wsdl']."\", array('soap_version' => SOAP_1_2,'trace' => 1 ));\n";
$code=$code."try{\n";
$code=$code."echo $"."client_".$row['sname']."->".$row['sname']."(";
foreach (range(chr(97), chr(97+$ip-2)) as $char) 
    $code=$code."$".$char.",";
$code=$code."$".chr(97+$ip-1).");\n}\n";
$code=$code."catch(SoapFault "."$"."exp){
        echo "."$"."exp;
          }\n";
$code=$code."\n?>";
//patch code for programmers-----end

//writing in to access/patch file------start
$path_access="/var/www/html/providingservice/services/user-services/".$row['sname']."/".$row['sname']."_access.php";
$file=fopen("$path_access",'x+');
$n=fwrite($file,$code);
fclose($file);
$path_access="/var/www/html/providingservice/services/user-services/".$row['sname']."/".$row['sname']."_access.txt";
$file=fopen("$path_access",'x+');
$n=fwrite($file,$code);
fclose($file);
//writing in to access/patch file------end

//wsdl---start
$code="<?xml version=\"1.0\"?>
<definitions name=\"MyDefinition\"
 targetNamespace=\"urn:myTargetNamespace\"
 xmlns:tns=\"urn:myTns\" 
 xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\"
 xmlns:soap=\"http://schemas.xmlsoap.org/wsdl/soap/\"
 xmlns=\"http://schemas.xmlsoap.org/wsdl/\">\n\n";

$code=$code."<message name=\"myRequest\">\n";
$i=1;
foreach ($iptypes as $value)
{
if($value=="int")
  $value_xsd="integer";
if($value=="float")
  $value_xsd="decimal";
if($value=="string")
  $value_xsd="string";

$code=$code."<part name=\"reqParam".$i++."\" type=\"xsd:".$value_xsd."\"/>\n";
}

$code=$code."</message>\n";
$code=$code."<message name=\"myResponse\">\n";
if($optypes=="int")
  $optypes_xsd="integer";
if($optypes=="float")
  $optypes_xsd="decimal";
if($optypes=="string")
  $optypes_xsd="string";
$code=$code."<part name=\"resParam\" type=\"xsd:".$optypes_xsd."\"/>\n";
$code=$code."</message>\n\n";
$code=$code."<portType name=\"MyPortType\">
  <operation name=\"".$row['sname']."\">
   <input message=\"tns:myRequest\"/>
   <output message=\"tns:myResponse\"/>
  </operation>
 </portType>\n\n";
$code=$code."<binding name=\"MyBinding\" type=\"tns:MyPortType\">
  <soap:binding style=\"rpc\"
   transport=\"http://schemas.xmlsoap.org/soap/http\"/>
  <operation name=\"".$row['sname']."\">
   <soap:operation soapAction=\"http://localhost/providingservice/services/user-services/".$row['sname']."/".$row['sname']."\"/>
   <input>\n
    <soap:body use=\"encoded\" namespace=\"urn:myInputNamespace\" encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\"/>
   </input>
   <output>
    <soap:body use=\"encoded\" namespace=\"urn:myOutputNamespace\" encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\"/>
   </output>
  </operation>
 </binding>\n\n";
$code=$code."<service name=\"MyService\">
  <documentation>Returns a greeting string.
  </documentation>
  <port name=\"MyPort\" binding=\"tns:MyBinding\">
   <soap:address location=\"http://localhost/providingservice/services/user-services/".$row['sname']."/".$row['sname'].".php\"/>
  </port>\n
 </service>\n\n
</definitions>";
//wsdl---end

//writing wsdl---start
$wsdl="/var/www/html/providingservice/UDDI/".$row['sname'].".wsdl";
$file=fopen("$wsdl",'x+');
$n=fwrite($file,$code);
fclose($file);         
//writing wsdl---end 

$get_web_service        ="http://localhost/providingservice/services/user-services/".$sname."/".$sname.".txt";
$get_wsdl               ="http://localhost/providingservice/UDDI/".$sname.".wsdl";
$get_web_service_access ="http://localhost/providingservice/services/user-services/".$sname."/".$sname."_access.txt";

?>

<br><br><br><br><br><br><br><br><br>
<center>
<a href="<?php echo $get_web_service ?>" download>Get Web Service - <?php echo $sname ?></a><br><br>
<a href="<?php echo $get_wsdl ?>" download>Get WSDL        - <?php echo $sname ?></a><br><br>
<a href="<?php echo $get_web_service_access ?>" download>Get Code for Accessing Web Service - <?php echo $sname ?></a><br><br>
</center>
<br><br><br>
<center><input type="button" value="Home" onClick="document.location.href='availableservices.php'" /></center>



 


