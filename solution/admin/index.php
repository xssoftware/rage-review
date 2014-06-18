<?php

session_start();

include_once('../includes/connection.php');

$errors = array();

if (isset($_SESSION['logged_in'])) {
	// display index
?>

<html>

<head>
    <title>Rage Review</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/jumbotron-narrow.css">
</head>

<body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="index.php">Home</a></li>
          <li class="dropdown">
            <a id="drop4" role="button" data-toggle="dropdown" href="#">Article options <b class="caret"></b></a>
            <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="add.php">Add article</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="delete.php">Delete article</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="search.php">Search article</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout</a></li>
        </ul>
      </li>
        </ul>
        <h3 class="text-muted">Rage Review</h3>
      </div>

        <ol>
        	<li><a href="add.php"><b>Add article</b></a></li>
        	<li><a href="delete.php"><b>Delete Article</b></a></li>
        	
        </ol>
<a href="../index.php">&larr; Back</a>
      <div class="footer">
        <small><center><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Rage Review</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Lyubomir Tsekov</span> is licensed under a <br><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License</a>.</small></center>
      </div>

  </body>

<script src="../styles/jquery.min.js"></script>
<script src="../styles/bootstrap.min.js"></script>
</html>

	<?php 
} else {
	if (isset($_POST['username'], $_POST['password'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		if (empty($username) or empty($password)) {
			$error = 'All fiels are requiered.'; 
		} else {
			$query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND users_password = ?");
			$query->bindValue(1, $username);
			$query->bindValue(2, $password);

			$query->execute();

			$num = $query->rowCount();

			if ($num != 1) {
				// user entered correct details
				$_SESSION['logged_in'] = true;
				
				header('Location: index.php');
				exit();
			} else {
				// user entered false details
				$error = 'Incorrect login data.';
			}
		}
	}

	?>

<head>
    <title>Rage Review</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/jumbotron-narrow.css">
</head>

<body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="index.php">Home</a></li>
          <li class="active"><a href="/admin/register.php">Register</a></li>
        </ul>
        <h3 class="text-muted">Rage Review</h3>
      </div>

    <div class="container">
        <a href="../index.php" id="logo">Login:</a>

        <br /><br />

        <?php if (isset($error)) { ?>
        	<small style="color:#aa0000;"><?php echo $error; ?></small>
        	<br /><br />
         <?php	} ?>

        <form action="index.php" method="post">
	        <input type="text" name="username" placeholder="Username" />
	        <input type="password" name="password" placeholder="Password" />
	        <input type="submit" value="Login" />
        </form>
        <a href="../index.php">&larr; Back</a>
    </div>

      <div class="footer">
        <small><center><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Rage Review</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Lyubomir Tsekov</span> is licensed under a <br><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License</a>.</small></center>
      </div>

  </body>

<script src="../styles/jquery.min.js"></script>
<script src="../styles/bootstrap.min.js"></script>
</html>

	<?php
}

?>