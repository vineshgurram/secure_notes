<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . "/includes/styles.php"; ?>
    <title>Dashboard</title>
</head>

<body class="font-roboto">
    <?php

    require "../middleware/auth.php";
    require "../auth/dashboard.php";

    ?>
    <p class="font-semibold text-2xl mb-4">Dashboard</p>
    <p>You are logged in as: <?= htmlspecialchars($_SESSION["user_email"]) ?></p>
    <a class="underline text-red-400" href="../auth/logout.php">Logout</a>
    <a href="create-note.php" class="underline text-yellow-400">Create</a>

    <?php if (count($notes) === 0): ?>
        <p class="text-md font-bold text-green-500">No notes yet</p>
    <?php else: ?>
        <?php foreach ($notes as $note): ?>
            <div class="task-box border">
                <p><?= htmlspecialchars($note["title"]) ?></p>
                <p><?= htmlspecialchars($note["content"]) ?></p>
                <a href="edit-note.php?<?= $note['id'] ?>" class="underline text-green-400">Edit</a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>

</html>