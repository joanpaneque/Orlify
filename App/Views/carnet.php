<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Carnet</title>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-red-500 p-4 text-white text-center">
        <h1 class="text-2xl font-bold">Orlify</h1>
    </header>

    <h1 class="text-2xl font-bold p-4 text-red-500 text-center">Carnet</h1>
    
    <div class="container mx-auto my-8 flex items-center justify-center p-4 rounded-lg border border-gray-300 w-3/4">
    <!-- Sección de la foto con borde -->
    <div class="w-1/2 pr-4">
        <div class="border-r border-gray-300">
            <img src="/userData/50e312364e63704ac92fd2b2df352c0dc0a7dd23974b69bef7a305a72b6e351bjpg" alt="Imagen" class="mx-auto w-300 h-64 rounded-lg shadow-lg">
        </div>
    </div>

    <!-- Sección de la información sin borde -->
    <div class="w-1/2 px-8">
        <h2 class="text-3xl font-bold mb-4">Información del Carnet</h2>
        <p class="text-lg mb-2">Nombre: John Doe</p>
        <p class="text-lg mb-2">Fecha de Nacimiento: 01/01/1990</p>
        <p class="text-lg mb-2">Número de Carnet: 123456789</p>
        <!-- Agrega más información según tus necesidades -->

        <!-- Botón de descarga -->
        <button class="text-2xl font-bold p-4 text-red-500 text-center mt-4">Descargar carnet</button>
    </div>
</div>

    <!-- Footer -->
    <footer class="bg-red-500 p-4 text-white text-center mt-auto">
        <p>&copy; 2023 Todos los derechos reservados.</p>
    </footer>

</body>
</html>
