<?php
error_reporting(0); // Supress warnings
try {
    $pdo = new PDO('mysql:host=localhost;dbname=license;charset=utf8', 'root', '');
    $user = $pdo->query("SELECT vEmail FROM users LIMIT 1")->fetchColumn();
    $license = $pdo->query("SELECT license_key FROM license LIMIT 1")->fetchColumn();
    echo "EMAIL: " . $user . "\n";
    echo "LICENSE: " . $license . "\n";
} catch (Exception $e) {
}
?>