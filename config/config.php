<?php

// $host = "localhost";
// $dbname = "secure_notes";
// $user = "root";
// $pass = "";
// $host = "sql210.infinityfree.com";
// $dbname = "if0_41059758_secure_notes";
// $user = "if0_41059758";
// $pass = "dQHdeaW0iEa";


if ($_SERVER['SERVER_NAME'] === 'localhost') {
    $host = "localhost";
    $dbname = "secure_notes";
    $user = "root"; 
    $pass = "";
} else {
    $host = getenv('DB_HOST');
    $dbname = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASS');
    
}