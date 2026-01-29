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
    
    ?>
    <div class="w-full max-w-xs mx-auto py-5 my-5">
        <p class="font-semibold text-2xl mb-5 text-center">Create Notes</p>
        <form method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="input-box mb-4" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <input type="text" name="title" placeholder="Title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="input-box mb-4">
                <textarea name="content" placeholder="Content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="input-box">
                <button type="submit" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</button>
            </div>
        </form>
                <?php if ($errors): ?>
            <ul class='text-red-500 text-xs italic p-2 border border-red-500'>
                <?php foreach ($errors as $err): ?>
                    <li><?= htmlspecialchars(string: $err) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <?= "" ?>
        <?php endif; ?>
    </div>
</body>
</html>