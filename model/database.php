<?php

$dsn = "mysql:host=localhost;dbname=world";
$user = 'root';

try {
    $cnx = new PDO($dsn, $user);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    $error_msg = 'Error: ' . $err->getMessage();
    echo $error_msg;
}