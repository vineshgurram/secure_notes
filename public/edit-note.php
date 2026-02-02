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

    // require "../config/db.php";
    require "../middleware/bootstrap.php";
    require "../middleware/auth.php";

    $notes_title = "";
    $notes_content = "";

    $notes_id = $_GET["id"] ?? null;
    // echo $notes_id;

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
    <div class="w-full max-w-md mx-auto py-5 my-5">
        <p class="font-semibold text-2xl mb-5 text-center">Edit Notes</p>
        <form method="post" action="../notes/update.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="input-box mb-5">
                <input type="hidden" name="id" value="<?= htmlspecialchars($notes_id) ?>">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
                <input type="text" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Title" value="<?= htmlspecialchars($notes_title) ?>">
            </div>
            <div class="input-box mb-5">
                <textarea name="content" placeholder="Content" rows="10"
                    cols="50" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?= htmlspecialchars($notes_content) ?></textarea>
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            </div>
            <div class="input-box mb-5">
                <button type="submit" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
            </div>
        </form>
    </div>
</body>

</html>