<?php
require_once 'include_db/db.php';
require_once 'classes/Review.php';

/** @var TYPE_NAME $pdo */ //костыль!
$stmt = $pdo->query('SELECT id, user_name, subject, text, evaluation FROM review');
$reviewsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    <link rel="stylesheet" href="index.css">
</head>
<body>
<header class="header">
    <div class="logo">
        <p>training PHP</p>
    </div>
    <div class="nav-bar">
        <ul class="nav-menu">
            <li><a class="link" href="additional_pages/admin.php">admin panel</a></li>
            <li><a class="link" href="additional_pages/review.php">add a review</a></li>
        </ul>
    </div>
</header>
<section class="container1">
    <div class="welcome_preview">
            <span class="span_welcome_logo_font span1">
                DO
            </span><br>
        <span class="span_welcome_logo_font span2">
                YOU TEACH
            </span><br>
        <span class="span3">
                PHP  is a common open-source general-purpose programming language. PHP is specifically designed
                for web development and its code can be embedded directly into HTML.
            </span>
        <span class="span_welcome_logo_font span_welcome_logo_padding span4">
                PHP?
            </span>
    </div>
</section>
<section class="container2">
    <h4>Reviews</h4>
</section>
<section class="container3">
    <?php foreach ($reviews as $review): ?>
        <div class="review">
            <div class="user-name review-column"><strong>User:</strong> <?= $review->user_name ?></div>
            <div class="subject review-column"><strong>Subject:</strong> <?= $review->subject ?></div>
            <div class="text review-column"><?= $review->text ?></div>
            <div class="evaluation review-column"><strong>evaluation:</strong> <?= $review->evaluation ?></div>
        </div>
    <?php endforeach; ?>
</section>
<?php
require_once "blocks/footer.php";
