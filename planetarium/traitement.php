<?php
$pdo = new PDO("mysql:host=localhost;dbname=planetarium", "root", "1234");

if (!empty($_POST['planet_name']) && !empty($_POST['planet_diameter']) && !empty($_POST['planet_atmo'])) {
    $sql = "INSERT INTO planet (planet_name, planet_diameter, planet_color, planet_atmo) VALUE (?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $valid = $stmt->execute([
        $_POST['planet_name'],
        $_POST['planet_diameter'],
        $_POST['planet_color'],
        $_POST['planet_atmo']
    ]);
    if ($valid) {
        header("Location: index.php?message=Félicitations, planète ajoutée !&status=success");
    } else {
        header("Location: index.php?message=Erreur lors de l'enregistrement&status=error");
    };
} else {
    header("Location: index.php?message=Veille à bien renseigner tous les champs !&status=error");
}
