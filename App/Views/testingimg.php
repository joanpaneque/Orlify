<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imágenes</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/js/bundle.js" ></script>
    <meta allocation="images">
</head>
<body>

    <!-- <div id="dropArea">
        <p>Arrastra y suelta imágenes aquí o haz clic para seleccionarlas.</p>
        <input type="file" id="images" multiple accept="image/*">
    </div>
    <button id="submitButton" style="margin-top: 10px;">Enviar</button> -->

    <input type="file" id="images" multiple>
    <button id="submitButton">Submit</button>
    <div id="imageContainer"></div>

    <?php foreach($images as $image) { ?>
        <img src="<?=$image?>">
    <?php } ?>

</body>
</html>