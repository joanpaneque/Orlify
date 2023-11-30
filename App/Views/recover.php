<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/main.css">
    <script src="/js/bundle.js"></script>
    <meta allocation="inputBlock">
    <title>Recuperar contrasenya</title>
</head>
<body view="recover.php">
    <div class="h-screen flex items-center justify-center p-6">
        <div class="grid gap-6 text-center max-w-lg">
            <h1 class="title">
                Recuperar accés
            </h1>
            <div class="titleBottomBar"></div> 
            <form action="/recover/sendMail" method="POST" class="mt-6">
                <div class="inputBlock">
                    <label for="email">Correu electrònic</label>
                    <input type="email" name="email" class="inputField" required>
                </div>
                <button type="submit" class="roundedRedButton">Recuperar accés</button>
            </form>
        </div>
    </div>
</body>
</html>