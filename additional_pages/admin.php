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

    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<header class="header">
    <div class="logo">
        <p>training PHP</p>
    </div>
    <div class="nav-bar">
        <ul class="nav-menu">
            <a class="link" href="../index.php">main page</a>
        </ul>
    </div>
</header>
<section class="container">
    <?php
    foreach ($reviews as $review):
    ?>
        <div class="review">
            <div class="user-name review-column"><strong>User:</strong> <?= $review->user_name ?></div>
            <div class="subject review-column"><strong>Subject:</strong> <?= $review->subject ?></div>
            <div class="text review-column"><?= $review->text ?></div>
            <div class="evaluation review-column"><strong>evaluation:</strong> <?= $review->evaluation ?></div>

            <form action="../request/edit_review.php" method="post">
                <input type="hidden" name="id" value="<?= $review->id ?>">
                <input class="user-name review-column" type="text" name="user_name" value="<?= $review->user_name ?>">
                <input class="subject review-column" type="text" name="subject" value="<?= $review->subject ?>">
                <input class="text review-column" type="text" name="text" value="<?= $review->text ?>">
                <input class="evaluation review-column" type="text" name="evaluation" value="<?= $review->evaluation ?>">
                <input class="edit" type="submit" value="Сохранить изменения">
            </form>

            <form class="delete-form" action="../request/delete_review.php" method="post">
                <input type="hidden" name="id" value="<?= $review->id ?>">
                <input type="submit" value="Удалить">
            </form>
        </div>
    <?php
    endforeach;
    ?>
</section>
</body>
</html>
