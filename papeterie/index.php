<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Papier&co</title>
</head>

<body>
    <form id="formulaire"
        class="col-xxl-5 col-md-9 col-12 mx-auto mt-4 px-5 pt-4 shadow"
        action="./controller/traitement.php"
        method="POST">
        <h1 class="text-center text-body-tertiary mb-4">
            Sélection de papier
        </h1>
        <!-- FORMAT -->
        <div class="mb-4">
            <label class="form-label"
                for="paper_format">
                Format du papier
            </label>
            <select class="form-select ms-2" name="paper_format">
                <option value="a0">A0</option>
                <option value="a1">A1</option>
                <option value="a2">A2</option>
                <option value="a3">A3</option>
                <option selected value="a4">A4</option>
                <option value="a5">A5</option>
                <option value="a6">A6</option>
            </select>
        </div>
        <!-- ÉPAISSEUR -->
        <div class="mb-4">
            <label class="form-label"
                for="paper_thickness">
                Epaisseur (en g/m²)
            </label>
            <input class="form-control ms-2"
                type="number"
                min="35"
                max="700"
                name="paper_thickness">
        </div>
        <!-- COULEUR -->
        <div class="mb-4">
            <label class="form-label"
                for="paper_color">
                Couleur
            </label>
            <input class="form-control form-control-color w-25 ms-2"
                type="color"
                name="paper_color"
                value="#fff"
                title="Choisissez la couleur">
        </div>
        <!-- QUANTITE -->
        <div class="mb-4">
            <label class="form-label"
                for="paper_quantity">
                Quantité de feuilles par ramette
            </label>
            <input class="form-control ms-2"
                type="number"
                min="100"
                max="1000"
                name="paper_quantity">
        </div>
        <!-- TYPE -->
        <label for="paper_isPhoto" class="form-label">
            Impression
        </label>
        <div class="d-flex justify-content-evenly mb-4 col-xl-5 col-sm-9">
            <div class="form-check">
                <input class="form-check-input"
                    type="radio"
                    name="paper_isPhoto"
                    id="flexRadioDefault1"
                    value="0"
                    checked>
                <label class="form-check-label"
                    for="flexRadioDefault1">
                    Papier Mat
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input"
                    type="radio"
                    name="paper_isPhoto"
                    id="flexRadioDefault2"
                    value="1">
                <label class="form-check-label"
                    for="flexRadioDefault2">
                    Papier Photo
                </label>
            </div>
        </div>
        <!-- SUBMIT-->
        <div class="col-xl-5 col-sm-9 mx-auto mt-5">
            <input
                type="submit"
                class="form-control ms-2 rounded-pill btn btn-lg btn-outline-secondary py-2 mb-5"
                value="Commander">
            </input>
        </div>
        <p class="text-center"><a href="liste.php" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-50-hover fs-5">Voir les commandes</a></p>
        <?php
        if (isset($_GET["message"]) && isset($_GET["status"])) {
            $message = $_GET["message"];
            $status = $_GET["status"];
            echo "<h2 class='text-center $status' >$message</h2>";
        }
        ?>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./script/index.js"></script>
</body>

</html>