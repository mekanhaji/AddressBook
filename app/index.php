<?php include 'server.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Address Book</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php $results = mysqli_query($db, 'SELECT * FROM data'); ?>

    <main>
        <div class="header contaner">
            <h2 class="header-title">
                Address Book
            </h2>
            <a href="contact" class="btn"> + Add</a>
        </div>

        <?php if (isset($_SESSION['message'])) { ?>
            <div class="msg">
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
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td>
                        <a href="contact?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
                    </td>
                    <td>
                        <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </main>

</body>

</html>