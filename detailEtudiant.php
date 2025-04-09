<?php 
require_once 'classes/Etudiant.php';

$students = [
    new Etudiant("Aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]),
    new Etudiant("Skander", [15, 9, 8, 16])
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grades</title>
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
        .student {
            border: 1px solid #444444;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #333333;
        }
    </style>
</head>

<body>
    <h1>Student Grades</h1>
    <?php foreach ($students as $student): ?>
        <div class="student">
            <?php $student->displayGrades(); ?>
            <?php $student->displayResult(); ?>
        </div>
    <?php endforeach; ?>
</body>
</html>
