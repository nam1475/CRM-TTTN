<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "crm_project";
    $conn = new mysqli($server, $user, $password, $database);
    if($conn){
        mysqli_query($conn, 'set names "utf8"');
    }

?>