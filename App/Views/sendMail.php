<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/main.css">
    <title>Email enviat</title>
</head>
<body>
    <div class="h-screen flex items-center justify-center p-6">
        <div class="grid gap-6 text-center max-w-lg">
            <h1 class="title">
                Correu enviat!
            </h1>
            <div class="titleBottomBar"></div>
            <p class="text-gray-700 grayMessage">Si <strong><?=$email?></strong> està associat amb un compte, rebrà un correu de recuperació.</p>
            <a href="/login" class="roundedRedButton">Iniciar sessió</a>
        </div>
    </div>
</body>
</html>