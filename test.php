<?php
session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'quiz_db_test';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$MAX_QUESTIONS = 10;
$question = null;
$reponses = [];
$erreur = "";
$est_correcte = null;
$reponse_choisie_id = null;
$fin_du_quiz = false;

// Réinitialiser si demandé
if (isset($_POST['reset'])) {
    $_SESSION['score'] = 0;
    $_SESSION['questions_repondues'] = 0;
    header("Location: test.php");
    exit;
}

// Initialiser la session
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}
if (!isset($_SESSION['questions_repondues'])) {
    $_SESSION['questions_repondues'] = 0;
}

if ($_SESSION['questions_repondues'] >= $MAX_QUESTIONS) {
    $fin_du_quiz = true;
} else {
    // Charger une question aléatoire
    $sql_question = "SELECT id, enonce FROM questions WHERE niveau='facile' ORDER BY RAND() LIMIT 1";
    $result_question = $conn->query($sql_question);

    if ($result_question && $result_question->num_rows > 0) {
        $question = $result_question->fetch_assoc();
        $question_id = $question['id'];

        // Récupérer les réponses associées
        $sql_reponses = "SELECT id, texte FROM reponses WHERE question_id = $question_id";
        $result_reponses = $conn->query($sql_reponses);

        if ($result_reponses && $result_reponses->num_rows > 0) {
            while ($row = $result_reponses->fetch_assoc()) {
                $reponses[] = $row;
            }
        }
    }

    // Traitement après soumission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reponse'])) {
        $reponse_choisie_id = (int) $_POST['reponse'];

        $sql_verif = "SELECT est_correcte FROM reponses WHERE id = $reponse_choisie_id";
        $result_verif = $conn->query($sql_verif);

        if ($result_verif && $result_verif->num_rows > 0) {
            $row = $result_verif->fetch_assoc();
            $est_correcte = (int) $row['est_correcte'];

            if ($est_correcte === 1) {
                $_SESSION['score'] += 1;
            } else {
                $_SESSION['score'] -= 0.5;
            }

            $_SESSION['questions_repondues'] += 1;
            header("Location: test.php"); // éviter resoumission
            exit;
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $erreur = "❌ Vous devez sélectionner une réponse avant de valider.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz - Facile</title>
    <link rel="stylesheet" href="test.css">
</head>
<body>
    <div class="header">
        <h1>Quiz - Niveau Facile</h1>
    </div>

    <p><strong>Score :</strong> <?= $_SESSION['score'] ?> point<?= $_SESSION['score'] > 1 ? 's' : '' ?></p>
    <p><strong>Question <?= $_SESSION['questions_repondues'] + 1 ?>/<?= $MAX_QUESTIONS ?></strong></p>

    <?php if ($fin_du_quiz): ?>
        <h2>🎉 Fin du quiz !</h2>
        <p>Votre score final est de <?= $_SESSION['score'] ?> point<?= $_SESSION['score'] > 1 ? 's' : '' ?>.</p>
        <form method="post">
            <button type="submit" name="reset" class="valider-btn">Recommencer</button>
        </form>
    <?php elseif ($question): ?>
        <h2><?= htmlspecialchars($question['enonce']) ?></h2>

        <?php if ($erreur): ?>
            <p style="color:red"><?= $erreur ?></p>
        <?php endif; ?>

        <form method="post" class="reponses">
            <?php foreach ($reponses as $index => $rep): ?>
                <div>
                    <label>
                        <input type="radio" name="reponse" value="<?= $rep['id'] ?>">
                        <?= htmlspecialchars($rep['texte']) ?>
                    </label>
                </div>
            <?php endforeach; ?>

            <div class="valider-container">
                <button class="valider-btn" type="submit">Valider</button>
            </div>
        </form>
    <?php else: ?>
        <p>Aucune question disponible.</p>
    <?php endif; ?>
</body>
</html>
