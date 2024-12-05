<?php
$pdo = new PDO("mysql:host=localhost;dbname=marios_pizza", "root", "1234");

$price = 10;
$totalPrice = $price;

if ($_POST['pizza_size']) {
    $totalPrice += 5;
};

if ($_POST['pizza_supp']) {
    $totalPrice += count($_POST['pizza_supp']);
    $totalSupp = implode(", ", $_POST['pizza_supp']);
};

$sql = "INSERT INTO pizza (pizza_name, pizza_size, pizza_price_base, pizza_price_total, pizza_supp) VALUE (?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$valid = $stmt->execute([
    $_POST['pizza_name'],
    $_POST['pizza_size'],
    $price,
    $totalPrice,
    $totalSupp,
]);
if ($valid) {
    header("Location: ../index.php?message=Pizza commandée ! 🔥&status=success");
} else {
    header("Location: ../index.php?message=Erreur lors de la commande&status=error");
};
