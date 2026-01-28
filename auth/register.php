<?php

require "../config/db.php";
session_start();

$errors = [];

if (empty($_SESSION["crsf_token"])) {
    $_SESSION["crsf_token"] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_POST["crsf_token"]) || !hash_equals($_SESSION["crsf_token"], $_POST["crsf_token"])) {
        die("Invalid CSRF token");
    }
    
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $confPassword = trim($_POST["conf_password"] ?? "");

    if ($email === "" || $password === "" || $confPassword === "") {
        $errors[] = "All field is required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email";
    }

    if ($password !== $confPassword) {
        $errors[] = "Password not match";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be atleast 6 characters";
    }

    if (!count($errors)) {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->execute([$email, $hashPassword]);
            header("Location: ../public/login.php");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $errors[] = "Email already registered";
            } else {
                $errors[] = "Something went wrong";
            }
        }
    }
}