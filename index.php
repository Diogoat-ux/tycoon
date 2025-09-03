<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon site web</title>

    <!-- Liens vers CSS externes -->
    <!-- <link rel="stylesheet" href="style.css"> -->

</head>

<body>
    <header>
        <h1>Bienvenue sur le jeu</h1>
    </header>

    <?php
    if (isset($_GET['argent'])) {
        $argent = intval($_GET['argent']); // récupère le solde depuis l'URL
    } else {
        $argent = 200; // valeur par défaut
    }
    ?>

    <p id="solde">Vous avez <?php echo $argent; ?> frs</p>

    <button class="btn" onclick="paris(<?php echo $argent; ?>)"> Parier </button>
    <button class="btn" onclick="miniJeu(<?php echo $argent; ?>)"> mini jeu </button>
    <button class="btn" onclick="blackJack(<?php echo $argent; ?>)"> black jack </button>

    <script>
        function paris(argent) {
            window.location.href = 'paris.php?argent=' + encodeURIComponent(argent);
        }

        function miniJeu(argent) {
            window.location.href = 'miniJeu.php?argent=' + encodeURIComponent(argent);
        }

        function blackJack(argent) {
            window.location.href = 'blackJack.php?argent=' + encodeURIComponent(argent);
        }
    </script>


    <footer>