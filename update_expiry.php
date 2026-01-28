<?php
error_reporting(0);
try {
    $pdo = new PDO('mysql:host=localhost;dbname=license;charset=utf8', 'root', '');
    $license = 'ITEC-FQ91-6L4I-P0E1-93CO';
    $newDate = '2030-01-01';
    $stmt = $pdo->prepare("UPDATE license SET license_expire_date = ? WHERE license_key = ?");
    $stmt->execute([$newDate, $license]);
    echo "Updated license expiry to $newDate\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>