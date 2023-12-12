import $ from 'jquery';

export default function groups() {
    $("#classSelect").change(function() {
        var selectedValue = $(this).val();

        $.ajax({
            type: "POST",
            url: "/groups/getMembers",
            data: { selectedValue: selectedValue },
            success: function(response) {
                updateUsers(response.users);
            },
            error: function(error) {
                console.error(error);
            }
        });
    });

    function updateUsers(users) {
        console.log(users);
        $("#memberSelect").empty();
        $("#memberSelect").append(`<option>Selecciona un integrante</option>`);

        users.forEach(user => {

            $("#memberSelect").append(`
                <option value="${user.id}">${user.name}</option>
            `)
        })
    }
}