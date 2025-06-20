<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MasterTech - Bataille</title>
    <link rel="stylesheet" href="Bataille.css">
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
            <h2 class="bataille-gras">BATAILLE</h2>
            <img src="Images/Bataille.png" alt="duel" class="bataille-img">
            <div class="texte">
                <p>Plus on est de fous, plus on rit !</p>
                <p>Invitez jusqu’a 6 de vos amis pour s’affronter dans une bataille de questions sur l’informatique.</p>
                <p>A chaque question vous devezchoisir la bonne réponse avant la fin du temps imparti.</p>
                <p>A la fin, les points sont comptabilisés et celui qui en a le plus gagne la partie.</p>
            </div>
        </div>

        <div class="menu">
            <div class="difficultés">
                <p>Choisissez un niveau de difficulté :</p>

                <input type="radio" name="difficulte" id="facile" hidden>
                <label class="facile" for="facile">Facile</label>

                <input type="radio" name="difficulte" id="moyen" hidden>
                <label class="moyen" for="moyen">Moyen</label>

                <input type="radio" name="difficulte" id="difficile" hidden>
                <label class="difficile" for="difficile">Difficile</label>
            </div>

            <div class="nb-questions">
                <p>Choisir le nombre de questions :</p>

                <input type="radio" name="nb_questions" id="nb10" hidden>
                <label class="nb10" for="nb10">10</label>

                <input type="radio" name="nb_questions" id="nb20" hidden>
                <label class="nb20" for="nb20">20</label>

                <input type="radio" name="nb_questions" id="nb30" hidden>
                <label class="nb30" for="nb30">30</label>
            </div>

            <div class="participants">
                <p>Participants :</p>
            </div>
        </div>
    </div>
</body>
</html>