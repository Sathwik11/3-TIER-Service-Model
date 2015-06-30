
<form action="createservice.php" method="post">

<?php
$selectservice=unserialize($_POST['selectservice']);

$ip=intval($_POST["ip"]);
$i=1;

?>

<input type='hidden' name='selectservice' value="<?php echo htmlentities(serialize($selectservice)); ?>" />

<input type='hidden' name='ip' value="<?php echo $ip ?>" />

Type of ip's : 

<?php 
while($i<=$ip)
{
?>

<select name="i<?php echo $i ?>">

  <option value='int' >Int</option>
  <option value='float' >Float</option>
  <option value='string' >String</option>

</select>

&nbsp;&nbsp;&nbsp;&nbsp;

<?php $i=$i+1;
} ?>

<br><br>

Type of op :   

<select name="opt">

  <option value='int' >Int</option>
  <option value='float' >Float</option>
  <option value='string' >String</option>

</select>

<br><br>

Name   : <input type="text" name="sname"><br><br>

<input type="submit" value="Continue">

</form>


