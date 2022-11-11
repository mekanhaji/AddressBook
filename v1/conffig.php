<?php
    $server =  "localhost";
    $user = "root";
    $pass = "";
    $db_name = "v1";

    $conn = new mysqli($server, $user, $pass, $db_name);
    if ($conn->connect_error) {
        die("Connection Failed" . $conn->connect_error);
    }