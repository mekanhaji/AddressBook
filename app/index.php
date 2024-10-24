<?php
include 'server.php';
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = "You must log in first";
    header('location: auth/login.php');
}
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Address Book</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="/assets/logo.svg" type="image/svg+xml">
    <link rel="manifest" href="/app/manifest.json">
</head>

<body>
    <?php
    $stmt = $db->prepare("SELECT * FROM contacts WHERE user_id =?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $results = $stmt->get_result();
    ?>

    <main>
        <div class="header container">
            <h2 class="header-title">
                Address Book
            </h2>
            <div style="display: flex; gap: 5px;">
                <a href="contact" class="btn add_user_btn">
                    <img src="/assets/add-user.svg" alt="" height="20px" width="20px">
                    <!-- Add User -->
                </a>

                <a href="server.php?logout" class="btn del_btn">
                    <img src="/assets/logout.svg" alt="" height="20px" width="20px">
                    Logout
                </a>
            </div>

        </div>

        <?php if (isset($_SESSION['message'])) { ?>
            <div class="msg msg-success hide-animation">
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php } ?>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th align="center" colspan="2">Action</th>
                </tr>
            </thead>

            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td style="padding-block: 15px;" align="center">
                        <a href="contact?edit=<?php echo $row['id']; ?>" class="btn edit_btn">
                            <img src="/assets/edit-user.svg" alt="" height="20px" width="20px">
                            <!-- Edit -->
                        </a>
                    </td>
                    <td align="center">
                        <a href="server.php?del=<?php echo $row['id']; ?>" class="btn del_btn">
                            <img src="/assets/delete-user.svg" alt="" height="20px" width="20px">
                            <!-- Delete -->
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </main>

</body>

</html>