<?php
if (isset($_GET['argent'])) {
    $argent = intval($_GET['argent']); // convertit en entier pour sécurité
} else {
    $argent = 0; // valeur par défaut si pas de variable
}
?>

<p id="solde">Vous avez <?php echo $argent; ?> frs</p>
<form id="jeu" onsubmit="return miniJeu()">
    <label for="chiffre">Choisissez un chiffre entre 1 et 5 :</label>
    <input type="number" id="chiffre" name="chiffre" min="1" max="5" required>
    <button type="submit">Jouer</button>
</form>

<button class="btn" onclick="accueil()"> Accueil </button>

<script>
    let argent = <?php echo $argent; ?>; // une seule déclaration globale

    function accueil() {
        // utilise la variable JS mise à jour
        window.location.href = 'index.php?argent=' + encodeURIComponent(argent);
    }


    function miniJeu() {
        let miseInput = document.getElementById('chiffre');
        let chiffre = parseInt(miseInput.value);

        // Tirage entre 1 et 5 pour correspondre à l'input
        let resultat = Math.floor(Math.random() * 5) + 1;

        if (resultat == chiffre) {
            argent += 20; // gain fixe
            alert("Bravo ! Le chiffre était " + resultat + ". Vous gagnez 20 frs !");
        } else {
            alert("Dommage ! Le chiffre était " + resultat + ". Vous ne gagnez rien.");
        }

        document.getElementById('solde').textContent = "Vous avez " + argent + " frs";

        return false;
    }
</script>