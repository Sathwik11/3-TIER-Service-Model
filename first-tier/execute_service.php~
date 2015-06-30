<html>

<head>
<style>
.select_service{
position: absolute;
    top: 2%;
    left: 40%;
}

.ip_text_box{
position: absolute;
    top: 35%;
    left: 30%;
}

</style>
<script src="jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="jquery.min.js"></script>

<script>
var ip_count=0;
var ip_types="";
var ip_types_tokens="";
var op_count=0;
var op_types="";
var ip_container = [];
var i=1;
jQuery(document).ready(function(){
  
  $("#selected_service").change(function() {
             $(".ip_text_box").empty();
             $.ajax({
                    url: "get_io.php",
                    type: "GET",
                    data: {"selected_service":$("#selected_service").val()},
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function (res) {
                    ip_count=res.ip_count;
                    op_count=res.op_count;
                    ip_types = res.ip_types;
                    ip_types_tokens = (ip_types).split(',');
       for(i=1;i<=res.ip_count;i++)
         {
$(".ip_text_box").append('Enter Value for input '+i+' : <input type=\"text\" name=\"ip'+i+'\" id=\"ip'+i+'\">  '+ip_types_tokens[i-1]+'<br><br>');
         }
             $(".ip_text_box").append('<br><br><center><input type="button" id="get_output" class="get_output" value="Get Output" onclick="get_output()"></center><br><br>');
                    for(i=1;i<=res.op_count;i++)
                     $(".ip_text_box").append(' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Output : <label id="output"></label>');
                    },
                    error: function (xhr, ajaxOptions, thrownError) {

                    }
                });

             });


            });

function get_output()
{
ip_container=[];
for(i=1;i<=ip_count;i++)
ip_container.push($("#ip"+i).val());
            $.ajax({
                    url: "get_output.php",
                    type: "GET",
                    data: {"selected_service":$("#selected_service").val(),"ip_conatiner":ip_container},
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function (res) {
                    $("#output").text(res.result);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                    alert("error");
                    }
               });
}

</script>

</head>

<body>
<?php
$con=mysqli_connect("localhost","root","toor","service1");
$avail_services = mysqli_query($con,"SELECT * FROM services");
?>
<div class="select_service">
<h2>Select a Serivice</h2></center><br>
<center>
<select id="selected_service" name="selected_service1">
<?php 
while($row = mysqli_fetch_array($avail_services))
{
?>
<option value="<?php echo $row['id'] ?>" ><?php echo $row['sname'] ?></option>
<?php } ?>
</select>
</div>

<div class="ip_text_box">

</div>

</body>

</html>




