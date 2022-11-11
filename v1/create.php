<?php
    include "conffig.php";
    
    if (isset($_POST['submit'])) {

    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $gender = $_POST["gender"];
    
    $sql = "INSERT INTO user (first_name, last_name,  email, password, gnder) VALUES ('$first_name','$last_name','$email','$pass', '$gender')";
    
    $result = $conn->query($sql);
    
    if ($result) {
        echo "<script>alert('Done')</script>";
    } else{
        echo ("ERROR in insert");
    }    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reGIS</title>
</head>
<body>
    <form action="" method="post">
        First Name : <input type="text" name="firstname" id="firstname"> <br>
        Last Name : <input type="text" name="lastname" id="lastname"><br>
        E mail : <input type="text" name="email"> <br>
        Password : <input type="text" name= "pass"> <br>
        Gender :
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female <br>
        <input type="submit" value="submit">
    </form>
</body>
</html>

<?php $results = $conn->query("SELECT * FROM user"); ?>

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
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
        </tr>
    <?php } ?>
</table>