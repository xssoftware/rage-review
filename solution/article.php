<?php

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$data = $article->fetch_data($id);

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


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $data['article_title']; ?> <br /> <small>posted <?php echo date('l jS', $data['article_timestamp']); ?></small></h3>
  </div>
  <div class="panel-body">
    <?php echo $data['article_content']; ?>
  </div>
</div>

<a href="index.php">&larr; Back</a>

</body>

<div class="footer">
        <small><center><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Rage Review</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Lyubomir Tsekov</span> is licensed under a <br><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License</a>.</small></center>
      </div>

<script src="styles/jquery.min.js"></script>
<script src="styles/bootstrap.min.js"></script>
</html>

<?php
} else {
	header('Location: index.php');
	exit();
}

?>