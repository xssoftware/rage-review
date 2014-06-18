<?php

session_start();

include_once('../includes/connection.php');
include_once('../includes/article.php');

$article = new Article;

if (isset($_SESSION['logged_in'])) {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = $pdo->prepare("DELETE FROM articles WHERE article_id = ?");
		$query->bindValue(1, $id);
		$query->execute();

		header('Location: delete.php');
	}

	$articles = $article->fetch_all();
?>

<html>

<head>
    <title>Rage Review</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>
    <div class="container">
        <a href="index.php" id="logo">Rage Review</a>

        <h4>Select article to delete:</h4>

        <br />
       
       	<form action="delete.php" method="get">
       		<select onchange="this.form.submit()" name="id">
       			<?php foreach ($articles as $article) { ?>
       				<option value="<?php echo $article['article_id']; ?>"><?php echo $article['article_title']; ?></option>
       			<?php } ?>
       		</select>
       	</form>
       		<a href="index.php">&larr; Back</a>
  	</div>
</body>
</html>

	<?php
} else {
	header('Location: index.php');
}

?>