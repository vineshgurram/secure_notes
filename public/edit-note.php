<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . "/includes/styles.php"; ?>
    <title>Edit</title>
</head>

<body>
    <?php

    require "../config/db.php";
    require "../middleware/auth.php";

    $notes_title = "";
    $notes_content = "";

    $notes_id = $_GET["id"] ?? null;
    echo $notes_id;

    if (!$notes_id) {
        die("Note not found");
    }


    $stmt = $pdo->prepare("SELECT * FROM notes WHERE id=?");
    $stmt->execute([$notes_id]);
    $note = $stmt->fetch(PDO::FETCH_ASSOC);

    // echo "<pre>";
// print_r($note);
// echo "</pre>";
    

    $notes_title = $note["title"];
    $notes_content = $note["content"];

    ?>
    <div class="w-full max-w-xs mx-auto py-5 my-5">
        <p class="font-semibold text-2xl mb-5 text-center">Edit Notes</p>
        <form method="post" action="../notes/update.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="input-box">
                <input type="hidden" name="id" value="<?= htmlspecialchars($notes_id) ?>">
                <input type="text" name="title" placeholder="Title" value="<?= htmlspecialchars($notes_title) ?>">
            </div>
            <div class="input-box">
                <textarea name="content" placeholder="Content" rows="4"
                    cols="50"><?= htmlspecialchars($notes_content) ?></textarea>
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            </div>
            <div class="input-box">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>

</html>