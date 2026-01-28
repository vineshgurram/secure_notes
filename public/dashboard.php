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
    <a href="create-note.php">Create</a>
</body>
</html>