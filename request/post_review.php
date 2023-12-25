<?php
require_once '../include_db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $user_name = $_POST['user_name'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];
    $evaluation = $_POST['evaluation'];

    $sql = "INSERT INTO review (user_name, subject, text, evaluation) VALUES (?, ?, ?, ?)";

    /** @var TYPE_NAME $pdo */ //костыль!
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_name, $subject, $text, $evaluation]);
    header('Location: ../index.php');
} else {
    header('Location: error.php');
}
exit();
