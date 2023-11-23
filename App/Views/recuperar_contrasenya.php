<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contrasenya</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen">
    <div class="text-center mx-4">
        <h1 class="text-red-500 text-4xl font-bold mb-4">Título</h1>
        <div class="bg-gray-800 h-2 w-16 mx-auto mb-4"></div>
        <p class="text-gray-700 mb-8"><?php echo "prueba@gmail.com" ?> S'ha generat una nova contrasenya d'accés per accedir</p>

        <p class="text-gray-700 mb-8"><?php echo "prueba@gmail.com" ?> contrasenya nueva<?php echo "12345"?></p>
        
        <form action="" method="post">
            <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded">Enviar</button>
        </form>

    </div>
</body>
</html>