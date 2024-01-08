<?php
require_once '../include_db/db.php';
require_once '../classes/Review.php';

/** @var TYPE_NAME $pdo */ //костыль!
$stmt = $pdo->query('SELECT id, user_name, subject, text, evaluation FROM review');
$reviewsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Создаем экземпляры класса Review для каждого отзыва
$reviews = [];
foreach ($reviewsData as $reviewData) {
    $review = new Review(
        $reviewData['id'],
        $reviewData['user_name'],
        $reviewData['subject'],
        $reviewData['text'],
        $reviewData['evaluation']
    );
    $reviews[] = $review;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalnia:wght@500&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../index.css">
</head>
<body>
<header class="admin-header">
    <div class="admin-logo">
        <p>training PHP</p>
    </div>
    <div class="admin-nav-bar">
        <ul class="admin-nav-menu">
            <a class="admin-link" href="../index.php">main page</a>
        </ul>
    </div>
</header>
<section class="admin-container">
    <?php
    foreach ($reviews as $review):
    ?>
        <div class="admin-review">
            <div class="admin-user-name admin-review-column"><strong>User:</strong> <?= $review->user_name ?></div>
            <div class="admin-subject admin-review-column"><strong>Subject:</strong> <?= $review->subject ?></div>
            <div class="admin-text admin-review-column"><?= $review->text ?></div>
            <div class="admin-evaluation admin-review-column"><strong>evaluation:</strong> <?= $review->evaluation ?></div>

            <form action="../request/edit_review.php" method="post">
                <input type="hidden" name="id" value="<?= $review->id ?>">
                <input class="admin-user-name admin-review-column" type="text" name="user_name" value="<?= $review->user_name ?>">
                <input class="admin-subject admin-review-column" type="text" name="subject" value="<?= $review->subject ?>">
                <input class="admin-text admin-review-column" type="text" name="text" value="<?= $review->text ?>">
                <input class="admin-evaluation admin-review-column" type="text" name="evaluation" value="<?= $review->evaluation ?>">
                <input class="admin-edit" type="submit" value="Save">
            </form>

            <form class="admin-delete-form" action="../request/delete_review.php" method="post">
                <input type="hidden" name="id" value="<?= $review->id ?>">
                <input class="admin-delete-button" type="submit" value="Delete">
            </form>
        </div>
    <?php
    endforeach;
    ?>
</section>
</body>
</html>
