<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/main.css">
    <meta allocation="inputBlock">
    <script src="/js/bundle.js" defer></script>
    <title>Recuperar contrasenya</title>
</head>
<body>
    <div class="h-screen flex items-center justify-center p-6">
        <div class="grid gap-6 text-center max-w-lg">
            <h1 class="title">
                Iniciar sessió
            </h1>
            <div class="titleBottomBar"></div> 
            <form action="/login" method="POST" class="mt-6">
                <div class="inputBlock">
                    <label for="email">Correu electrònic</label>
                    <input type="email" name="email" id="email" class="inputField" required value="<?=$email?>">
                </div>
                <div class="inputBlock">
                    <label for="password">Contrasenya</label>
                    <input type="password" name="password" class="inputField" required aria-label="password">
                </div>
                <div class="grid grid-cols-2">
                    <div class="text-left flex items-center">
                        <!-- En un futur, si es vol implementar la funcionalitat de recordar-me, descomentar aquest codi -->
                        <!-- <input type="checkbox" name="remember" id="remember" class="loginCheckbox mr-2 hover:cursor-pointer">
                        <label class="hover:cursor-pointer" for="remember">Recordar-me</label> -->
                    </div>
                    <div class="text-right flex items-center">
                        <a class="hover:underline" href="/recover">Contrasenya oblidada?</a>
                    </div>
                </div>
                <div class="flex">
                    <a href="/register" class="roundedGrayButton">No tinc compte</a>
                    <button type="submit" class="roundedRedButton">Iniciar sessió</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
