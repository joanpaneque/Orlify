<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Webcam</title>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <div class="bg-red-500 flex items-center">
        <a class="font-bold text-white mb-2" href="/frontPage">
            <p>Orlify</p>
        </a>
    </div>

    <div class="text-center mt-3 mb-5">
        <h1 class="text-dark-500 text-4xl md:text-6xl font-bold">
            Treu-te una foto!
        </h1>
    </div>

    <div class="flex justify-center mb-5">
        <!-- Botones para capturar y reiniciar -->
        <button id="capturarBtn" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Fer la foto
        </button>
        <button id="nuevaFotoBtn" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 ml-4 rounded">
            Nova foto
        </button>
        <a href="/groups">
            <button id="submitButton" class="bg-blue-500 hover:bg-red-700 text-white font-bold py-2 px-4 ml-4 rounded">
                Enviar
            </button>
        </a>
    </div>

    <!-- Div para mostrar la foto capturada -->
    <div id="fotoContainer" class="flex justify-center mb-5"></div>

    <!-- Nuevo div para la webcam -->
    <div id="webcamContainer" class="flex justify-center mt-5"></div>

    <!--SCRIPT Poniendo al allocator no funciona por eso esta aqui -->
    <script>
       document.addEventListener("DOMContentLoaded", function () {
            var capturarBtn = document.getElementById("capturarBtn");
            var nuevaFotoBtn = document.getElementById("nuevaFotoBtn");
            var submitButton = document.getElementById("submitButton");
            var stream;
            var video;
            var fotoContainer = document.getElementById("fotoContainer");
            var webcamContainer = document.getElementById("webcamContainer");
            var fotoCapturada = false;

            // Deshabilitar el botón de enviar inicialmente
            submitButton.disabled = true;

            function iniciarCaptura() {
                navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                    .then(function (streamObtenido) {
                        stream = streamObtenido;
                        video = document.createElement("video");
                        webcamContainer.appendChild(video);
                        video.srcObject = stream;
                        video.play();
                    })
                    .catch(function (error) {
                        console.error("Error al acceder a la cámara web: ", error);
                    });
            }

            iniciarCaptura();

            capturarBtn.addEventListener("click", function () {
                capturarFoto();
            });

            nuevaFotoBtn.addEventListener("click", function () {
                // Limpiar el contenedor y permitir al usuario capturar otra foto
                fotoContainer.innerHTML = '';
                webcamContainer.innerHTML = '';
                iniciarCaptura();

                // Deshabilitar el botón de enviar al reiniciar la captura
                submitButton.disabled = true;

                // Actualizar la variable de estado de captura
                fotoCapturada = false;
            });

            function capturarFoto() {
                var canvas = document.createElement("canvas");
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext("2d");
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

                var fotoBase64 = canvas.toDataURL("image/jpeg");

                var nuevaImagen = document.createElement("img");
                nuevaImagen.src = fotoBase64;

                fotoContainer.innerHTML = '';
                fotoContainer.appendChild(nuevaImagen);

                detenerCamaraYEliminarVistaPrevia();

                // Habilitar el botón de enviar después de capturar la foto
                submitButton.disabled = false;

                // Actualizar la variable de estado de captura
                fotoCapturada = true;
            }

            function detenerCamaraYEliminarVistaPrevia() {
                if (stream) {
                    stream.getTracks().forEach(track => track.stop());
                    stream = null;
                }

                if (video) {
                    video.pause();
                    video.srcObject = null;
                    webcamContainer.removeChild(video);
                    video = null;
                }
            }

            submitButton.addEventListener("click", function () {
                if (fotoCapturada) {
                    // Solo enviar la foto si se ha capturado una
                    enviarFotoAlServidor();
                } else {
                    // Mensaje de error o lógica adicional si no se ha capturado una foto
                    console.error("Debes capturar una foto antes de enviarla.");
                }
            });

            function enviarFotoAlServidor() {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "procesar_foto.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.responseText);
                    }
                };

                var datos = "foto=" + encodeURIComponent(fotoBase64);
                xhr.send(datos);
            }
        });
    </script>
</body>

</html>