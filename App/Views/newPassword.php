<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Nova contrasenya</title>
</head>
<body class="flex items-center justify-center h-screen">
    <div class="text-center mx-4">
        <h1 class="text-red-500 text-4xl font-bold mb-4">
            <?php if ($error) { ?>
                Error canviant la contrasenya
            <?php } else { ?>
                Contrasenya canviada
            <?php } ?>
        </h1>
        <div class="bg-gray-800 h-2 w-16 mx-auto mb-4"></div>
        <p class="text-gray-700 mb-8"><?= $message ?></p>
        <?php if (!$error) { ?>
            <p class="text-gray-700 mb-8">Correu: <?= $email ?></p>
            <p class="text-gray-700 mb-8">Contrasenya: <?= $password ?></p>
        <?php } ?>
        <form action="/login" method="GET">
            <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded">Iniciar sessió</button>
        </form>
    </div>
</body>
</html>