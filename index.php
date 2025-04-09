<?php

require_once 'classes/SessionManager.php';
$session = new SessionManager();

if (isset($_GET['reset'])) {
    $session::reset();
    header( "Location: index.php");
    exit;
}

$nbVisites = $session->get('visits');

if ($nbVisites === null) {
    $session->set('visits', 1);
    $message = "Bienvenue à notre plateforme.";
} else {
    $session->increment('visits');
    $message = "Merci pour votre fidélité, c'est votre {$session->get('visits')} éme visite.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222222;
            margin: 0;
            padding: 20px;
            color: #eeeeee;
        }
        h1 {
            text-align: center;
        }
        .message {
            text-align: center;
            margin-top: 20px;
        }
        .reset-button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #d9534f;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
        }
        .link-button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #444444;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Session Management</h1>
    <div class="message">
        <p><?php echo $message; ?></p>
        <a href="?reset=true" class="reset-button">Reset Session</a>
        <a href="student.php" class="link-button">Student Grades</a>
        <a href="combat.php" class="link-button">Pokemon Fights</a>
    </div>
</body>
</html>
