import $ from 'jquery';

export default function images() {

    
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


    imagesInput.addEventListener("change", function() {
        handleFiles(imagesInput.files);
    });


    function handleFiles(files) {
        var fileList = [];
        for (var i = 0; i < files.length; i++) {
            fileList.push({ name: files[i].name });
        }
        dropArea.dataset.fileList = JSON.stringify(fileList);
    }

        submitButton.addEventListener("click", () => {
            const image1 = imagesInput.files[0];
            const image2 = imagesInput.files[1];
            const image3 = imagesInput.files[2];

            const formData = new FormData();
            formData.append('image1', image1);
            formData.append('image2', image2);
            formData.append('image3', image3);

            $.ajax({
                url: "/groups/uploadImagesMember",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: response => {
                    console.log(response);
                },
                error: error => {
                    console.log("Error: ", error);
                }
            })
        })

    });
}