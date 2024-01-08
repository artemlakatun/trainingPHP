<?php
require_once "../blocks/head.php";
?>
<header class="review-header">
    <div class="review-logo">
        <p>training PHP</p>
    </div>
    <div class="review-nav-bar">
        <a class="review-link" href="../index.php">main page</a>
    </div>
</header>
<section class="review-container">
    <h2>Leave a review!</h2>
    <form class="review-form" action="../request/post_review.php" method="post">
        <input type="text" name="user_name" placeholder="Enter your name..." class="review-form-control"><br>
        <input type="text" name="subject" placeholder="Enter subject..." class="review-form-control"><br>
        <input type="text" name="text" placeholder="Enter your text..." class="review-form-control review-form-text"><br>
        <input type="text" name="evaluation" placeholder="Enter your evaluation..." class="review-form-control"><br>
        <input type="submit" value="Send" class="review-submit">
    </form>
</section>
<?php
require_once "../blocks/footer.php";