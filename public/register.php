<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . "/includes/styles.php"; ?>
    <title>Register</title>
</head>

<body class="font-roboto">
    <?php
    require "../auth/register.php";
    // echo "<ul class='text-red-500 text-xs italic'>";
    // foreach ($errors as $key => $err) {
    //     echo "<li>$err </li>";
    // }
    // echo "</ul>";
    
    ?>
    <div class="w-full max-w-xs mx-auto">
        <p class="font-semibold text-2xl my-5 py-5 text-center">Create a new account</p>
        <form method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="input-box mb-5">
                <input type="email" name="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="E-mail Address">
            </div>
            <div class="input-box mb-5">
                <input type="password" name="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Password" autocomplete="password">
            </div>
            <div class="input-box mb-5">
                <input type="password" name="conf_password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Confirm Password" autocomplete="conf_password">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
            </div>
            <div class="input-box">
                <div class="flex items-center justify-between flex-col gap-4">
                    <button type="submit"
                        class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Register</button>
                    <div class="flex items-center justify-between gap-2">
                        <p class='text-indigo-400 text-xs italic'>Already have account ?</p>
                        <a href="login.php"
                            class="inline-block align-baseline font-bold text-sm text-purple-500 hover:text-purple-800">Login</a>
                    </div>
                </div>
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