<?php
    include "conffig.php";

    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $gender = $_POST["gender"];
    
    $sql = "INSERT INTO user (first_name, last_name,  email, password, gnder) VALUES ('$first_name','$last_name','$email','$pass', '$gender')";
    
    $result = $conn->query($sql);
    
    if ($result) echo " INSERTED";
    else echo "ERROR in insert";
    
    $conn->close();
?>