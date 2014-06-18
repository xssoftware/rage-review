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
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>
    <div class="container">
        <a href="index.php" id="logo">Rage Review</a>

        <br />
        <ol>
        	<li><a href="add.php">Add article</a></li>
        	<li><a href="delete.php">Delete Article</a></li>
        	<li><a href="logout.php">Logout</a></li>
        </ol>

  	</div>
</body>



	<?php 
} else {
	if (isset($_POST['username'], $_POST['password'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		if (empty($username) or empty($password)) {
			$error = 'All fiels are requiered.'; 
		} else {
			$query = $pdo->prepare('INSERT INTO users (user_name, user_password) VALUES (?, ?)');
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
				header('Location: index.php');
			}
		}
	}

	?>

<html>

<head>
    <title>Rage Review</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>
    <div class="container">
        <a href="index.php" id="logo">Rage Review</a>

        <br /><br />

        <?php if (isset($error)) { ?>
        	<small style="color:#aa0000;"><?php echo $error; ?></small>
        	<br /><br />
         <?php	} ?>

        <form action="register.php" method="post">
	        <input type="text" name="username" placeholder="Select username" /><br /><br />
	        <input type="password" name="password" placeholder="Select password" /><br /><br />
	        <input type="submit" value="Create new account" />
        </form>
        <a href="../index.php">&larr; Back</a>
    </div>
</body>


	<?php
}

?>