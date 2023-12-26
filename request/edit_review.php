<?php
require_once '../include_db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id_to_edit = $_POST['id'];
    $user_name = $_POST['user_name'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];
    $evaluation = $_POST['evaluation'];

    /** @var TYPE_NAME $pdo */ //костыль!
    $stmt = $pdo->prepare('UPDATE review SET user_name=?, subject=?, text=?, evaluation=? WHERE id=?');
    $stmt->execute([$user_name, $subject, $text, $evaluation, $id_to_edit]);

    header('Location: ../additional_pages/admin.php');
    exit();
} else {
    header('Location: error.php');
    exit();
}
