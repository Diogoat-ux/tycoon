<?php
if (isset($_GET['argent'])) {
    $argent = intval($_GET['argent']); // convertit en entier pour sécurité
} else {
    $argent = 0; // valeur par défaut si pas de variable
}
?>

<p id="solde">Vous avez <?php echo $argent; ?> frs</p>

<button class="btn" id="btnTirer" onclick="tirer()"> tirer </button>
<button class="btn" id="btnRester" onclick="rester()"> rester </button>
<button class="btn" id="btnReset" onclick="reset()"> recommencer </button>
<button class="btn" id="btnAccueil" onclick="accueil()"> accueil </button>

<script>
    var bouton = document.getElementById('btnRester');
    bouton.style.display = "none";

    var bouton2 = document.getElementById('btnReset');
    bouton2.style.display = "none";
</script>

<p>Vous</p>
<p id="carte"></p>
<div id="points">
    <script>
        let pts = 0;
    </script>
</div>


<p>Adversaire</p>
<p id="carteAdverse"></p>
<div id="pointsAdverse">
    <script>
        let ptsAdverse = 0;
    </script>
</div>


<script>
    let argent = <?php echo $argent; ?>;

    let jeu = [
        // Trèfles
        {
            id: 1,
            nom: "As de trèfle",
            points: 1
        },
        {
            id: 2,
            nom: "2 de trèfle",
            points: 2
        },
        {
            id: 3,
            nom: "3 de trèfle",
            points: 3
        },
        {
            id: 4,
            nom: "4 de trèfle",
            points: 4
        },
        {
            id: 5,
            nom: "5 de trèfle",
            points: 5
        },
        {
            id: 6,
            nom: "6 de trèfle",
            points: 6
        },
        {
            id: 7,
            nom: "7 de trèfle",
            points: 7
        },
        {
            id: 8,
            nom: "8 de trèfle",
            points: 8
        },
        {
            id: 9,
            nom: "9 de trèfle",
            points: 9
        },
        {
            id: 10,
            nom: "10 de trèfle",
            points: 10
        },
        {
            id: 11,
            nom: "Valet de trèfle",
            points: 10
        },
        {
            id: 12,
            nom: "Dame de trèfle",
            points: 10
        },
        {
            id: 13,
            nom: "Roi de trèfle",
            points: 10
        },

        // Carreaux
        {
            id: 14,
            nom: "As de carreau",
            points: 1
        },
        {
            id: 15,
            nom: "2 de carreau",
            points: 2
        },
        {
            id: 16,
            nom: "3 de carreau",
            points: 3
        },
        {
            id: 17,
            nom: "4 de carreau",
            points: 4
        },
        {
            id: 18,
            nom: "5 de carreau",
            points: 5
        },
        {
            id: 19,
            nom: "6 de carreau",
            points: 6
        },
        {
            id: 20,
            nom: "7 de carreau",
            points: 7
        },
        {
            id: 21,
            nom: "8 de carreau",
            points: 8
        },
        {
            id: 22,
            nom: "9 de carreau",
            points: 9
        },
        {
            id: 23,
            nom: "10 de carreau",
            points: 10
        },
        {
            id: 24,
            nom: "Valet de carreau",
            points: 10
        },
        {
            id: 25,
            nom: "Dame de carreau",
            points: 10
        },
        {
            id: 26,
            nom: "Roi de carreau",
            points: 10
        },

        // Cœurs
        {
            id: 27,
            nom: "As de cœur",
            points: 1
        },
        {
            id: 28,
            nom: "2 de cœur",
            points: 2
        },
        {
            id: 29,
            nom: "3 de cœur",
            points: 3
        },
        {
            id: 30,
            nom: "4 de cœur",
            points: 4
        },
        {
            id: 31,
            nom: "5 de cœur",
            points: 5
        },
        {
            id: 32,
            nom: "6 de cœur",
            points: 6
        },
        {
            id: 33,
            nom: "7 de cœur",
            points: 7
        },
        {
            id: 34,
            nom: "8 de cœur",
            points: 8
        },
        {
            id: 35,
            nom: "9 de cœur",
            points: 9
        },
        {
            id: 36,
            nom: "10 de cœur",
            points: 10
        },
        {
            id: 37,
            nom: "Valet de cœur",
            points: 10
        },
        {
            id: 38,
            nom: "Dame de cœur",
            points: 10
        },
        {
            id: 39,
            nom: "Roi de cœur",
            points: 10
        },

        // Piques
        {
            id: 40,
            nom: "As de pique",
            points: 1
        },
        {
            id: 41,
            nom: "2 de pique",
            points: 2
        },
        {
            id: 42,
            nom: "3 de pique",
            points: 3
        },
        {
            id: 43,
            nom: "4 de pique",
            points: 4
        },
        {
            id: 44,
            nom: "5 de pique",
            points: 5
        },
        {
            id: 45,
            nom: "6 de pique",
            points: 6
        },
        {
            id: 46,
            nom: "7 de pique",
            points: 7
        },
        {
            id: 47,
            nom: "8 de pique",
            points: 8
        },
        {
            id: 48,
            nom: "9 de pique",
            points: 9
        },
        {
            id: 49,
            nom: "10 de pique",
            points: 10
        },
        {
            id: 50,
            nom: "Valet de pique",
            points: 10
        },
        {
            id: 51,
            nom: "Dame de pique",
            points: 10
        },
        {
            id: 52,
            nom: "Roi de pique",
            points: 10
        },
    ];


    jeu = shuffle(jeu);


    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]]; // échange
        }
        return array;
    }

    function tirer() {
        var bouton = document.getElementById('btnRester');
        bouton.style.display = "block";

        var bouton2 = document.getElementById('btnReset');
        bouton2.style.display = "block";
        //pour le joueur
        let index = Math.floor(Math.random() * jeu.length);
        let carte = jeu[index];
        document.getElementById("carte").innerHTML += "Vous avez tiré : " + carte.nom + "<br>";
        pts += carte.points;
        document.getElementById("points").innerHTML = "Vous avez : " + pts + " points <br>";
        jeu.splice(index, 1);
        console.log(jeu);
        if (pts > 21) {
            alert("T'as perdu");
        }

        //pour l'adversaire
        let index2 = Math.floor(Math.random() * jeu.length);
        let carte2 = jeu[index];
        document.getElementById("carteAdverse").innerHTML += "L'adversaire a tiré : " + carte2.nom + "<br>";
        ptsAdverse += carte2.points;
        document.getElementById("pointsAdverse").innerHTML = "L'adversaire a : " + ptsAdverse + " points <br>";
        jeu.splice(index2, 1);
        console.log(jeu);
        if (ptsAdverse > 21) {
            alert("T'as gagné");
            argent += 20;
            document.getElementById("solde").innerText = "Vous avez " + argent + " frs";
        }
    }

    function rester() {
        var bouton = document.getElementById('btnTirer');
        bouton.style.display = "none";

        if (pts > ptsAdverse) {
            alert("T'as gagné");
            argent += 20;
            document.getElementById("solde").innerText = "Vous avez " + argent + " frs";
        } else {
            alert("T'as perdu");
        }
        window.location.href = 'blackJack.php?argent=' + encodeURIComponent(argent);
    }

    function reset() {
        var bouton = document.getElementById('btnTirer');
        bouton.style.display = "none";
        window.location.href = 'blackJack.php?argent=' + encodeURIComponent(argent);


    }

    function accueil() {
        // utilise la variable JS mise à jour
        window.location.href = 'index.php?argent=' + encodeURIComponent(argent);
    }
</script>