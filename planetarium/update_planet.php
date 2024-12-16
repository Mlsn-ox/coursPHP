<?php
include "navbar.php";
$pdo = new PDO("mysql:host=localhost;dbname=planetarium", "root", "1234");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM planet WHERE planet_id = $id";
    $stmt = $pdo->query($sql);
    $planet = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<form action="controller/update_planet_traitement.php"
    method="post"
    class="col-xxl-5 col-md-9 col-12 mx-auto px-5 py-5 bg-dark-subtle rounded-4 ombre">
    <h2 class="text-center text-info mb-3">
        La planète nécessite une mise à jour ?
    </h2>
    <div>
        <input
            type="hidden"
            name="planet_id"
            value="<?= $planet["planet_id"] ?>">
        </input>
    </div>
    <!-- Nom -->
    <div class="mb-4 mt-5 col">
        <label for="planet_name" class="form-label">
            Le nom ne te plaît plus ?
        </label>
        <input
            type="text"
            class="form-control ms-2 planetName"
            name="planet_name"
            value="<?= htmlentities($planet["planet_name"]) ?>">
    </div>
    <!-- Couleur -->
    <div class="mb-4">
        <label class="form-label"
            for="planet_color">
            Changement de couleur ?
        </label>
        <input class="form-control form-control-color w-25 ms-2"
            type="color"
            name="planet_color"
            value="<?= $planet["planet_color"] ?>"
            title="Choisissez la couleur">
    </div>
    <!-- Diamètre -->
    <div class="mb-4">
        <label for="planet_diameter" class="form-label">
            Changement de taille ?
        </label>
        <input
            type="number"
            class="form-control ms-2"
            name="planet_diameter"
            value="<?= htmlentities($planet["planet_diameter"]) ?>">
        </input>
    </div>
    <!-- Atmosphere -->
    <div class="mb-5">
        <label for="planet_atmo" class="form-label">
            Changement d'atmosphère ?
        </label>
        <input
            type="number"
            class="form-control ms-2"
            name="planet_atmo"
            value="<?= htmlentities($planet["planet_atmo"]) ?>">
        </input>
    </div>
    <!-- Submit -->
    <div class="col-xl-5 col-sm-9 mx-auto">
        <input
            type="submit"
            class="form-control rounded-pill btn btn-lg btn-outline-info py-2"
            value="Sauvegarder <?= htmlentities($planet["planet_name"]) ?>">
        </input>
    </div>
    <?php if (isset($_GET["message"]) && isset($_GET["status"])) {
        $message = $_GET["message"];
        $status = $_GET["status"];
        echo "<h4 class='text-center $status' >$message</h4>";
    }
    ?>
</form>
<div class="text-center mt-5 mx-auto div-lien">
    <a href="cards.php" class="lien py-4 px-5 rounded-pill border border-warning fs-4">Voir toutes les planètes</a>
</div>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous">
</script>
<script>
    const btn = document.querySelector(".btn");
    const name = document.querySelector(".planetName");
    name.addEventListener("change", function() {
        btn.value = "Sauvegarder " + name.value
    })
</script>
</body>

</html>