<center>
<form action="generateclient.php" method="post">
<?php
$con=mysqli_connect("localhost","root","toor","service1");
$i=2;
?>

Your ip variables : 
<?php 
$ip=$_POST['ip'];
 foreach (range(chr(97), chr(97+$ip-1)) as $char) {
    echo $char . "  ";
}

$sname =$_POST['sname'];
$optypes=$_POST['opt'];
$iptypes=$_POST['i1'].",";
while($i<$ip)
{
$temp="i".$i;
$iptypes=$iptypes.$_POST[$temp].",";
$i=$i+1;
}
$temp="i".$i;
$iptypes=$iptypes.$_POST[$temp];
$optypes=$_POST['opt'];
?>

<input type="hidden"  value="<?php echo $sname ?>"      name="sname" > 
<input type="hidden"  value="<?php echo $ip ?>"          name="ip" > 
<input type="hidden"  value="<?php echo $optypes ?>"     name="optypes" > 
<input type="hidden"  value="<?php echo $iptypes ?>"     name="iptypes" > 

<br>

pic services :<br> 
<?php
$selectservice=unserialize($_POST['selectservice']);
?>
<input type='hidden' name='selectservice' value="<?php echo htmlentities(serialize($selectservice)); ?>" />
<?php
foreach($selectservice as $serv) { 
$result = mysqli_query($con,"SELECT *from services where id=$serv "); 
while($row = mysqli_fetch_array($result))
{
?>
<input type="radio" name="service" value="<?php echo $serv ?>" id="<?php echo $serv ?>"><?php echo $row['sname'] ?>
<input type="hidden" id="<?php echo $serv ?>N" value="<?php echo $row['sname'] ?>" > 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $row['add_wsdl'] ?>" download>Download WSDL</a>
<br>
<?php
}
} ?>
<br><br>

Service : <input type="text" name="n_service" id="n_service"><br><br>

<input type="submit" name="submit" value="Create Service">

</form>
</center>


<script src="jquery.min.js"></script>
<script>
    $("input[type='radio']").change(function () {
        var selection=$(this).val();
        var temp=$("#"+selection+"N").val()+"()";
        $("#n_service").val($("#n_service").val()+temp);
     });
</script>





