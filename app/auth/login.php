<?php include('../server.php'); ?>

<?php
session_start();
// if already logged in, redirect to home page
if (isset($_SESSION['user'])) {
    header('location: /app/');
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
            <h2 class="header-title">
                Address Book
            </h2>
        </div>

        <?php if (isset($_SESSION['message'])) { ?>
            <div class="msg msg-error hide-animation">
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php } ?>

        <section class="container">
            <form method="post" action="/app/server.php">
                <!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username">
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="text" name="password">
                </div>
                <div class="input-group" style="display: flex; align-items: center; gap:10px">
                    <button class="btn" type="submit" name="login">Login</button>
                    <a href="/app/auth/signup.php">Not Sign up yet?</a>
                </div>
            </form>
        </section>
    </main>
</body>

</html>