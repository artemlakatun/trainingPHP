<?php
require_once '../include_db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $user_name = $_POST['user_name'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];
    $evaluation = $_POST['evaluation'];

    $sql = "INSERT INTO review (id, user_name, subject, text, evaluation) VALUES (?, ?, ?, ?, ?)";

    /** @var TYPE_NAME $pdo */ //костыль!
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id, $user_name, $subject, $text, $evaluation]);
    header('Location: ../index.php');
} else {
    header('Location: error.php');
}
exit();
