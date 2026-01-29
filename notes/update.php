<?php

require "../config/db.php";
require "../middleware/auth.php";

// session_start();

if (
    empty($_POST['csrf_token']) ||
    !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
) {
    die("Invalid CSRF token");
}


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid Request");
}


$notes_id = $_POST["id"] ?? null;
$notes_title = trim($_POST["title"] ?? "");
$notes_content = trim($_POST["content"] ?? "");


if (!$notes_id || $notes_title === "" || $notes_content === "") {
    die("Invalid input");
}


$stmt = $pdo->prepare("SELECT * FROM notes WHERE id=?");
$stmt->execute([$notes_id]);
$note = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$note || $note['user_id'] !== $_SESSION['user_id']) {
    die("Unauthorized");
}


$stmt = $pdo->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ? AND user_id = ?");
$stmt->execute([$notes_title, $notes_content, $notes_id, $_SESSION['user_id']]);
header("Location: ../public/dashboard.php");
exit;

