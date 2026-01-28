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
    <p class="font-semibold text-2xl mb-4">Login</p>
    <form method="post">
        <div class="input-box mb-4">
            <input type="email" name="email" placeholder="E-mail Address" class="border rounded-xs border-black"
                placeholder="E-mail Address" value="<?= $email ?>">
        </div>
        <div class="input-box mb-4">
            <input type="password" name="password" placeholder="Password" class="border rounded-xs border-black"
                placeholder="E-mail Address">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
        </div>
        <div class="input-box mb-4">
            <button type="submit" class="border px-4 py-1 rounded-2xl">Login</button>
        </div>
    </form>
</body>

</html>