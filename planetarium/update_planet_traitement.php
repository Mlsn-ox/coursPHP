<?php
$pdo = new PDO("mysql:host=localhost;dbname=planetarium", "root", "1234");

if (isset($_POST['planet_id'])) {
    $id = $_POST['planet_id'];

    if (
        !empty($_POST['planet_name']) &&
        !empty($_POST['planet_diameter']) &&
        !empty($_POST['planet_atmo'])
    ) {
        $sql = "UPDATE planet SET 
                planet_name=?, 
                planet_diameter=?, 
                planet_color=?, 
                planet_atmo=?
                WHERE planet_id= $id";
        $stmt = $pdo->prepare($sql);
        $valid = $stmt->execute([
            $_POST['planet_name'],
            $_POST['planet_diameter'],
            $_POST['planet_color'],
            $_POST['planet_atmo']
        ]);
        if ($valid) {
            header("Location: form.php?message=Planète mise àjour !&status=success");
        } else {
            header("Location: form.php?message=Erreur lors de l'enregistrement&status=error");
        };
    } else {
        header("Location: form.php?message=Veille à bien renseigner tous les champs !&status=error");
    }
} else {
    header("Location: form.php?message=Erreur serveur&status=error");
}
