<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>    
    <title>Orlify</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto min-h-screen bg-gray-100 p-4">
        <div class="max-w-3xl mx-auto space-y-8">
            <div>
                <h1 class="mt-8 text-center text-6xl font-extrabold text-red-500">
                    Administra les teves classes!
                </h1>
            </div>
            <form class="mt-8 space-y-6" action="process.php" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-3 md:col-span-1">
                        <label for="class" class="sr-only">Classe</label>
                        <select id="class" name="class" class="js-select2 appearance-none w-full px-3 py-2.5 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-base">
                            <option value="" disabled selected>Selecciona una classe</option>
                            <option value="clase1">Clase 1</option>
                            <option value="clase2">Clase 2</option>
                            <option value="miembro2">Miembro 2</option>
                            <option value="profesor">Profesor</option>
                        </select>
                    </div>
                    <div class="col-span-3 md:col-span-1">
                        <label for="members" class="sr-only">Membres</label>
                        <select id="members" name="members" class="js-select2 appearance-none w-full px-3 py-2.5 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-base">
                            <option value="" disabled selected>Selecciona el número de membres</option>
                            <option value="1">1 miembro</option>
                            <option value="2">2 membres</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Otras secciones de formulario -->

                    <div class="col-span-6 md:col-span-4">
                        <div class="grid grid-cols-5 gap-4">
                            <div class="w-full overflow-hidden rounded-lg">
                                <img src="https://via.placeholder.com/150" alt="Square 1" class="object-cover w-full h-full">
                            </div>
                            <div class="w-full overflow-hidden rounded-lg">
                                <img src="https://via.placeholder.com/150" alt="Square 2" class="object-cover w-full h-full max-h-full max-w-full">
                            </div>
                            <div class="w-full overflow-hidden rounded-lg">
                                <img src="https://via.placeholder.com/150" alt="Square 3" class="object-cover w-full h-full">
                            </div>
                            <div class="w-full overflow-hidden rounded-lg">
                                <img src="https://via.placeholder.com/150" alt="Square 3" class="object-cover w-full h-full">
                            </div>
                            <div class="w-full overflow-hidden rounded-lg">
                                <img src="https://via.placeholder.com/150" alt="Square 3" class="object-cover w-full h-full">
                            </div>
                        </div>
                    </div>

                    <!-- Otras secciones de formulario -->

                    <div class="col-span-4">
                        <div class="relative w-full h-64 overflow-hidden border-dashed border-2 border-gray-300 rounded-md">
                            <div class="flex items-center h-full justify-center">
                                <label for="file" class="cursor-pointer text-center">
                                    <div class="mb-2">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M25 44l-6-6H6c-2.209 0-4-1.791-4-4V6c0-2.209 1.791-4 4-4h36c2.209 0 4 1.791 4 4v28c0 2.209-1.791 4-4 4H27l-6 6z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-indigo-500">Arrastra y suelta o haz clic para seleccionar una foto</span>
                                    <input id="file" name="file" type="file" required class="hidden">
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="col-span-3">
                        <div class="relative w-full h-64 overflow-hidden">
                            <div class="flex items-center h-full">
                                <img src="https://via.placeholder.com/500" alt="Description" class="w-full h-full max-w-full max-h-full">
                                <div class="absolute bottom-0 right-20 p-2">
                                    <input type="checkbox" id="activarCheckbox" class="hidden">
                                    <label for="activarCheckbox" class="flex items-center bg-blue-500 text-white px-1 py-1 cursor-pointer">
                                        <span class="inline-block w-4 h-4 border border-white rounded mr-2"></span>
                                        Activar
                                    </label>
                                </div>
                                <div class="absolute bottom-0 right-0 p-2">
                                    <button class="bg-green-500 text-white px-2 py-1 ml-2">Botón 2</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.js-select2').select2();

            const fileInput = document.getElementById('file');
            const fileContainer = document.querySelector('.relative.w-full.h-64');

            fileContainer.addEventListener('dragover', (e) => {
                e.preventDefault();
                fileContainer.classList.add('border-indigo-500');
            });

            fileContainer.addEventListener('dragleave', () => {
                fileContainer.classList.remove('border-indigo-500');
            });

            fileContainer.addEventListener('drop', (e) => {
                e.preventDefault();
                fileContainer.classList.remove('border-indigo-500');

                const droppedFile = e.dataTransfer.files[0];

                if (droppedFile) {
                    fileInput.files = new DataTransfer().files;
                    fileInput.files.add(droppedFile);
                }
            });
        });
    </script>
</body>
</html>


