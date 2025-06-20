<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MasterTech</title>
    <link rel="stylesheet" href="Acceuil.css">
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
            <h1>Bienvenue sur MasterTech !</h1>
            <p>Défiez vous-même ou vos amis avec des quiz éducatifs sur l'informatique ! Testez et améliorez vos connaissances ! Devenez le meilleur et atteignez le sommet du classement !</p>
            
            <div class="modes-de-jeu">
                <div class="solo">
                    <a href="Solo.php"><img src="Images/Solo.png" alt="Mode Solo"></a>
                    <p><strong>SOLO :</strong> Utilisez vos connaissances pour répondre aux questions posées, et essayez de réaliser le meilleur score.</p>
                </div>
                
                <div class="duel">
                    <a href="Duel.php"><img src="Images/Duel.png" alt="Mode Duel"></a>
                    <p><strong>DUEL :</strong> Affrontez un de vos amis dans un duel de questions. Le plus rapide à répondre correctement gagne le point.</p>
                </div>

                <div class="bataille">
                    <a href="Bataille.php"><img src="Images/Bataille.png" alt="Mode Bataille"></a>
                    <p><strong>BATAILLE :</strong> Affrontez vous entre amis, jusqu'à 6 joueurs. Chaque participant doit répondre correctement aux questions pour gagner un point.</p>
                </div>
            </div>
        </div>

        <div class="leaderboard">
            <img class="leaderboard-img" src="Images/logo-removebg-preview.png" alt="Logo">
            <h2>Top des joueurs</h2>
            <ol>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ol>
        </div>
    </div>
</body>
</html>
