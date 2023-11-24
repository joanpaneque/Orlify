<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/main.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/dataTables.jqueryui.min.css">
        
    <title>Administració</title>
</head>
<body>
    <table class="display" id="adminTable">
        <thead>
            <tr>
                <th>Nom d'usuari</th>
                <th>Rol</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr userId="<?=$user["id"]?>">
                    <td><?=$user["username"]?></td>
                    <td><?= $roles[array_search($user["roleId"], array_column($roles, 'id'))]["name"]?></td>
                    <td>
                        <button class="updateUser">Editar</button>
                        <button class="deleteUser">Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
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
    </script>
</body>
</html>
