<?php
$con=mysqli_connect("localhost","root","toor","service1");
$pre_result = mysqli_query($con,"SELECT * FROM services where type=0");
$user_result = mysqli_query($con,"SELECT * FROM services where type=1");
$i=1;
?>

<center><h2>Select Services</h2></center>

<center>
<form action="selectip.php" method="post">

<center><h3>Predefined Services</h3></center><br>
<?php 
while($row = mysqli_fetch_array($pre_result))
{
?>
<input type="checkbox" name="selectservice[]" value="<?php echo $row['id']?>">&nbsp;&nbsp;<?php echo $row['sname'] ?><br>
<?php } ?>

<br><br>

<center><h3>Userdefined Services</h3></center><br>
<?php 
while($row = mysqli_fetch_array($user_result))
{
?>
<input type="checkbox" name="selectservice[]" value="<?php echo $row['id']?>">&nbsp;&nbsp;<?php echo $row['sname'] ?><br>
<?php } ?>

<br><br><br>

<input type="submit" value="Continue">
</form>
</center>
