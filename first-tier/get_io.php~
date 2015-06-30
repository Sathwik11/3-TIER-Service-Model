<?php
//truncating file contents
$file = fopen("execute_code.php", "r+");
ftruncate($file, 0);
fclose($file); 


$selected_service = (int)($_GET['selected_service']);
$con=mysqli_connect("localhost","root","toor","service1");
$service_io_details = mysqli_query($con,"SELECT * FROM io where io_id=".$selected_service);
$service_details = mysqli_query($con,"SELECT * FROM services where id=".$selected_service);
if($row = mysqli_fetch_array($service_io_details))
{
$ip_count = $row['ip_count']; 
$ip_types = $row['ip_types'];
$op_count = $row['op_count'];
$op_types = $row['op_types'];
}

if($row = mysqli_fetch_array($service_details))
{
$add_wsdl = $row['add_wsdl']; 
$serv_name = $row['sname'];
}

$output =  array('ip_count'=>$ip_count,
                 'ip_types'=>$ip_types,
                 'op_count'=>$op_count,
                 'op_types'=>$op_types); 

/* $code = "<?php\n";
$code = $code."$"."client = new SoapClient(\"".$add_wsdl."\", array('soap_version' => SOAP_1_2,'trace' => 1 ));\n";
$code = $code. "echo $"."client->".$serv_name."(1,2);\n?>"; 

$file=fopen("execute_code.php",'a+');
$n=fwrite($file,$code);
fclose($file);    */      

echo json_encode($output); 
?>

<?php
/* var data = value.split(",");
$('#course_name').val(data[0]);
$('#course_credit').val(data[1]);



ip_container=[];
         for(i=1;i<=ip_count;i++)
         ip_container.push($("#ip"+i).val());


function get_output()
{
ip_container=[];
for(i=1;i<=ip_count;i++)
ip_container.push($("#ip"+i).val());
            $.ajax({
                    url: "get_output.php",
                    type: "GET",
                    data: {"selected_service":$("#selected_service").val()},
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function (res) {
                    alert(res.selected_service);
                    $("#output").text("something");
                    },
                    error: function (xhr, ajaxOptions, thrownError) {

                    }
               });
}
*/
?> 
