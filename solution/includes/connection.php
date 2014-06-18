<?php

try {
	$pdo = new PDO('mysql:host=localhost;dbname=ragedb', 'root', '');	
} catch (PDOException $e) {
	exit('Database error.');
}


?>