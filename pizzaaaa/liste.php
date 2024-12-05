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
    <div class="col-xxl-5 col-md-9 col-12 mx-auto my-4 p-5 bg-white shadow">
        <h1 class="text-center text-body-tertiary mb-4">
            Pizzas commandées
        </h1>
        <table class="table table-striped text-center mb-5">
            <thead>
                <tr class="en-tete">
                    <th scope="col-1">Pizza</th>
                    <th scope="col-1">Prix de base</th>
                    <th scope="col-1">Taille</th>
                    <th scope="col-1">Supplément(s)</th>
                    <th scope="col-1">Prix total</th>
                    <th scope="col-1">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pdo = new PDO("mysql:host=localhost;dbname=marios_pizza", "root", "1234");
                $sql = "SELECT * FROM pizza ORDER BY pizza_id";
                $stmt = $pdo->query($sql);
                $pizzas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ob_start();
                foreach ($pizzas as $pizza) {
                ?>
                    <tr class="bg-light-subtle">
                        <td><?= ucfirst($pizza["pizza_name"]) ?></td>
                        <td><?= $pizza["pizza_price_base"] ?>€</td>
                        <td><?= $pizza["pizza_size"] ? "Maxi" : "Normal"  ?></td>
                        <td><?= ucfirst($pizza["pizza_supp"]) ?></td>
                        <td><?= $pizza["pizza_price_total"] ?>€</td>
                        <td>
                            <span data-toggle="tooltip" title="supprimer">
                                <a class="text-danger px-3" href="./controller/delete_pizza.php?id=<?= $pizza['pizza_id'] ?>">
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
        <p class="text-center">
            <a href="index.php"
                class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-50-hover fs-5">
                Commander pleins d'autres pizzas
            </a>
        </p>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="./script/liste.js"></script>
</body>

</html>