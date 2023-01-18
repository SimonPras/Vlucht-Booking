<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=vlucht-booking', 'root', '');
    $query = "DELETE FROM passagier WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(':id' => $id));
    echo "Record deleted successfully";
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
