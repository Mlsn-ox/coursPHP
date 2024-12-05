<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Mario'sPizza</title>
</head>

<body>
    <form id="formulaire"
        class="col-xxl-5 col-md-9 col-12 mx-auto mt-4 px-5 pt-4 shadow"
        action="./controller/traitement.php"
        method="POST">
        <h1 class="text-center text-warning mb-4">
            Bienvenue chez Mario's Pizza
        </h1>
        <h2 class="text-center text-body-tertiary mb-4">
            Commande ta pizza à partir de 10€ seulement !
        </h2>
        <!-- Nom -->
        <div class="mb-4">
            <label class="form-label"
                for="pizza_name">
                Pizza 🍕
            </label>
            <select class="form-select ms-2" name="pizza_name">
                <option value="reine" selected>Reine</option>
                <option value="chorizo">Chorizo</option>
                <option value="calzone">Calzone</option>
                <option value="margherita">Margherita</option>
                <option value="hawaienne">Hawaienne</option>
            </select>
        </div>
        <!-- Taille -->
        <div class="mb-4">
            <label for="pizza_size" class="form-label">
                Taille
            </label>
            <div class="d-flex justify-content-evenly mb-4 col-xl-5 col-sm-9">
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="pizza_size"
                        value="0"
                        checked>
                    <label class="form-check-label" for="pizza_size">
                        Normal
                    </label>
                </div>
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="pizza_size"
                        value="1">
                    <label class="form-check-label" for="pizza_size">
                        Maxi (+5€)
                    </label>
                </div>
            </div>
        </div>
        <!-- supplément -->
        <div class="mb-4">
            <label class="form-label">
                Supplément (+1€/supplément)
            </label>
            <div class="ms-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input"
                        type="checkbox"
                        value="fromage"
                        name="pizza_supp[]">
                    <label class="form-check-label" for="inlineCheckbox1">Fromage</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"
                        type="checkbox"
                        value="olive"
                        name="pizza_supp[]">
                    <label class="form-check-label" for="inlineCheckbox2">Olives</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"
                        type="checkbox"
                        value="kiwi"
                        name="pizza_supp[]">
                    <label class="form-check-label" for="inlineCheckbox3">Kiwis</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"
                        type="checkbox"
                        value="vodka"
                        name="pizza_supp[]">
                    <label class="form-check-label" for="inlineCheckbox3">Vodka</label>
                </div>
            </div>
        </div>
        <!-- SUBMIT-->
        <div class="col-xl-5 col-sm-9 mx-auto mt-5">
            <input
                type="submit"
                class="form-control rounded-pill btn btn-lg btn-outline-secondary py-2 mb-5"
                value="Commander">
            </input>
        </div>
        <p class="text-center">
            <a href="liste.php"
                class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-50-hover fs-5">
                Voir les commandes
            </a>
        </p>
        <?php
        if (isset($_GET["message"]) && isset($_GET["status"])) {
            $message = $_GET["message"];
            $status = $_GET["status"];
            echo "<h2 class='text-center $status' >$message</h2>";
        }
        ?>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="./script/index.js"></script>
</body>

</html>