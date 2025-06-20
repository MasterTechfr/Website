<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['difficulte']) && !empty($_POST['nb_questions'])) {
        $difficulte = $_POST['difficulte'];
        $nb = intval($_POST['nb_questions']);
        $fichier_quiz = "quizz_" . $difficulte . "_" . $nb . "q.php";

        header("Location: $fichier_quiz");
        exit();
    } else {
        $erreur = "Veuillez sélectionner une difficulté et un nombre de questions.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MasterTech - Solo</title>
    <link rel="stylesheet" href="Solo.css">
</head>

<body>
    <div class="header">
        <div class="logo">
            <a href="Acceuil.php"><img src="Images/logo.png" alt="MasterTech Logo" class="logo-img"></a>
            <a href="Acceuil.php">MasterTech</a>
        </div>
        <div class="compte">
            <a href="Mon_compte.php">Mon compte</a>
        </div>
    </div>

    <div class="contenu">
        <div class="intro">
            <h2 class="solo-gras">SOLO</h2>
            <img src="Images/Solo.png" alt="Solo" class="solo-img">
            <div class="texte">
                <p>Le principe est très simple.</p>
                <p>Vous aurez une série de questions sur l’informatique, votre but est de choisir le plus de bonnes réponses possibles afin d’avoir un maximum de points à la fin, mais attention au chronomètre !</p>
                <p>Vous avez un temps limité pour y répondre, mais plus vous allez vite, plus vous gagnez de points.</p>
            </div>
        </div>

        <form method="post" action="">
            <div class="menu">
                <div class="difficultés">
                    <p>Choisissez un niveau de difficulté :</p>

                    <input type="radio" name="difficulte" id="facile" value="facile" hidden required>
                    <label class="facile" for="facile">Facile</label>

                    <input type="radio" name="difficulte" id="moyen" value="moyen" hidden>
                    <label class="moyen" for="moyen">Moyen</label>

                    <input type="radio" name="difficulte" id="difficile" value="difficile" hidden>
                    <label class="difficile" for="difficile">Difficile</label>
                </div>

                <div class="nb-questions">
                    <p>Choisir le nombre de questions :</p>

                    <input type="radio" name="nb_questions" id="nb10" value="10" hidden required>
                    <label class="nb10" for="nb10">10</label>

                    <input type="radio" name="nb_questions" id="nb20" value="20" hidden>
                    <label class="nb20" for="nb20">20</label>

                    <input type="radio" name="nb_questions" id="nb30" value="30" hidden>
                    <label class="nb30" for="nb30">30</label>
                </div>

                <div class="commencer">
                    <button type="submit" class="commencer-btn">Commencer</button>
                </div>

                <?php if (!empty($erreur)) : ?>
                    <p style="color: red;"><?php echo htmlspecialchars($erreur); ?></p>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>
</html>
