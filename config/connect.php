<?php
    $server = $_ENV['DB_SERVER'];
    $user = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $database = $_ENV['DB_DATABASE'];
    $conn = new mysqli($server, $user, $password, $database);
    if($conn){
        mysqli_query($conn, 'set names "utf8"');
    }

?>