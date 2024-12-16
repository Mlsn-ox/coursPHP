<?php
include "navbar.php";
?>
<div class="col-xxl-7 col-xl-8 col-md-11 col-12 mx-auto my-5 py-4 px-5 bg-dark-subtle ombre">
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
                <th scope="col-1">Système associé</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $pdo = new PDO("mysql:host=localhost;dbname=planetarium", "root", "1234");
            $page = isset($_GET["page"]) && is_numeric($_GET["page"]) && $_GET["page"] > 0 ? (int)$_GET["page"] : 1;
            $sql_planet_count = "SELECT COUNT(*) AS total_planet FROM planet";
            $stmt_planet_count = $pdo->query($sql_planet_count);
            $planet_count = $stmt_planet_count->fetch(PDO::FETCH_ASSOC);
            $total = $planet_count['total_planet'];
            $limitPage = 12;
            $pageTotal = ceil($total / $limitPage);
            $offset = ($page - 1) * $limitPage;
            $sql = "SELECT planet.*, system_solar.system_id AS id_parent, system_solar.system_name AS system_parent 
                    FROM planet 
                    LEFT JOIN system_solar ON planet.system_id = system_solar.system_id 
                    ORDER BY planet_id ASC 
                    LIMIT $offset, $limitPage";
            $stmt = $pdo->query($sql);
            $planets = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ob_start();
            foreach ($planets as $planet) {
            ?>
                <tr class="bg-light-subtle">
                    <td><?= ucfirst($planet["planet_name"]) ?></td>
                    <td><?= $planet["planet_diameter"] ?> km</td>
                    <td><?= $planet["planet_atmo"] ?> km</td>
                    <td class="border text-black" style="background: radial-gradient(circle, <?= $planet["planet_color"] ?> 0%, #00000000 85%);">
                        <?= $planet["planet_color"] ?>
                    </td>
                    <td class="text-warning">
                        <?php if (empty($planet["system_parent"])) {
                            echo "Planète errante";
                        } else { ?>
                            <a href="read_system.php?<?= $planet["id_parent"] ?>"
                                class="text-decoration-none">
                                <?= ucfirst($planet["system_parent"]) ?>
                            </a>
                        <?php } ?>
                    </td>
                </tr>
            <?php
            }
            ob_end_flush();
            ?>
        </tbody>
    </table>
    <!-- Pagination -->
    <nav class="mb-3">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href='liste.php?page=1' aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php if ($_GET["page"] > 2) { ?>
                <li class="page-item">
                    <a class="page-link" href='liste.php?page=<?= ($_GET["page"] - 2) ?>'>
                        <?= ($_GET["page"] - 2) ?>
                    </a>
                </li>
            <?php }
            if ($_GET["page"] > 1) { ?>
                <li class="page-item">
                    <a class="page-link" href='liste.php?page=<?= ($_GET["page"] - 1) ?>'>
                        <?= ($_GET["page"] - 1) ?>
                    </a>
                </li>
            <?php } ?>
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">
                    <?= $_GET["page"] ?>
                </a>
            </li>
            <?php if ($_GET["page"] + 1 < $pageTotal) { ?>
                <li class="page-item">
                    <a class="page-link" href='liste.php?page=<?= ($_GET["page"] + 1) ?>'>
                        <?= ($_GET["page"] + 1) ?>
                    </a>
                </li>
            <?php }
            if ($_GET["page"] + 2 < $pageTotal) { ?>
                <li class="page-item">
                    <a class="page-link" href='liste.php?page=<?= ($_GET["page"] + 2) ?>'>
                        <?= ($_GET["page"] + 2) ?>
                    </a>
                </li>
            <?php } ?>
            <li class="page-item">
                <a class="page-link" href='cards.php?page=<?= $pageTotal ?>' aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous">
</script>
</body>

</html>