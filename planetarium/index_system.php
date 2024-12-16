<?php
include "navbar.php";
?>
<div class="col-xxl-6 col-md-9 col-12 mx-auto  mt-xl-5 py-4 px-5 bg-dark-subtle ombre">
    <h1 class="text-center text-body-tertiary mb-4">
        Registre des systèmes solaires
    </h1>
    <table class="table table-striped text-center mb-5">
        <?php
        $pdo = new PDO("mysql:host=localhost;dbname=planetarium", "root", "1234");
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            header('Location: liste.php?page=1');
        };
        $sql_system_count = "SELECT COUNT(*) AS total_system FROM system_solar";
        $stmt_system_count = $pdo->query($sql_system_count);
        $system_count = $stmt_system_count->fetch(PDO::FETCH_ASSOC);
        $total = $system_count['total_system'];
        $limitPage = 10;
        $pageTotal = ceil($total / $limitPage);
        $offset = ($page * $limitPage) - $limitPage;
        $sql = "SELECT system_solar.*, COUNT(planet.system_id) AS satellite 
                FROM system_solar
                LEFT JOIN planet ON system_solar.system_id = planet.system_id
                GROUP BY system_solar.system_id 
                ORDER BY system_solar.system_id 
                ASC LIMIT $offset, $limitPage";
        $stmt = $pdo->query($sql);
        $systems = $stmt->fetchAll(PDO::FETCH_ASSOC);  ?>
        <thead>
            <tr class="en-tete">
                <th scope="col-1">Nom</th>
                <th scope="col-1">Type spectral</th>
                <th scope="col-1">Distance - Terre</th>
                <th scope="col-1">Satellites</th>
                <th scope="col-1">Informations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            ob_start();
            foreach ($systems as $system) {
                switch ($system["system_type"]) {
                    case "O":
                        $typeSpectral = "#1b8fff";
                        break;
                    case "A":
                        $typeSpectral = "#ddfdff";
                        break;
                    case "B":
                        $typeSpectral = "#00a4cd";
                        break;
                    case "F":
                        $typeSpectral = "#eee";
                        break;
                    case "G":
                        $typeSpectral = "#ffec00";
                        break;
                    case "K":
                        $typeSpectral = "#ff8300";
                        break;
                    default:
                        $typeSpectral = "#cd0000";
                }
            ?>
                <tr class="bg-light-subtle">
                    <td><?= ucfirst($system["system_name"]) ?></td>
                    <td class="text-black" style="background: radial-gradient(circle, <?= $typeSpectral ?> 0%, #00000000 85%);" ;><?= ucfirst($system["system_type"]) ?></td>
                    <td><?= $system["system_distance"] ?> pc</td>
                    <td><?= $system["satellite"] ?></td>
                    <td><span data-toggle=" tooltip" title="informations">
                            <a class="px-5 link-dark"
                                href="view/read_system.php?id=<?= $system['system_id'] ?>">
                                <span>🔎</span>
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
    <!-- Pagination -->
    <nav class="mb-3">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href='index_system.php?page=1' aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php if ($_GET["page"] > 2) { ?>
                <li class="page-item">
                    <a class="page-link" href='index_system.php?page=<?= ($_GET["page"] - 2) ?>'>
                        <?= ($_GET["page"] - 2) ?>
                    </a>
                </li>
            <?php }
            if ($_GET["page"] > 1) { ?>
                <li class="page-item">
                    <a class="page-link" href='index_system.php?page=<?= ($_GET["page"] - 1) ?>'>
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
                    <a class="page-link" href='index_system.php?page=<?= ($_GET["page"] + 1) ?>'>
                        <?= ($_GET["page"] + 1) ?>
                    </a>
                </li>
            <?php }
            if ($_GET["page"] + 2 < $pageTotal) { ?>
                <li class="page-item">
                    <a class="page-link" href='index_system.php?page=<?= ($_GET["page"] + 2) ?>'>
                        <?= ($_GET["page"] + 2) ?>
                    </a>
                </li>
            <?php } ?>
            <li class="page-item">
                <a class="page-link" href='index_system.php?page=<?= $pageTotal ?>' aria-label="Next">
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