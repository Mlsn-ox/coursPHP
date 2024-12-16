<?php
include "navbar.php";
?>
<div class="d-flex flex-wrap justify-content-center gap-3">
    <?php
    //PAGINATION
    $pdo = new PDO("mysql:host=localhost;dbname=planetarium", "root", "1234");
    $page = isset($_GET["page"]) && $_GET["page"] > 0 ? (int)$_GET["page"] : 1;
    $sql_planet_count = "SELECT COUNT(*) AS total_planet 
                            FROM planet";
    $stmt_planet_count = $pdo->query($sql_planet_count);
    $planet_count = $stmt_planet_count->fetch(PDO::FETCH_ASSOC);
    $total = $planet_count['total_planet'];
    $limitPage = 6;
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
        <div class="card d-flex flex-column align-items-center ecran"
            style="width: 18rem; max-height: 20rem">
            <div class="d-flex justify-content-center align-items-center h-100 pt-4">
                <div class="d-flex justify-content-center align-items-center mx-auto planet"
                    id="titre"
                    data-color="<?= $planet["planet_color"] ?>"
                    data-size="<?= ($planet["planet_diameter"] + $planet["planet_atmo"]) / 1000 ?>"
                    data-atmo="<?= ceil($planet["planet_atmo"] / 1000) ?>">
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item fs-3 text-center">
                        <?= ucfirst($planet["planet_name"]) ?>
                    </li>
                    <li class="list-group-item">
                        <?php if (empty($planet["system_parent"])) {
                            echo "Planète errante";
                        } else { ?>
                            Système : <a href="read_system.php?<?= $planet["id_parent"] ?>"
                                class="text-decoration-none">
                                <?= ucfirst($planet["system_parent"]) ?>
                            </a>
                        <?php } ?>
                    </li>
                    <li class="list-group-item">
                        Diamètre : <?= $planet["planet_diameter"] ?> km
                    </li>
                    <li class="list-group-item">
                        Atmosphere : <?= $planet["planet_atmo"] ?> km
                    </li>
                    <a href="update_planet.php?id=<?= $planet["planet_id"] ?>"
                        class="rounded-0 btn btn-outline-light">
                        Mettre à jour <?= ucfirst($planet["planet_name"]) ?>
                    </a>
                </ul>
            </div>
        </div>
    <?php
    }
    ob_end_flush();
    ?>
</div>

<!-- Pagination -->
<nav class="mt-3">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href='cards.php?page=1' aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php if ($_GET["page"] > 2) { ?>
            <li class="page-item">
                <a class="page-link" href='cards.php?page=<?= ($_GET["page"] - 2) ?>'>
                    <?= ($_GET["page"] - 2) ?>
                </a>
            </li>
        <?php }
        if ($_GET["page"] > 1) { ?>
            <li class="page-item">
                <a class="page-link" href='cards.php?page=<?= ($_GET["page"] - 1) ?>'>
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
                <a class="page-link" href='cards.php?page=<?= ($_GET["page"] + 1) ?>'>
                    <?= ($_GET["page"] + 1) ?>
                </a>
            </li>
        <?php }
        if ($_GET["page"] + 2 < $pageTotal) { ?>
            <li class="page-item">
                <a class="page-link" href='cards.php?page=<?= ($_GET["page"] + 2) ?>'>
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
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous">
</script>
<script>
    let planets = document.querySelectorAll("#titre");
    planets.forEach((planet) => {
        planet.style.background = `linear-gradient(320deg, ${planet.dataset.color}15 0%, ${planet.dataset.color} 100%)`;
        planet.style.width = planet.dataset.size + "px";
        planet.style.height = planet.dataset.size + "px";
        planet.style.border = "solid " + planet.dataset.atmo + "px";
        planet.style.borderColor = "#aaa ";
    });
</script>
</body>

</html>