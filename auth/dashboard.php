<?php
// require "../config/db.php";
require "../middleware/bootstrap.php";
require "../middleware/auth.php";


// $user_id = $_SESSION["user_id"];
// $stmt = $pdo -> prepare("SELECT * FROM notes WHERE user_id = ?");
// $stmt -> execute([$user_id]);
// $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$limit = 3;
$page = $_GET["page"] ?? 1;
$page = max(1, (int) $page);
$offset = ($page - 1) * $limit; 
// (1-1) * 5 = 0 * 5 = 0 
// (2-1) * 5 = 1 * 5 = 5
// (3-1) * 5 = 2 * 5 = 10


$stmt = $pdo->prepare("SELECT * FROM notes
WHERE user_id = ? 
ORDER BY created_at 
DESC LIMIT ? OFFSET ?");

$stmt->bindValue(1, $_SESSION["user_id"], PDO::PARAM_INT);
$stmt->bindValue(2, $limit, PDO::PARAM_INT);
$stmt->bindValue(3, $offset, PDO::PARAM_INT);
$stmt->execute();
$fetch_notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$countStmt = $pdo->prepare("
    SELECT COUNT(*) FROM notes WHERE user_id = ?
");
$countStmt->execute([$_SESSION['user_id']]);
$totalNotes = $countStmt->fetchColumn();
$totalPages = ceil($totalNotes / $limit);