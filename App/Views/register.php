<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="/main.css">
    <title>Document</title>
</head>



<body class="bg-gray-100">
  <div class=" flex flex-row items-center justify-center text-center relative">
  <p class="absolute top-0 left-0 font-bold">Orlify</p>
    <div class="grid gap-6 text-center flex-1">
      <h1 class="titlered">
        Registrar-se
      </h1>
      <div class="titleBottomBar"></div> 
      <form action="/recover/sendMail" method="POST" class="mt-6 flex-grow">
        <div class="inputBlock">
          <label for="nom">Nom</label>
          <input type="text" name="nom" class="inputField" required>
        </div>
        <div class="inputBlock">
          <label for="cognnom">Cognoms</label>
          <input type="text" name="cognom" class="inputField" required>
        </div>
        <div class="inputBlock">
          <label for="mail">Correu electronic</label>
          <input type="mail" name="mail" class="inputField" required>
        </div>
        <div class="inputBlock">
          <label for="password">Contrasenya</label>
          <input type="password" name="password" class="inputField" required>
        </div>
        <div class="inputBlock">
          <label for="password">Confirmar Contrasenya</label>
          <input type="password" name="password" class="inputField" required>
        </div>
        <a href="/recover"><button type="submit" class="roundedRedButton">Registrar-se</button></a>
      </form>
      <p class="font-bold">Ja tens compte? <a href="/recover" class="text-red-600">Inicia Sessió</a></p>
    </div>
                <div class="hidden lg:flex min-h-screen w-1/2 flex flex-col bg-red-500 items-center justify-center text-center">
                <h1 class="title2">
                    Ja ets usuari?
                </h1>
                <div class="titleBottomBar2"></div>
                <p class="text-white mt-10">Si ja ets un usuari de Orlify</p>
                <p class="text-white ">inicia sessió des de la pàgina</p>
                <p class="text-white ">d’inici de sessió</p>
            <a href="/recover"><button type="submit" class="roundedWhiteButton">Iniciar Sessió</button></a>
                </div>
  </div>








<script>
        const inputBlocks = document.querySelectorAll('.inputBlock');
        const firstInput = inputBlocks[0].querySelector('input');


        inputBlocks.forEach(inputBlock => {
            const input = inputBlock.querySelector('input');
            const label = inputBlock.querySelector('label');

            input.addEventListener('focus', () => {
                label.classList.add('active');
            });

            input.addEventListener('blur', () => {
                if (input.value === '') {
                    label.classList.remove('active');
                }
            });
        });

        firstInput.focus();
    </script>
</body>
</html>