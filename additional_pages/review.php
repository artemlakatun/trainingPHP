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

    <link rel="stylesheet" href="../css/review.css">
</head>
<body>
<header class="header">
    <div class="logo">
        <p>training PHP</p>
    </div>
    <div class="nav-bar">
        <a class="link" href="../index.php">main page</a>
    </div>
</header>
<section class="container">
    <h2>Leave a review!</h2>
    <form class="form" action="../request/post_review.php" method="post">
        <input type="text" name="user_name" placeholder="Enter your name..." class="form-control"><br>
        <input type="text" name="subject" placeholder="Enter subject..." class="form-control"><br>
        <input type="text" name="text" placeholder="Enter your text..." class="form-control form-text"><br>
        <input type="text" name="evaluation" placeholder="Enter your evaluation..." class="form-control"><br>
        <input type="submit" value="Send" class="submit">
    </form>
</section>
<footer class="footer">
    <p>2023</p>
</footer>
</body>
</html>
