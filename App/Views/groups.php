<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-xrA5zzZDXUeKdZRZzdD2pmjPglwZb6TjxEyt7gdxvBnjX6U9bRQcCzVT4+P++hOgfzPo0Upj9mKD+L3vPR1NzRw=="
        crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="/js/bundle.js"></script>
    <meta allocation="images">
    <title>Orlify</title>
</head>

<body class="bg-gray-100">

    <div class="bg-red-500 p-4 flex items-center">
        <a class="text-white mb-2 mr-4" href="/login">
            <p>Orlify</p>
        </a>
        <a class="text-white ml-auto mb-2" href="/login">
            <p>Tencar Sesión</p>
        </a>
    </div>
    <h1 class="mt-8 text-center text-4xl md:text-6xl font-extrabold text-red-500">
        ¡Administra les teves clases!
    </h1>



    <form class="mt-8 space-y-6" action="" method="POST" enctype="multipart/form-data">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex items-center justify-center">
                <select id="classSelect"
                    class="sm:mx-2 select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full md:w-7/12 sm:w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-2">
                    <option value="">Selecciona una clase</option>
                    <option value="clase1">Clase 1</option>
                    <option value="clase2">Clase 2</option>
                    <option value="miembro2">Miembro 2</option>
                    <option value="profesor">Profesor</option>
                </select>
            </div>
            <div class="flex items-center justify-center md:mt-0">
                <select id="memberSelect"
                    class="sm:mx-2 select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full md:w-7/12 sm:w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-2">
                    <option value="">Selecciona un integrante</option>
                    <option value="clase1">Clase 1</option>
                    <option value="clase2">Clase 2</option>
                    <option value="miembro2">Miembro 2</option>
                    <option value="profesor">Profesor</option>
                </select>
            </div>
        </div>



        <!-- Div Azul-->
        <div class="flex flex-col md:flex-row">
            <div class="bg-blue-900 w-full md:w-1/3 h-96 rounded ml-0 md:ml-1 mx-2 relative flex md:ml-32 mb-12 md:mb-0">
                <div class="bg-white absolute bottom-2 right-2 h-12 w-20 rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 384 512"
                        class="mt-2 ml-3"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #ff0f0f
                            }
                        </style>
                        <path
                            d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z" />
                    </svg>
                    <p class="text-red-500 absolute bottom-2.5 right-3 font-bold">
                        PDF
                    </p>
                </div>

                <div class="bg-white absolute bottom-2 right-20 h-12 w-20 rounded flex items-center mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"
                        class="ml-1 mt-2"><!--!Font Awesome Free 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path fill="#ff0000"
                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                    </svg>
                    <p class="text-red-500 absolute bottom-2.5 right-3 font-bold">
                        Activa
                    </p>
                </div>

            </div>
            <!-- Div Rojo-->
            <div class=" w-full md:w-1/3 h-96 rounded  ml-0 md:ml-64 flex flex-col mb-28 md:mb-0">
                <div class="bg-slate-200 w-auto h-32 rounded">
                    <div class="col-span-6 md:col-span-4">
                        <div class="grid grid-cols-5 gap-4 mt-5">
                            <div class="w-full overflow-hidden rounded-lg ml-5 ">
                                <img src="https://via.placeholder.com/150" alt="Square 1"
                                    class="rounded-full w-28 h-24">
                            </div>
                            <div class="w-full overflow-hidden rounded-lg ml-10 md:ml-6">
                                <img src="https://via.placeholder.com/150" alt="Square 2"
                                    class="object-cover w-24 h-24 ">
                            </div>
                            <div class="w-full overflow-hidden rounded-lg ml-10 md:ml-6">
                                <img src="https://via.placeholder.com/150" alt="Square 3"
                                    class="object-cover w-24 h-24">
                            </div>
                            <div class="w-full overflow-hidden rounded-lg ml-10 md:ml-6">
                                <img src="https://via.placeholder.com/150" alt="Square 3"
                                    class="object-cover w-24 h-24">
                            </div>
                            <?php foreach($images as $image) { ?>
                            <img src="<?=$image?>">
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 mt-auto w-auto h-52 ">
                    <div class="col-span-4 ">
                        <div class="relative w-full h-52 overflow-hidden border-dashed border-2 border-gray-300 rounded-md">
                        <div class="bg-slate-200 flex items-center h-full justify-center">
                                <div id="dropArea">
                                    <p>Arrastra y suelta imágenes aquí o haz clic para seleccionarlas.</p>
                                    <input type="file" id="images" multiple accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    

  

</body>

</html>