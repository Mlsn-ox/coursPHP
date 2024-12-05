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
    <div class="col-xxl-5 col-md-9 col-12 mx-auto my-4 p-5 bg-white shadow">
        <h1 class="text-center text-body-tertiary mb-4">
            Liste des commandes
        </h1>
        <form action="liste.php" method="GET">
            <div class="mb-4 d-flex align-items-center gap-4">
                <label class="form-label fs-5 mb-1"
                    for="paper_format">
                    Format
                </label>
                <select class="form-select px-2 py-1" name="paper_format">
                    <option selected>Choisissez un format</option>
                    <option value="a0">A0</option>
                    <option value="a1">A1</option>
                    <option value="a2">A2</option>
                    <option value="a3">A3</option>
                    <option value="a4">A4</option>
                    <option value="a5">A5</option>
                    <option value="a6">A6</option>
                </select>
                <input
                    type="submit"
                    class="form-control ms-2 rounded-pill btn btn-outline-secondary"
                    value="Filtrer">
                </input>
            </div>
        </form>
        <table class="table table-striped text-center mb-5">
            <thead>
                <tr class="en-tete">
                    <th scope="col-1">Format</th>
                    <th scope="col-1">Epaisseur</th>
                    <th scope="col-1">Couleur</th>
                    <th scope="col-1">Quantité</th>
                    <th scope="col-1">Type</th>
                    <th scope="col-1">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pdo = new PDO("mysql:host=localhost;dbname=papermill", "root", "1234");
                if (isset($_GET["paper_format"])) {
                    $format = $_GET["paper_format"];
                    $sql = "SELECT * FROM paper WHERE paper_format = '$format' ORDER BY paper_id";
                } else {
                    $sql = "SELECT * FROM paper ORDER BY paper_id";
                };
                $stmt = $pdo->query($sql);
                $papers = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ob_start();
                foreach ($papers as $paper) {
                ?>
                    <tr class="bg-light-subtle">
                        <td><?= strtoupper($paper["paper_format"]) ?></td>
                        <td><?= $paper["paper_thickness"] ?></td>
                        <td id="colorShown" class="border"><?= strtoupper($paper["paper_color"]) ?></td>
                        <td><?= $paper["paper_quantity"] ?></td>
                        <td><?= $paper["paper_isPhoto"] ? "Photo" : "Mat" ?></td>
                        <td>
                            <span data-toggle="tooltip" title="supprimer">
                                <a class="text-danger px-3" href="./controller/delete_paper.php?id=<?= $paper['paper_id'] ?>">
                                    <img src="./style/trash.svg" alt="Poubelle" width="18px">
                                </a>
                            </span>
                        </td>
                    </tr>
                <?php
                }
                ob_end_flush();
                ?>
            </tbody>
        </table>
        <?php if (isset($_GET["paper_format"])) {
            echo '<p class="text-center">
                    <a href="liste.php" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-50-hover fs-5">
                    Retour aux commandes
                    </a>
                </p>';
        } else {
            echo '<p class="text-center">
                    <a href="index.php" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-50-hover fs-5">
                    Continuer à commander
                    </a>
                </p>';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./script/liste.js"></script>
</body>

</html>