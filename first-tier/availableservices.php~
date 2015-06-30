<?php
$con=mysqli_connect("localhost","root","toor","service1");
$pre_result = mysqli_query($con,"SELECT * FROM services where type=0");
$user_result = mysqli_query($con,"SELECT * FROM services where type=1");
$i=1;
?>

<center><h2>Available Services</h2></center><br>

<center><h3>Predefined Services</h3></center><br>
<?php 
while($row = mysqli_fetch_array($pre_result))
{
?>
<center>
<?php echo $i++ ?>&nbsp;&nbsp;&nbsp;
<?php echo $row['sname'] ?>
</center>
<?php } ?>

<br><br>

<center><h3>Userdefined Services</h3></center><br>
<?php 
$i=1;
while($row = mysqli_fetch_array($user_result))
{
?>
<center>
<?php echo $i++ ?>&nbsp;&nbsp;&nbsp;
<?php echo $row['sname'] ?>
</center>
<?php } ?>

<br><br>

<center>
<button onclick="window.location.href='selectservice.php'">Create a Service</button>&nbsp;&nbsp;&nbsp;&nbsp;
<button onclick="window.location.href='execute_service.php'">Execute a Service</button>
</center>

