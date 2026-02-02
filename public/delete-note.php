<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . "/includes/styles.php"; ?>
    <title>Delete</title>
</head>

<body>
    <?php

    // require "../config/db.php";
    require "../middleware/bootstrap.php";
    require "../middleware/auth.php";

    $note_id = $_GET["id"] ?? null;

    if (!$note_id) {
        die("Note note found");
    }


    $stmt = $pdo->prepare("SELECT * from notes WHERE id=? AND user_id=?");
    $stmt->execute([$note_id, $_SESSION["user_id"]]);
    $note = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>
    <div class="w-full max-w-md mx-auto py-5 my-5 h-lvh flex justify-center items-center">
        <div>
            <form action="../notes/delete.php?id=<?= $note['id'] ?>" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
                <p class="mb-2 text-lg font-semibold">Are you sure you want to delete ?</p>
                <p class="mb-4"><?= htmlspecialchars($note["title"]) ?></p>
                <button type="submit" class="cursor-pointer bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline me-3">Yes</button>
                <a href="../public/dashboard.php" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block">No</a>
            </form>
        </div>
    </div>
</body>

</html>