<?php
session_start();
$db = mysqli_connect('localhost', 'root', 'admin', 'address_book');
// Docker
// $db = mysqli_connect('localhost', 'root', 'admin', 'crud');
// initialize variables
$name = "";
$address = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {
	$name = $_POST['name'];
	$address = $_POST['address'];

	mysqli_query($db, "INSERT INTO data (name, address) VALUES ('$name', '$address')");
	$_SESSION['message'] = "Address saved";
	header('location: index.php');
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];

	mysqli_query($db, "UPDATE data SET name='$name', address='$address' WHERE id=$id");
	$_SESSION['message'] = "Address updated!";
	header('location: index.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM data WHERE id=$id");
	$_SESSION['message'] = "Address deleted!";
	header('location: index.php');
}