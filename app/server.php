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
	$phone_number = $_POST['phone_number'];
	$email = $_POST['email'];
	$building_number = $_POST['building_number'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$zip_code = $_POST['zip_code'];
	$user_id = $_SESSION['user_id'];

	$stmt = $db->prepare("INSERT INTO contacts (name, phone_number, email, building_number, street, city, state, country, zip_code, user_id) 
                            VALUES (?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssssssi", $name, $phone_number, $email, $building_number, $street, $city, $state, $country, $zip_code, $user_id);
	$stmt->execute();
	$stmt->close();

	$_SESSION['message'] = "Contact saved";
	header('location: index.php');
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$phone_number = $_POST['phone_number'];
	$email = $_POST['email'];
	$building_number = $_POST['building_number'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$zip_code = $_POST['zip_code'];

	$stmt = $db->prepare("UPDATE contacts SET 
                            name=?,
                            phone_number=?,
                            email=?,
                            building_number=?,
                            street=?,
                            city=?,
                            state=?,
                            country=?,
                            zip_code=? 
                            WHERE id=?");
	$stmt->bind_param("ssssssssss", $name, $phone_number, $email, $building_number, $street, $city, $state, $country, $zip_code, $id);
	$stmt->execute();
	$stmt->close();

	$_SESSION['message'] = "Contact updated!";
	header('location: index.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM contacts WHERE id=$id");
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
		$_SESSION['user_id'] = mysqli_fetch_array($results)['id'];
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
			$_SESSION['user_id'] = mysqli_insert_id($db);
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