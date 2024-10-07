<?php include('../server.php'); ?>

<?php
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$record = mysqli_query($db, "SELECT * FROM data WHERE id=$id");

	if (/*count($record) == 1*/ 1) {
		$n = mysqli_fetch_array(result: $record);
		$name = $n['name'];
		$address = $n['address'];
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
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="input-group">
					<label>Name</label>
					<input type="text" name="name" value="<?php echo $name; ?>">
				</div>
				<div class="input-group">
					<label>Address</label>
					<input type="text" name="address" value="<?php echo $address; ?>">
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