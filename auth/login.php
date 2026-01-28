<?php

require "../config/db.php";

session_start();

$email = "";
$errors = [];

if (empty($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        !isset($_POST["csrf_token"]) ||
        !hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])
    ) {
        die("Invalid CSRF token");
    }

    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");


    if ($email === "" || $password === "") {
        $errors[] = "All field is required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email";
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT * FROM  users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user["password"])) {
            $errors[] = "Invalid email or password";
        } else {
            // echo "Correct Password";
            session_regenerate_id(true);
            $errors[] = "Wrong Password";
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_email"] = $user["email"];
            header("Location: ../public/dashboard.php");
            exit;
        }
    }
}