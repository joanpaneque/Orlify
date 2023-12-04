<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/main.css">
    <script src="/js/bundle.js"></script>
    <meta allocation="inputBlock">
    <title>Document</title>
</head>
<body class="bg-gray-100">
  <div class=" flex flex-row items-center justify-center text-center relative">
  <a href="/login"><p class="absolute top-0 left-0 font-bold">Orlify</p></a>
    <div class="grid gap-6 text-center flex-1">
      <h1 class="titlered">
        Registrar-se
      </h1>
      <div class="titleBottomBar"></div> 

      <form action="/register/register" method="POST" class="mt-6 flex-grow hhh">
        <div class="inputBlock">
          <label for="name">Nom</label>
          <input type="text" name="name" class="inputField" required>
        </div>
        <div class="inputBlock">
          <label for="surname">surnames</label>
          <input type="text" name="surnames" class="inputField" required>
        </div>
        <div class="inputBlock">
          <label for="username">username</label>
          <input type="text" name="username" class="inputField" required>
        </div>
        <div class="inputBlock">
          <label for="mail">Correu electronic</label>
          <input type="mail" name="email" class="inputField" required>
        </div>
        <div class="inputBlock">
          <label for="password">Contrasenya</label>
          <input type="password" name="password" class="inputField" required>
        </div>
        <div class="inputBlock">
          <label for="password">Confirmar Contrasenya</label>
          <input type="password" name="password2" class="inputField" required>
        </div>
        <a href="/login"><button type="submit" class="roundedRedButton">Registrar-se</button></a>
      </form>

      <p class="font-bold">Ja tens compte? <a href="/login" class="text-red-600">Inicia Sessió</a></p>
    </div>
                <div class="hidden lg:flex min-h-screen w-1/2 flex flex-col bg-red-500 items-center justify-center text-center">
                <h1 class="title2">
                    Ja ets usuari?
                </h1>
                <div class="titleBottomBar2"></div>
                <p class="text-white mt-10">Si ja ets un usuari de Orlify</p>
                <p class="text-white ">inicia sessió des de la pàgina</p>
                <p class="text-white ">d'inici de sessió</p>
            <a href="/login"><button type="submit" class="roundedWhiteButton">Iniciar Sessió</button></a>
                </div>
  </div>
</body>
</html>