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

    foreach ($errors as $key => $err) {
        echo "$err <br>";
    }

    ?>
    <p class="font-semibold text-2xl mb-4">Register</p>
    <form method="post">
        <div class="input-box mb-4">
            <input type="email" name="email" class="border rounded-xs border-black" placeholder="E-mail Address">
        </div>
        <div class="input-box mb-4">
            <input type="password" name="password" class="border rounded-xs border-black" placeholder="Password">
        </div>
        <div class="input-box mb-4">
            <input type="password" name="conf_password" class="border rounded-xs border-black"
                placeholder="Confirm Password">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
        </div>
        <div class="input-box">
            <button type="submit" class="border px-4 py-1 rounded-2xl">Register</button>
        </div>
    </form>
    <a href="login.php">Login</a>
</body>

</html>