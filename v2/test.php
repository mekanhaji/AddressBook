<?php
$name = '';
if(isset($_POST['submit'])){
    $name = $_POST['name'];  
}
echo $name;
?>

<form action="" method="post">
    <input type="text" name="name">
    <input type="submit" value="submit">
</form>