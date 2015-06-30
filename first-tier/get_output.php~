<?php
$file = fopen("execute_code.php", "r+");
ftruncate($file, 0);
fclose($file);

$selected_service = (int)($_GET['selected_service']);
$ip_conatiner = ($_GET['ip_conatiner']);
$con=mysqli_connect("localhost","root","toor","service1");
$service_io_details = mysqli_query($con,"SELECT * FROM io where io_id=".$selected_service);
$service_details = mysqli_query($con,"SELECT * FROM services where id=".$selected_service);
if($row = mysqli_fetch_array($service_io_details))
{
$ip_count = $row['ip_count']; 
}

if($row = mysqli_fetch_array($service_details))
{
$add_wsdl = $row['add_wsdl']; 
$serv_name = $row['sname'];
}

$code = "<?php\n";
$code = $code."$"."client = new SoapClient(\"".$add_wsdl."\", array('soap_version' => SOAP_1_2,'trace' => 1 ));\n";
$code = $code. "echo $"."client->".$serv_name."(";
foreach ($ip_conatiner as $i) 
    $code=$code.$i.",";
$code=substr($code, 0, -1);
$code = $code.");\n?>"; 

$file=fopen("execute_code.php",'a+');
$n=fwrite($file,$code);
fclose($file); 

ob_start();
include 'execute_code.php';
$result = ob_get_clean(); 

$output =  array('result'=>$result); 

echo json_encode($output); 

?>
