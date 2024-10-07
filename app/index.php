<?php include 'server.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Address Book</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="/assets/logo.svg" type="image/svg+xml">
    <link rel="manifest" href="/app/manifest.json">
</head>

<body>
    <?php $results = mysqli_query($db, 'SELECT * FROM data'); ?>

    <main>
        <div class="header container">
            <h2 class="header-title">
                Address Book
            </h2>
            <a href="contact" class="btn add_user_btn">
                <img src="/assets/add-user.svg" alt="" height="20px" width="20px">
                <!-- Add User -->
            </a>
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
                    <td><?php echo $row['address']; ?></td>
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