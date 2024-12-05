<?php
if (!empty($_POST['paper_thickness']) && !empty($_POST['paper_quantity'])) {
    if ($_POST['paper_thickness'] <= 700 || $_POST['paper_thickness'] >= 35) {
        if ($_POST['paper_quantity'] <= 1000 || $_POST['paper_quantity'] >= 100) {
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=papermill", "root", "1234");
                $sql = "INSERT INTO paper (paper_format, paper_thickness, paper_color, paper_quantity, paper_isPhoto) VALUE (?,?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $_POST['paper_format'],
                    $_POST['paper_thickness'],
                    $_POST['paper_color'],
                    $_POST['paper_quantity'],
                    $_POST['paper_isPhoto'],
                ]);
                header("Location: ../index.php?message=Sélection de papier enregistré&status=success");
            } catch (PDOException $e) {
                $message = $e->getMessage();
                header("Location: ../index.php?message=$message");
            }
        } else {
            // Erreur quantité dans ramette
            header("Location: ../index.php?message=Une ramette doit posséder entre 100 et 1000 feuilles&status=error");
        }
    } else {
        // erreur épaisseur
        header("Location: ../index.php?message=Une feuille doit avoir une épaisseur entre 35 et 700 g/m²&status=error");
    }
} else {
    header("Location: ../index.php?message=Veuillez remplir le formulaire correctement&status=error");
}
