<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imágenes</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta allocation="images">
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

    <?php foreach($images as $image) { ?>
    <img src="<?=$image?>">
    <?php } ?>

</body>
</html>
