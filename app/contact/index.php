<?php
include('../server.php');
session_start();
if (!isset($_SESSION['user'])) {
	$_SESSION['message'] = "You must log in first";
	header('location: auth/login.php');
}
?>

<?php
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$record = mysqli_query($db, "SELECT * FROM contacts WHERE id=$id");

	if (mysqli_num_rows($record) == 1) {
		$n = mysqli_fetch_array(result: $record);
		$name = $n['name'];
		$phone_number = $n['phone_number'];
		$email = $n['email'];
		$building_number = $n['building_number'];
		$street = $n['street'];
		$city = $n['city'];
		$state = $n['state'];
		$country = $n['country'];
		$zip_code = $n['zip_code'];
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/app/style.css">
	<link rel="shortcut icon" href="/assets/logo.svg" type="image/svg+xml">
	<title>Address Book</title>
</head>

<body>
	<main>
		<div class="header container">
			<a href="/app/" style="text-decoration: none; color: white">
				<h2 class="header-title">
					<img src="/assets/back.svg" alt="" height="20px" width="20px" style="stroke:white;">
					Address Book
				</h2>
			</a>
		</div>

		<section class="container">
			<form method="post" action="/app/server.php">
				<input type="hidden" name="id" value="<?php echo $id; ?>" readonly>
				<div class="input-group">
					<label>Name</label>
					<input type="text" name="name" value="<?php echo $name; ?>">
				</div>
				<div class="input-group">
					<label>Phone Number</label>
					<input type="text" name="phone_number" value="<?php echo $phone_number; ?>" maxlength="10"
						minlength="10" required>
				</div>
				<div class="input-group">
					<label>Email</label>
					<input type="email" name="email" value="<?php echo $email; ?>" required>
				</div>
				<div class="input-group">
					<label>Building Number</label>
					<input type="text" name="building_number" value="<?php echo $building_number; ?>" maxlength="10"
						required>
				</div>
				<div class="input-group">
					<label>Street</label>
					<input type="text" name="street" value="<?php echo $street; ?>">
				</div>
				<div class="input-group">
					<label>City</label>
					<input type="text" name="city" value="<?php echo $city; ?>" required>
				</div>
				<div class="input-group">
					<label>State</label>
					<input type="text" name="state" value="<?php echo $state; ?>" required>
				</div>
				<div class="input-group">
					<label>Country</label>
					<input type="text" name="country" value="<?php echo $country; ?>" required>
				</div>
				<div class="input-group">
					<label>Zip Code</label>
					<input type="text" name="zip_code" value="<?php echo $zip_code; ?>" maxlength="6" minlength="6"
						required>
				</div>
				<div class="input-group">
					<?php if ($update == true): ?>
						<button class="btn" type="submit" name="update">Update</button>
					<?php else: ?>
						<button class="btn" type="submit" name="save">Create</button>
					<?php endif ?>
				</div>
			</form>
		</section>
	</main>
</body>

</html>