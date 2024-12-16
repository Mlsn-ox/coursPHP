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
    <nav class="navbar navbar-dark bg-dark-subtle mb-3 navbar-expand-lg shadow-lg fs-5">
        <div class="container-fluid">
            <a class="navbar-brand"
                href="index.php">
                Planet'Futur
            </a>
            <button class="navbar-toggler"
                type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Planètes
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item"
                                    href="cards.php?page=1">Cartes</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="liste.php?page=1">Liste</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="index_system.php?page=1">
                            Systèmes solaires
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="form.php">
                            Ajouter une planète
                        </a>
                    </li>
                </ul>
                <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form> -->
            </div>
        </div>
    </nav>