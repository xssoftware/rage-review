<?php

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();

?>

<html>

<head>
    <title>Rage Review</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>
    <div class="container">
        <a href="index.php" id="logo">Rage Review</a>
        <ol>
            <?php foreach ($articles as $article) { ?>
                <li>
                    <a href="article.php?id=<?php echo $article['article_id']; ?>"><?php echo $article['article_title']; ?></a> 
                    - posted <?php echo date('l jS', $article['article_timestamp']); ?>
                </li>
            <?php } ?>
        </ol>
    </div>
</body>

</html>