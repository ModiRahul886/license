<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=license;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $users = $pdo->query("SELECT * FROM users LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);
    $licenses = $pdo->query("SELECT * FROM license LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['users' => $users, 'licenses' => $licenses], JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>