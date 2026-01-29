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
    <div class="container mx-auto px-5 py-5 my-5">
        <p class="font-semibold text-2xl mb-4">Dashboard</p>
        <div class="flex justify-between mb-5">
            <p>You are logged in as: <span class='text-red-500 text-sm italic border-black-500'>
                    <?= htmlspecialchars($_SESSION["user_email"]) ?></span></p>
            <div>
                <a class="underline text-red-400" href="../auth/logout.php">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 1159.000000 1280.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)" fill="#000000"
                            stroke="none">
                            <path d="M5670 12794 c-211 -39 -265 -56 -400 -125 -325 -166 -551 -477 -615
-846 -23 -129 -23 -4957 0 -5086 102 -585 611 -1002 1189 -974 550 27 995 424
1091 974 23 129 23 4957 0 5086 -83 477 -438 849 -905 952 -73 16 -310 28
-360 19z" />
                            <path d="M2467 10350 c-262 -41 -504 -169 -676 -356 -30 -32 -114 -122 -187
-199 -1192 -1257 -1749 -2904 -1568 -4634 163 -1566 1004 -3040 2279 -3996
1436 -1077 3258 -1429 4995 -964 573 154 1158 418 1671 755 1151 757 2012
1930 2388 3254 264 933 291 1946 75 2884 -213 924 -646 1777 -1268 2496 -133
153 -277 301 -290 297 -6 -2 -42 22 -81 53 -320 262 -741 335 -1133 196 -77
-28 -223 -108 -295 -164 -101 -77 -140 -115 -217 -214 -306 -394 -328 -936
-54 -1349 61 -93 186 -224 275 -290 140 -103 395 -463 553 -777 186 -371 293
-733 348 -1172 17 -140 17 -612 0 -750 -83 -652 -301 -1205 -671 -1700 -539
-721 -1305 -1196 -2191 -1360 -391 -72 -865 -72 -1258 0 -706 130 -1351 468
-1857 975 -969 969 -1281 2409 -798 3685 127 335 319 670 549 955 98 122 249
283 321 343 492 410 551 1154 129 1640 -162 187 -365 310 -616 372 -97 24
-327 35 -423 20z" />
                        </g>
                    </svg>
                </a>
            </div>
        </div>
        <div class="mb-5">
            <a href="create-note.php" class="underline text-yellow-400">
                <svg viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" fill="#000000" style="font-size:20px;width:20px">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <rect x="0" fill="none" width="24" height="24"></rect>
                        <g>
                            <path
                                d="M21 14v5c0 1.105-.895 2-2 2H5c-1.105 0-2-.895-2-2V5c0-1.105.895-2 2-2h5v2H5v14h14v-5h2z">
                            </path>
                            <path d="M21 7h-4V3h-2v4h-4v2h4v4h2V9h4"></path>
                        </g>
                    </g>
                </svg></a>
        </div>
        <?php if (count($notes) === 0): ?>
            <p class="text-md font-bold text-green-500">No notes yet</p>
        <?php else: ?>
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($notes as $note): ?>
                    <div
                        class="task-box w-full h-64 flex flex-col justify-between items-start bg-blue-300 rounded-lg border border-blue-300 mb-6 py-5 px-4">
                        <div>
                            <h3 class="text-gray-800 font-bold mb-3"><?= htmlspecialchars($note["title"]) ?></h3>
                            <p class="text-gray-800 text-sm"><?= htmlspecialchars($note["content"]) ?></p>
                        </div>
                        <div class="flex justify-between align-middle w-full flex-nowrap">
                            <p class="text-sm flex-auto"><?= $note["created_at"] ?></p>
                            <div class="flex justify-end gap-2">
                                <a href="edit-note.php?id=<?= $note['id'] ?>"
                                    class="w-8 h-8 rounded-full bg-gray-800 text-white inline-flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-pink-300   focus:ring-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                                        width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                    </svg></a>
                                <a href="delete-note.php?id=<?= $note['id'] ?>"
                                    class="w-8 h-8 rounded-full bg-gray-800 text-white inline-flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-pink-300   focus:ring-black">

                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 6.98996C8.81444 4.87965 15.1856 4.87965 21 6.98996" stroke="#fff"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M8.00977 5.71997C8.00977 4.6591 8.43119 3.64175 9.18134 2.8916C9.93148 2.14146 10.9489 1.71997 12.0098 1.71997C13.0706 1.71997 14.0881 2.14146 14.8382 2.8916C15.5883 3.64175 16.0098 4.6591 16.0098 5.71997"
                                            stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 13V18" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M19 9.98999L18.33 17.99C18.2225 19.071 17.7225 20.0751 16.9246 20.8123C16.1266 21.5494 15.0861 21.9684 14 21.99H10C8.91389 21.9684 7.87336 21.5494 7.07541 20.8123C6.27745 20.0751 5.77745 19.071 5.67001 17.99L5 9.98999"
                                            stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>