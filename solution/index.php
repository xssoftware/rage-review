<?php

session_start();

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();

if (isset($_SESSION['logged_in'])) {

?>

<html>

<head>
    <title>Rage Review</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/jumbotron-narrow.css">
</head>

<body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="index.php">Home</a></li>
          <li class="dropdown">
            <a id="drop4" role="button" data-toggle="dropdown" href="#">Article options <b class="caret"></b></a>
            <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="admin/add.php">Add article</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="admin/delete.php">Delete article</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="search/search.php">Search article</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="admin/logout.php">Logout</a></li>
        </ul>
      </li>
        </ul>
        <h3 class="text-muted">Rage Review</h3>
      </div>

      <div class="jumbotron">
        <h2>Welcome to Rage Review!</h2>
        <p class="lead">Rage review is online platform for reading and sharing articles from different areas with others.</p>
        <p><a class="btn btn-lg btn-success" href="admin/register.php" role="button">Sign up today!</a></p>
      </div>

      <h3>Recently added articles:</h3>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Article title</th>
            <th>Date added</th>
            <th>Read more</th>
          </tr>
        </thead>
        <?php foreach ($articles as $article) { ?>
        <tbody>
          <tr>
            <td><?php echo $article['article_id']; ?></td>
            <td><?php echo $article['article_title']; ?></td>
            <td><?php echo date('l jS', $article['article_timestamp']); ?></td>
            <td><a href="article.php?id=<?php echo $article['article_id']; ?>">Read More...</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

      <div class="footer">
        <small><center><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Rage Review</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Lyubomir Tsekov</span> is licensed under a <br><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License</a>.</small></center>
      </div>

  </body>

<script src="styles/jquery.min.js"></script>
<script src="styles/bootstrap.min.js"></script>
</html>

<?php 

}  else {

?>

<html>

<head>
    <title>Rage Review</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/jumbotron-narrow.css">
</head>

<body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="index.php">Home</a></li>
          <li class="active"><a href="admin/index.php">Login</a></li>
        </ul>
        <h3 class="text-muted">Rage Review</h3>
      </div>

      <div class="jumbotron">
        <h2>Welcome to Rage Review!</h2>
        <p class="lead">Rage review is online platform for reading and sharing articles from different areas with others.</p>
        <p><a class="btn btn-lg btn-success" href="admin/register.php" role="button">Sign up today!</a></p>
      </div>

      <h3>Recently added articles:</h3>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Article title</th>
            <th>Date added</th>
            <th>Read more</th>
          </tr>
        </thead>
        <?php foreach ($articles as $article) { ?>
        <tbody>
          <tr>
            <td><?php echo $article['article_id']; ?></td>
            <td><?php echo $article['article_title']; ?></td>
            <td><?php echo date('l jS', $article['article_timestamp']); ?></td>
            <td><a href="article.php?id=<?php echo $article['article_id']; ?>">Read More...</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

      <div class="footer">
        <small><center><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Rage Review</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Lyubomir Tsekov</span> is licensed under a <br><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License</a>.</small></center>
      </div>

  </body>

<script src="styles/jquery.min.js"></script>
<script src="styles/bootstrap.min.js"></script>
</html>

<?php

}

?>