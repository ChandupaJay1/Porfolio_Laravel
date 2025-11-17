<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=portfolio", "root", "Chandupa@2022");
    echo "✅ Connection successful!\n";
} catch(PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage() . "\n";
}
?>
