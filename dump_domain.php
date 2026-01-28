<?php
error_reporting(0);
try {
    $pdo = new PDO('mysql:host=localhost;dbname=license;charset=utf8', 'root', '');
    $rows = $pdo->query("SELECT * FROM domain_verify LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($rows);
} catch (Exception $e) {
}
?>