<?php
    // Nạp autoloader của Composer
    require_once __DIR__ . '/../vendor/autoload.php';

    // Sử dụng vlucas/phpdotenv để nạp file .env
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $server = $_ENV['DB_SERVER'];
    $user = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $database = $_ENV['DB_DATABASE'];
    $conn = new mysqli($server, $user, $password, $database);
    if($conn){
        mysqli_query($conn, 'set names "utf8"');
    }

?>