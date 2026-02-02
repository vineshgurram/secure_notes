<?php

if (!isset($_SESSION["user_email"])) {
    header("Location: ../public/login.php");
    exit;
}