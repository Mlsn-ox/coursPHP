<?php
$pdo = new PDO("mysql:host=localhost;dbname=papermill", "root", "1234");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM paper WHERE paper_id=?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        header("Location: liste.php");
    }
}
