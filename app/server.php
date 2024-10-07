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

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$results = mysqli_query($db, $query);

	if (mysqli_num_rows($results) == 1) {
		$_SESSION['user'] = $username;
		$_SESSION['message'] = "Hello 🙌🏼" . $username . ", You are Logged in!";
		header('location: index.php');
	} else {
		$_SESSION['message'] = "Username/Password combination incorrect";
		header('location: auth/login.php');
	}
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);

	$_SESSION['message'] = "You are logged out!";
	header('location: auth/login.php');
}

if (isset($_POST['signup'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm-password'];

	if ($password == $confirm_password) {
		$query = "SELECT * FROM users WHERE username='$username'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 0) {
			mysqli_query($db, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
			$_SESSION['user'] = $username;
			$_SESSION['message'] = "Hello 🙌🏼" . $username . ", You are Logged in!";
			header('location: index.php');
		} else {
			$_SESSION['message'] = "Username already exists";
			header('location: auth/signup.php');
		}
	} else {
		$_SESSION['message'] = "Password mismatch";
		header('location: auth/signup.php');
	}
}