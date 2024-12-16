<?php
include "navbar.php";
?>
<form action="controller/traitement.php"
    method="post"
    class="col-xxl-5 col-md-9 col-12 mx-auto mt-xl-5 px-5 py-4 bg-dark-subtle rounded-4 ombre">
    <h1 class="text-center text-info mb-5">
        Je viens de découvrir une planète !
    </h1>
    <!-- Nom -->
    <div class="mb-4 col">
        <label for="planet_name" class="form-label">
            Nom de ta planète
        </label>
        <input
            type="text"
            class="form-control ms-2 planetName"
            name="planet_name"
            placeholder="ex: Evoli3000">
    </div>
    <!-- Couleur -->
    <div class="mb-4">
        <label class="form-label"
            for="planet_color">
            De quelle couleur est cette planète ?
        </label>
        <input class="form-control form-control-color w-25 ms-2"
            type="color"
            name="planet_color"
            value="#cacaca"
            title="Choisissez la couleur">
    </div>
    <!-- Diamètre -->
    <div class="mb-4">
        <label for="planet_diameter" class="form-label">
            Evidemment tu as déjà calculé son diamètre : (en km)
        </label>
        <input
            type="number"
            class="form-control ms-2"
            name="planet_diameter">
        </input>
    </div>
    <!-- Atmosphere -->
    <div class="mb-5">
        <label for="planet_atmo" class="form-label">
            Et la taille de son atmosphère : (en km)
        </label>
        <input
            type="number"
            class="form-control ms-2"
            name="planet_atmo">
        </input>
    </div>
    <!-- Submit -->
    <div class="col-xl-5 col-sm-9 mx-auto">
        <input
            type="submit"
            class="form-control rounded-pill btn btn-lg btn-outline-info py-2"
            value="Ajouter">
        </input>
    </div>
    <?php if (isset($_GET["message"]) && isset($_GET["status"])) {
        $message = $_GET["message"];
        $status = $_GET["status"];
        echo "<h4 class='text-center $status' >$message</h4>";
    }
    ?>
</form>

<script>
    const name = document.querySelector(".planetName")
    const btn = document.querySelector(".btn")

    name.addEventListener("change", function() {
        btn.value += " " + name.value
    })
    name.addEventListener("click", function() {
        name.placeholder = " ";
    })
</script>
</body>

</html>