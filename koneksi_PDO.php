<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'perpustakaan';

try {
    //code..
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Berhasil konek ke database';
} catch (PDOException $e) {
    //throw $th;
    echo 'error! :' . $e->getMessage();
}
