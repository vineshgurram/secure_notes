<?php 

require "../config/db.php";

$user_id = $_SESSION["user_id"];

$stmt = $pdo -> prepare("SELECT * FROM notes WHERE user_id = ?");
$stmt -> execute([$user_id]);
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($notes);
// echo "</pre>";

