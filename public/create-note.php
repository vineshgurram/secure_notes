<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . "/includes/styles.php"; ?>
    <title>Create Notes</title>
</head>
<body>
    <?php
    require "../notes/create.php";

    foreach ($errors as $key => $err) {
        echo "$err <br>";
    }
    
    ?>
    <p class="font-semibold text-2xl mb-4">Create Notes</p>
    <form method="post">
        <div class="input-box mb-4">
            <input type="text" name="title" placeholder="Title" class="border rounded-xs border-black">
        </div>
        <div class="input-box mb-4">
            <textarea name="content" placeholder="Content" class="border rounded-xs border-black"></textarea>
        </div>
        <div class="input-box">
            <button type="submit" class="border px-4 py-1 rounded-2xl">Create</button>
        </div>
    </form>
</body>
</html>