<?php
require "../auth/login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . "/includes/styles.php"; ?>
    <title>Login</title>
</head>

<body class="font-roboto">
    <div class="w-full max-w-xs mx-auto">
        <p class="font-semibold text-2xl my-5 py-5 text-center">Login to account</p>
        <form method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
            <div class="input-box mb-4">
                <input type="email" name="email" placeholder="E-mail Address"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="E-mail Address" value="<?= $email ?>">
            </div>
            <div class="input-box mb-4">
                <input type="password" name="password" placeholder="Password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="E-mail Address">
            </div>
            <div class="input-box">
                <div class="flex items-center justify-between flex-col gap-4">
                    <button type="submit"
                        class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
                    <div class="flex items-center justify-center gap-2">
                        <p class='text-indigo-400 text-xs italic'>Create a account ?</p>
                        <a href="register.php"
                            class="inline-block align-baseline font-bold text-sm text-purple-500 hover:text-purple-800">Register</a>
                    </div>
                </div>
            </div>
        </form>
        <?php if ($errors): ?>
            <ul class='text-red-500 text-xs italic p-2 border border-red-500'>
                <?php foreach ($errors as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <?= "" ?>
        <?php endif; ?>
    </div>
</body>

</html>