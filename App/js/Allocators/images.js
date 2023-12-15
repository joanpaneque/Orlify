// import $ from 'jquery';

// // import { userId } from './groups.js';

// // console.log(userId);

// export default function images() {


//     $(document).ready(function () {
//         var imagesInput = document.getElementById("images");
//         var submitButton = document.getElementById("submitButton");
//         var userId = document.getElementsByName("userId");
    
//         submitButton.addEventListener("click", function (event) {
//             event.preventDefault();
    
//             const image1 = imagesInput.files[0];
//             const image2 = imagesInput.files[1];
//             const image3 = imagesInput.files[2];
    
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
    
//         function displayImages(imageUrls) {
//             console.log(imageUrls);
//         }
//     });    
// }