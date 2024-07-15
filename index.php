<!DOCTYPE html>
<html lang="fr-be">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insectopedia · Apprendre à redécouvrir nos insectes !</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    
    <!-- JS -->
    <script src="./assets/js/main.js" defer></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<?php
    include("./assets/db/config.php");

    try {
        $cnx = new PDO(DSN, USERNAME, PASSWORD);
    } catch (Exception $e) {
        print("<h3>Un problème est survenu !</h3>");
        print("<img src='./image.jpg'>");
        print("<a href='./index.php'>Accueil</a>");

        die();
    }
?>

<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php"><img class="logo-insectopedia" src="./assets/img/logo-text/insectopedia/insectopedia-highres-logo-color.png" alt="Image not found"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./inscriptions/inscription.php">S'enregistrer</a>
                    </li>
                </ul>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Guêpe, ..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </nav>

    <header>
        <div class="logo">
            <img src="./assets/img/logo-text/slogan/insectopedia-highres-logo-transparent-ftcolor.png" alt="Image not found">
        </div>
    </header>

    <main>

    </main>

    <footer></footer>
</body>
</html>