<?php
$pdo = new PDO("mysql:host=localhost;dbname=marios_pizza", "root", "1234");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM pizza WHERE pizza_id=?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        header("Location: ../liste.php");
    }
}
