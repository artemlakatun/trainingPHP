<?php
require_once '../include_db/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id_to_delete = $_POST['id'];

    /** @var TYPE_NAME $pdo */ //костыль!
    $stmt = $pdo->prepare("DELETE FROM review WHERE id = ?");
    $stmt->execute([$id_to_delete]);

    header('Location: ../additional_pages/admin.php');
    exit();
} else {
    header('Location: error.php');
    exit();
}