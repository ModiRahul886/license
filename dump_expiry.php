<?php
error_reporting(0);
try {
    $pdo = new PDO('mysql:host=localhost;dbname=license;charset=utf8', 'root', '');
    $license = 'ITEC-FQ91-6L4I-P0E1-93CO';
    $stmt = $pdo->prepare("SELECT license_expire_date FROM license WHERE license_key = ?");
    $stmt->execute([$license]);
    $date = $stmt->fetchColumn();
    echo "EXPIRE_DATE: " . $date . "\n";
    echo "TODAY: " . date('Y-m-d') . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>