<?php

require "../config/db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    die("Invalid Request");
}

$notes_id = $_GET["id"];

if (!$notes_id) {
    die("Note not found");
}

$stmt = $pdo->prepare("DELETE FROM notes WHERE id = ? AND user_id=?");
$stmt->execute([$notes_id, $_SESSION["user_id"]]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

header("Location: ../public/dashboard.php");
exit;



