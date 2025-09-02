<?php
if (isset($_GET['argent'])) {
    $argent = intval($_GET['argent']); // convertit en entier pour sécurité
} else {
    $argent = 0; // valeur par défaut si pas de variable
}
?>

<p id="solde">Vous avez <?php echo $argent; ?> frs</p>
<form id="jeu" onsubmit="return pari()">
    <label for="mise">Entrez votre mise :</label>
    <input type="number" id="mise" name="mise" min="1" max="<?php echo $argent ?>" required>
    <button type="submit">Parier</button>
</form>

<button class="btn" onclick="accueil()"> Accueil </button>

<script>
    let argent = <?php echo $argent; ?>; // une seule déclaration globale

    function accueil() {
        // utilise la variable JS mise à jour
        window.location.href = 'index.php?argent=' + encodeURIComponent(argent);
    }

    function pari() {
        let miseInput = document.getElementById('mise');
        let mise = parseInt(miseInput.value);

        if (mise > argent) {
            alert("Vous n'avez pas assez d'argent !");
            return false;
        }

        argent -= mise; // on paie la mise

        let chiffre = Math.floor(Math.random() * 10) + 1;
        if (chiffre % 2 == 0) {
            argent += mise * 2; // double correctement la mise gagnée
        }

        document.getElementById('solde').textContent = "Vous avez " + argent + " frs";

        // mettre à jour le max de l'input
        document.getElementById('mise').max = argent;

        return false;
    }
</script>