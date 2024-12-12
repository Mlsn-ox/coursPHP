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

<body>
    <div class="col-xxl-6 col-md-9 col-12 mx-auto my-0 py-4 px-5 bg-dark-subtle ombre">
        <h1 class="text-center text-body-tertiary mb-4">
            Registre des planètes
        </h1>
        <table class="table table-striped text-center mb-5">
            <thead>
                <tr class="en-tete">
                    <th scope="col-1">Nom</th>
                    <th scope="col-1">Diamètre</th>
                    <th scope="col-1">Atmosphère</th>
                    <th scope="col-1">Couleur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pdo = new PDO("mysql:host=localhost;dbname=planetarium", "root", "1234");
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                } else {
                    header('Location: liste.php?page=1');
                };
                $sql_planet_count = "SELECT COUNT(*) AS total_planet FROM planet";
                $stmt_planet_count = $pdo->query($sql_planet_count);
                $planet_count = $stmt_planet_count->fetch(PDO::FETCH_ASSOC);
                $total = $planet_count['total_planet'];
                $limitPage = 16;
                $pageTotal = ceil($total / $limitPage);
                $offset = ($page * $limitPage) - $limitPage;
                $sql = "SELECT * FROM planet ORDER BY planet_id ASC LIMIT $offset, $limitPage";
                $stmt = $pdo->query($sql);
                $planets = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ob_start();
                foreach ($planets as $planet) {
                ?>
                    <tr class="bg-light-subtle">
                        <td><?= ucfirst($planet["planet_name"]) ?></td>
                        <td><?= $planet["planet_diameter"] ?> km</td>
                        <td><?= $planet["planet_atmo"] ?> km</td>
                        <td class="border" style="background-color: <?= $planet["planet_color"] ?>60;">
                            <?= $planet["planet_color"] ?>
                        </td>
                    </tr>
                <?php
                }
                ob_end_flush();
                ?>
            </tbody>
        </table>
        <nav class="pt-1 pb-2">
            <ul class="pagination justify-content-center">
                <li class='page-item'><a class='page-link' href='liste.php?page=1'>
                        << </a>
                </li>
                <?php
                for ($i = 1; $i <= $pageTotal; $i++) {
                    if ($i <= $page + 2 && $i >= $page - 2) {
                        echo "<li class='page-item'><a class='page-link' href='liste.php?page=$i'>$i</a></li>";
                    }
                }
                ?>
                <li class='page-item'><a class='page-link' href='liste.php?page=<?= $pageTotal ?>'>>></a></li>
            </ul>
        </nav>
        <p class="text-center m-0">
            <a href="index.html" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-50-hover fs-5">
                Retour à l'accueil
            </a>
        </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>