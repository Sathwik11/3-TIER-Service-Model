
<form action="selectiptype.php" method="post">

<?php
foreach($_POST['selectservice'] as $serv) {
$selectservice[]=$serv;
}
?>

<input type='hidden' name='selectservice' value="<?php echo htmlentities(serialize($selectservice)); ?>" />

number of ip : <input type="text" name="ip"><br><br>

<input type="submit" value="Continue">
</form>


