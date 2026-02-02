<?php

// require "../config/db.php";
require "../middleware/bootstrap.php";
require "../middleware/auth.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $notes_title = trim($_POST["title"] ?? "");
    $notes_content = trim($_POST["content"] ?? "");

    if ($notes_title === "" || $notes_content === "") {
        $errors[] = "Title and Content cannot be empty";
    }

    if (count($errors) === 0) {
        $user_id = $_SESSION["user_id"];

        $stmt = $pdo->prepare("INSERT INTO notes (user_id,title,content) VALUES (?,?,?)");
        $stmt->execute([$user_id, $notes_title, $notes_content]);

        header("Location: ../public/dashboard.php");
        exit;
    }
}