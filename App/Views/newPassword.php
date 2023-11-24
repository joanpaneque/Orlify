<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/main.css">
    <title>Nova contrasenya</title>
</head>
<body>
    <div class="h-screen flex items-center justify-center p-6">
        <div class="grid gap-6 text-center max-w-lg">
            <h1 class="title">
                <?php if ($error) { ?>
                    Error al recuperar
                <?php } else { ?>
                    Contrasenya canviada
                <?php } ?>
            </h1>
            <div class="titleBottomBar"></div>
            <p class="text-gray-700 grayMessage"><?=$message?></p>
            <?php if (!$error) { ?>
                <p class="text-gray-700">Correu: <strong><?=$email?></strong></p>
                <p class="text-gray-700">Contrasenya: <strong><?=$password?></strong></p> 
                <a href="/login?email=<?=$email?>" class="roundedRedButton">Iniciar sessió</a>
            <?php } else { ?>
                <a href="/recover" class="roundedGrayButton">Tornar a recuperar</a>
                <a href="/login" class="roundedRedButton">Iniciar sessió</a>
            <?php } ?>
        </div>
    </div>
</body>
</html>