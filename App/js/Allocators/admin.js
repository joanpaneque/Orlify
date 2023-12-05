import $ from 'jquery';
import 'datatables.net';
import 'flowbite';

import inputBlock from './inputBlock.js';
import inputSelect from './inputSelect.js';

export default async function admin() {
    $("#adminTable").DataTable({
        "language": {
            "decimal": "",
            "emptyTable": "No hi ha dades disponibles a la taula",
            "info": "Mostrant _START_ a _END_ de _TOTAL_ entrades",
            "infoEmpty": "Mostrant 0 a 0 de 0 entrades",
            "infoFiltered": "(filtrades d'un total de _MAX_ entrades)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ entrades",
            "loadingRecords": "Carregant...",
            "processing": "Processant...",
            "search": "Cerca:",
            "zeroRecords": "No s'han trobat registres coincidents",
            "paginate": {
                "first": "Primer",
                "last": "Darrer",
                "next": "Següent",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": activar per ordenar la columna ascendentment",
                "sortDescending": ": activar per ordenar la columna descendentment"
            }
        }
    });

    const editUserFormTitle = $("#editModal__title");
    const editUserFormBody = $("#editModal__body");

    $("[userId] #edit").on("click", e => {
        const userRow = $(e.currentTarget).closest("[userId]");
        const data = JSON.parse(userRow[0].getAttribute("data-user"));
        const roles = JSON.parse($("#adminTable").attr("data-roles"));
        console.log(roles);

        editUserFormTitle.html(`Editant l'usuari <span class="primaryColor">${data["username"]}</span>`);
        editUserFormBody.empty();
        editUserFormBody.html(`
            <form action="/admin/updateUser" method="POST" autocomplete="off">
                <input type="hidden" name="userId" value="${data["id"]}">
                <div class="inputBlock">
                    <label for="email" class="white">Nom d'usuari</label>
                    <input type="text" name="username" class="inputField" value="${data["username"]}" required>
                </div>
                <div class="inputBlock">
                    <label for="name" class="white">Nom</label>
                    <input type="text" name="name" class="inputField" value="${data["name"]}" required>
                </div>
                <div class="inputBlock select">
                    <label for="role" class="white">Rol</label>
                    <input type="text" class="inputField" inputName="roleId" value="${roles.find(r => r.id == data["roleId"]).name}" hidden>
                    <div class="selectContainer">
                        ${roles.map(role => {
            return `<div class="selectOption" value="${role["id"]}" ${data["roleId"] == role["id"] ? "selected" : ""}>${role["name"]}</div>`;
        }).join("")}
                    </div>
                </div>                
                <div class="inputBlock">
                    <label for="surnames" class="white">Cognoms</label>
                    <input type="text" name="surnames" class="inputField" value="${data["surnames"]}" required>
                </div>
                <div class="inputBlock">
                    <label for="email" class="white">Correu electrònic</label>
                    <input type="email" name="email" class="inputField" value="${data["email"]}" required>
                </div>
                <div class="inputBlock">
                    <label for="password" class="white">Nova contrasenya</label>
                    <input type="password" name="password" class="inputField" value="">
                </div>
                <div class="inputBlock">
                    <label for="repeatPassword" class="white">Repetir contrasenya</label>
                    <input type="password" name="repeatPassword" class="inputField" value="">
                </div>

                <button type="submit" id="editModal__submitForm" class="hidden">Actualitzar</button>
            </form>
        `);

        inputBlock();
        inputSelect();
        $("#editModal__update").on("click", e => {
            e.preventDefault();
            $("#editModal__submitForm").click();
        });
    });

    $("#addModal__create").on("click", e => {
        e.preventDefault();
        $("#addModal__submit").click();
    });
}