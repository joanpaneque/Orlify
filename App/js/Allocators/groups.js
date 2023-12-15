// import $ from 'jquery';

// let groupId = null;

// export default function groups() {

//     $("#togglePortraits").change(e => {
//         if (!groupId) {
//             $("#togglePortraits").prop("checked", false);
//             return console.log("No has seleccionat cap grup");
//         }

//         $.ajax({
//             type: 'POST',
//             url: '/portraits/togglePortrait',
//             data: { groupId: groupId }, 
//             success: function (response) {
//                 console.log(response);
//             },
//             error: function (error) {
//                 console.error(error);
//                 checkbox.prop('checked', !marked);
//             }
//         });
//     })

//     $("#classSelect").change(function() {
//         groupId = $(this).val();

//         $.ajax({
//             type: "POST",
//             url: "/groups/getMembers",
//             data: { selectedValue: groupId },
//             success: function(response) {
//                 updateUsers(response.users);
//                 updatePortrait(groupId);
//             },
//             error: function(error) {
//                 console.error(error);
//             }
//         });
//     });

//     var imagesInput = document.getElementById("images");
//     var submitButton = document.getElementById("submitButton");




//         submitButton.addEventListener("click", function () {
            
//             $("#memberSelect").change(function () {
//                 var selectedUserId = $(this).find(":selected").data("userid");
//                 console.log("Selected User ID:", selectedUserId);
//             });

//             const image1 = imagesInput.files[0];
//             const image2 = imagesInput.files[1];
//             const image3 = imagesInput.files[2];
//             const userId = selectedUserId;
    
//             const formData = new FormData();
//             formData.append('image1', image1);
//             formData.append('image2', image2);
//             formData.append('image3', image3);
//             formData.append('userId', userId);

//             $.ajax({
//                 url: "/groups/uploadImagesMember",
//                 type: "POST",
//                 data: formData,
//                 processData: false,
//                 contentType: false,
//                 dataType: "json",
//                 success: function (response) {
//                     if (response.error) {
//                         displayImages(response.imageUrls);
//                     } else {
//                         console.log("Error: " + response.message);
//                     }
//                 },
//                 error: function (error) {
//                     console.log("Error: ", error);
//                 }
//             });
    
//             return false;
//         });

    

//     // function updateUsers(users) {
//     //     console.log(users);
//     //     $("#memberSelect").empty();
//     //     $("#memberSelect").append(`<option>Selecciona un alumno</option>`); 

//     //     users.forEach(user => {
//     //         $("#memberSelect").append(`
//     //             <option value="${user.id}">${user.name}</option>
//     //         `)
//     //     })
//     // }

//     function updateUsers(users) {
//         console.log(users);
//         $("#memberSelect").empty();
//         $("#memberSelect").append(`<option>Selecciona un alumno</option>`);
    
//         users.forEach(user => {
//             $("#memberSelect").append(`
//                 <option class="member-option" data-userid="${user.id}" value="${user.id}">${user.name}</option>
//             `);
//         });
//     }

    
//     function updatePortrait(groupId) {

//         $.ajax({
//             type: "GET",
//             url: "/portraits/isActivated",
//             data: { groupId: groupId },
//             success: data => {
//                 if (!data.error) {
//                     $("#togglePortraits").prop("checked", data.isActivated);
//                     return;
//                 }
//                 $("#togglePortraits").prop("checked", false);
//                 console.log(data);
//             },
//             error: err => {
//                 console.log(err);
//             }
//         })
     
//     }
//   }


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

    $("#memberSelect").change(function () {
        selectedUserId = $(this).find(":selected").data("userid");
        console.log("Selected User ID:", selectedUserId);
    });

    $("#submitButton").click(() => {
        const image1 = imagesInput.files[0];
        const image2 = imagesInput.files[1];
        const image3 = imagesInput.files[2];
    
        const formData = new FormData();
        formData.append('image1', image1);
        formData.append('image2', image2);
        formData.append('image3', image3);
        formData.append('userId', selectedUserId);
    
        $.ajax({
            url: "/groups/uploadImagesMember",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: (response) => {
                if (response.error) {
                    console.log("Error: " + response.message);
                } else {
                    displayImages(response.imageUrls);
                }
            },
            error: (error) => {
                console.log("Error: ", error);
            }
        });
    
        return false;
    });



    function updateUsers(users) {
        console.log(users);
        $("#memberSelect").empty();
        $("#memberSelect").append(`<option>Selecciona un alumno</option>`);

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
