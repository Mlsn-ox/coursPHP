<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Planet'Futur</title>
</head>

<body class="p-2 p-xl-4 mb-4">
    <div class="d-flex flex-wrap justify-content-center gap-3">
        <?php
        $pdo = new PDO("mysql:host=localhost;dbname=planetarium", "root", "1234");
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            header('Location: cards.php?page=1');
        };
        $sql_planet_count = "SELECT COUNT(*) AS total_planet FROM planet";
        $stmt_planet_count = $pdo->query($sql_planet_count);
        $planet_count = $stmt_planet_count->fetch(PDO::FETCH_ASSOC);
        $total = $planet_count['total_planet'];
        $limitPage = 30;
        $pageTotal = ceil($total / $limitPage);
        $offset = ($page * $limitPage) - $limitPage;
        $sql = "SELECT * FROM planet ORDER BY planet_id ASC LIMIT $offset, $limitPage";
        $stmt = $pdo->query($sql);
        $planets = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ob_start();
        foreach ($planets as $planet) {
        ?>
            <div class="card d-flex flex-column" style="width: 21rem;">
                <div class="d-flex justify-content-center align-items-center h-100 pt-4">
                    <div class="d-flex justify-content-center align-items-center mx-auto"
                        id="titre"
                        data-color="<?= $planet["planet_color"] ?>"
                        data-size="<?= ($planet["planet_diameter"] + $planet["planet_atmo"]) / 1000 ?>"
                        data-atmo="<?= ceil($planet["planet_atmo"] / 1000) ?>">
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item fs-3 text-center"><?= ucfirst($planet["planet_name"]) ?></li>
                        <li class="list-group-item">Diamètre : <?= $planet["planet_diameter"] ?> km</li>
                        <li class="list-group-item">Atmosphere : <?= $planet["planet_atmo"] ?> km</li>
                    </ul>
                </div>
            </div>
        <?php
        }
        ob_end_flush();
        ?>
    </div>
    <nav class="pt-1 pb-2">
        <ul class="pagination justify-content-center">
            <li class='page-item'><a class='page-link' href='cards.php?page=1'>
                    << </a>
            </li>
            <?php
            for ($i = 1; $i <= $pageTotal; $i++) {
                if ($i <= $page + 2 && $i >= $page - 2) {
                    echo "<li class='page-item'><a class='page-link' href='cards.php?page=$i'>$i</a></li>";
                }
            }
            ?>
            <li class='page-item'><a class='page-link' href='cards.php?page=<?= $pageTotal ?>'>>></a></li>
        </ul>
    </nav>
    <div class="text-center mt-5 mx-auto div-lien">
        <a href="index.php" class="lien py-4 px-5 rounded-pill border border-warning fs-4">Retour à l'enregistrement</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="./script.js" defer></script>
</body>

</html>