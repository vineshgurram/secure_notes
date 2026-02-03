<?php

// require "../config/db.php";
require "../middleware/bootstrap.php";
require "../middleware/auth.php";


// session_start();

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    die("Invalid Request");
}


if (
    !isset($_POST['csrf_token']) ||
    !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
) {
    die("CSRF validation failed");
}

$notes_id = (int) ($_POST["note_id"] ?? 0);
$user_id = $_SESSION["user_id"];

if (!$notes_id) {
    die("Note not found");
}

/* Ownership check */
$stmt = $pdo->prepare(
    "SELECT id FROM notes WHERE id = ? AND user_id = ?"
);
$stmt->execute([$notes_id, $user_id]);
$note = $stmt->fetch();

if (!$note) {
    die("Unauthorized access");
}

$stmt = $pdo->prepare("DELETE FROM notes WHERE id = ? AND user_id=?");
$stmt->execute([$notes_id, $user_id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
header("Location: ../public/dashboard.php");
exit;



