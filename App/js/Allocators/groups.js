import select2 from 'select2';
import $ from 'jquery';

let groupId = null;
let selectedUserId = null;

export default function groups() {
    $("#togglePortraits").change(() => {
        if (!groupId) {
            $("#togglePortraits").prop("checked", false);
            console.log("No has seleccionat cap grup");
            return;
        }

        $.ajax({
            type: 'POST',
            url: '/portraits/togglePortrait',
            data: { groupId: groupId },
            success: (response) => {
                console.log(response);
            },
            error: (error) => {
                console.error(error);
                $("#togglePortraits").prop('checked', !marked);
            }
        });
    });

    $("#classSelect").change(function () {
        groupId = $(this).val();

        $.ajax({
            type: "POST",
            url: "/groups/getMembers",
            data: { selectedValue: groupId },
            success: (response) => {
                updateUsers(response.users);
                updatePortrait(groupId);
            },
            error: (error) => {
                console.error(error);
            }
        });
    });

    var imagesInput = document.getElementById("images");
    var submitButton = document.getElementById("submitButton");
    
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
    
    
    $("#memberSelect").on("change.select2", function (e) {
        // selectedUserId = $(this).find(":selected").data("userid");
        // console.log("Selected User ID:", $(e.target).val(), $("#memberSelect option:selected").data());
        // $("#memberSelect:selected").data()

        selectedUserId = $(e.target).val();
    });

    $("#submitButton").click(() => {
        const image1 = imagesInput.files[0];
        const image2 = imagesInput.files[1];
        const image3 = imagesInput.files[2];
        const userId = selectedUserId;
        // console.log(userId);
    
        const formData = new FormData();
        formData.append('image1', image1);
        formData.append('image2', image2);
        formData.append('image3', image3);
        formData.append('userId', userId);
        // console.log(userId);

        $.ajax({
            url: "/groups/uploadImagesMember",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.log("Error: ", error);
            }
        });
    
        return false;
    });


    // $("#memberSelect").on("change.select2", function (e) {
    //     const userId = selectedUserId;
    
    //     const formData = new FormData();
    //     formData.append('userId', userId);

    //     $.ajax({
    //         url: "/groups/images",
    //         type: 'POST',
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         dataType: "json",
    //         success: function (response) {
    //             if (response.error) {
    //                 displayImages(response);
    //                 // updateImages(response.urls)
    //             } else {
    //                 console.log("Error: " + response.message);
    //             }
    //         },
    //         error: function (error) {
    //             console.log("Errores: ", error);
    //         }
    //     });
    
    //     return false;
    // });

    $("#memberSelect").on("change.select2", function (e) {
        const userId = $("#memberSelect").val();
    
        const formData = new FormData();
        formData.append('userId', userId);
    
        $.ajax({
            url: "/groups/images",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                displayImages(response.images);
            },
            error: function (error) {
                console.log("Error: ", error);
            }
        });
    
        return false;
    });
    
    function displayImages(images) {
        const container = $(".flex-row");
        container.empty();
    
        // Agrega una imagen predeterminada si no hay imágenes en la respuesta
        if (!images || images.length === 0) {
            container.append(`<img src="https://via.placeholder.com/150" alt="Imagen Predeterminada" class="object-cover w-24 h-24">`);
            container.append(`<img src="https://via.placeholder.com/150" alt="Imagen Predeterminada" class="object-cover w-24 h-24">`);
            container.append(`<img src="https://via.placeholder.com/150" alt="Imagen Predeterminada" class="object-cover w-24 h-24">`);
            container.append(`<img src="https://via.placeholder.com/150" alt="Imagen Predeterminada" class="object-cover w-24 h-24">`);
            container.append(`<img src="https://via.placeholder.com/150" alt="Imagen Predeterminada" class="object-cover w-24 h-24">`);
            container.append(`<img src="https://via.placeholder.com/150" alt="Imagen Predeterminada" class="object-cover w-24 h-24">`);
            
            return;
        }
    
        images.forEach(function (image) {
            const imgElement = `<img src="${image}" alt="Square 2" class="object-cover w-24 h-24">`;
            container.append(imgElement);
        });
    }
    
    
    

    function updateUsers(users) {
        console.log(users);
        $("#memberSelect").empty();
        $("#memberSelect").append(`<option value="">Selecciona un alumno</option>`);

        users.forEach(user => {
            $("#memberSelect").append(`
                <option class="member-option" data-userid="${user.id}" value="${user.id}">${user.name}</option>
            `);
        });
    }

    function updatePortrait(groupId) {
        $.ajax({
            type: "GET",
            url: "/portraits/isActivated",
            data: { groupId: groupId },
            success: (data) => {
                if (!data.error) {
                    $("#togglePortraits").prop("checked", data.isActivated);
                    return;
                }
                $("#togglePortraits").prop("checked", false);
                console.log(data);
            },
            error: (err) => {
                console.log(err);
            }
        });
    }
}
