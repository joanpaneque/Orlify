<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imágenes</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        #dropArea {
            width: 100%;
            height: 200px;
            border: 2px dashed #ccc;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div id="dropArea">
        <p>Arrastra y suelta imágenes aquí o haz clic para seleccionarlas.</p>
        <input type="file" id="images" multiple accept="image/*">
    </div>
    <button id="submitButton" style="margin-top: 10px;">Enviar</button>

    <script>
        $(document).ready(function() {
            var dropArea = document.getElementById("dropArea");
            var imagesInput = document.getElementById("images");
            var submitButton = document.getElementById("submitButton");

            dropArea.addEventListener("dragover", function(e) {
                e.preventDefault();
                dropArea.style.border = "2px dashed #000";
            });

            dropArea.addEventListener("dragleave", function() {
                dropArea.style.border = "2px dashed #ccc";
            });

            dropArea.addEventListener("drop", function(e) {
                e.preventDefault();
                dropArea.style.border = "2px dashed #ccc";
                handleFiles(e.dataTransfer.files);
            });

            dropArea.addEventListener("click", function() {
                imagesInput.click();
            });

            imagesInput.addEventListener("change", function() {
                handleFiles(imagesInput.files);
            });

            submitButton.addEventListener("click", function() {
                var filenames = [];
                var fileList = dropArea.dataset.fileList ? JSON.parse(dropArea.dataset.fileList) : [];
                for (var i = 0; i < fileList.length; i++) {
                    filenames.push(fileList[i].name);
                }
                sendFiles(filenames);
            });

            function handleFiles(files) {
                var fileList = [];
                for (var i = 0; i < files.length; i++) {
                    fileList.push({ name: files[i].name });
                }
                dropArea.dataset.fileList = JSON.stringify(fileList);
            }

            function sendFiles(filenames) {
                console.log("Nombres de archivos:", filenames);
                
                $.ajax({
                    type: "POST",
                    url: "/groups/uploadImagesMember",
                    data: { filenames: filenames },
                    success: function(response) {
                        console.log(response);
                        dropArea.dataset.fileList = "";
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }
        });
    </script>
</body>
</html>
