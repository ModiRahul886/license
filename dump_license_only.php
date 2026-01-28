<?php
error_reporting(0);
try {
    $pdo = new PDO('mysql:host=localhost;dbname=license;charset=utf8', 'root', '');
    $license = $pdo->query("SELECT license_key FROM license LIMIT 1")->fetchColumn();
    echo $license;
} catch (Exception $e) {
}
?>