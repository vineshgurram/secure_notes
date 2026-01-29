<?php 

require "../config/db.php";
require "../middleware/auth.php";

$note_id = $_GET["id"] ?? null;

if(!$note_id){
die("Note note found");
}


$stmt = $pdo -> prepare("SELECT * from notes WHERE id=? AND user_id=?");
$stmt -> execute([$note_id,$_SESSION["user_id"]]);
$note = $stmt->fetch(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($note);
echo "</pre>";




