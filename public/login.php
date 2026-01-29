<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . "/includes/styles.php"; ?>
    <title>Login</title>
</head>

<body class="font-roboto">
    <?php
    require "../auth/login.php";

    foreach ($errors as $key => $err) {
        echo "$err <br>";
    }
    ?>
    <div class="w-full max-w-xs mx-auto">
        <p class="font-semibold text-2xl my-5 py-5 text-center">Login</p>
        <form method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="input-box mb-4">
                <input type="email" name="email" placeholder="E-mail Address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="E-mail Address" value="<?= $email ?>">
            </div>
            <div class="input-box mb-4">
                <input type="password" name="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="E-mail Address">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
            </div>
            <div class="input-box">
                <div class="flex items-center justify-between">
                    <button type="submit" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
                    <a href="register.php" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Register</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>