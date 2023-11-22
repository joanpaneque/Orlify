<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="text-center mx-4">
        <h1 class="text-red-500 text-4xl font-bold mb-4">Recuperar accés</h1>
        <div class="bg-gray-800 h-2 w-16 mx-auto mb-4"></div>
        <form action="/recover/sendMail" method="post" class="max-w-md mx-auto bg-white p-4 border border-gray-300">
            <label for="email" class="text-gray-700 block mb-2">Correu Electronic</label>
            <input type="text" id="email" name="email" class="border-b border-gray-500 focus:outline-none focus:border-red-500 px-4 py-2 w-full">
            <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded mt-4">Enviar</button>
        </form>
    </div>
</body>
</html>








