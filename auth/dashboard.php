<?php 
require "../config/db.php";
require "../middleware/bootstrap.php";
require "../middleware/auth.php";


$user_id = $_SESSION["user_id"];
$stmt = $pdo -> prepare("SELECT * FROM notes WHERE user_id = ?");
$stmt -> execute([$user_id]);
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

