<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>

<body>
    <?php

    require "../config/db.php";
    require "../middleware/auth.php";

    $note_id = $_GET["id"] ?? null;

    if (!$note_id) {
        die("Note note found");
    }


    $stmt = $pdo->prepare("SELECT * from notes WHERE id=? AND user_id=?");
    $stmt->execute([$note_id, $_SESSION["user_id"]]);
    $note = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>
    <p>Are you sure you want to delete?</p>
    <p><?= htmlspecialchars($note["title"]) ?></p>
    <form action="../notes/delete.php?id=<?= $note['id'] ?>" method="post">
        <button type="submit">Yes</button>
        <a href="../public/dashboard.php">No</a>
    </form>
</body>

</html>