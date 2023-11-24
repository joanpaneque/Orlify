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
                <th>Nom</th>
                <th>Cognoms</th>
                <th>Nom d'usuari</th>
                <th>Correu electrònic</th>
                <th>Rol</th>
                <th>Carnet</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr userId="<?=$user["id"]?>">
                    <td><input class="DataTableInput" type="text" name="name" id="name" value="<?=$user["name"]?>"></td>
                    <td><input class="DataTableInput" type="text" name="surnames" id="surnames" value="<?=$user["surnames"]?>"></td>
                    <td><input class="DataTableInput" type="text" name="username" id="username" value="<?=$user["username"]?>"></td>
                    <td><input class="DataTableInput" type="text" name="email" id="email" value="<?=$user["email"]?>"></td>
                    <td>
                        <select class="DataTableSelect" name="role" id="role">
                            <?php foreach ($roles as $role) { ?>
                                <option value="<?=$role["id"]?>" <?php if($user["roleId"] == $role["id"]) echo "selected"; ?>><?=$role["name"]?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><?=$user["cardUrl"]?></td>
                    <td>
                        <button class="updateUser">Actualitzar</button>
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
