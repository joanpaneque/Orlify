<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="/main.css">
    <script src="/js/bundle.js"></script>
    <meta allocation="admin">
    <title>Administració</title>
</head>
<body>
<div id="editModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900" id="editModal__title">
                    Editar
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="editModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4" id="editModal__body">
            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button id="editModal__update" data-modal-hide="editModal" type="button" class="DataTableButton red opaque mr-2">Actualitzar</button>
                <button data-modal-hide="editModal" type="button" class="DataTableButton black opaque">Cancel·lar</button>
            </div>
        </div>
    </div>
</div>
    <table class="display" id="adminTable" data-roles='<?=json_encode($roles)?>'>
        <thead>
            <tr>
                <th>Nom d'usuari</th>
                <th>Rol</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr userId="<?=$user["id"]?>" data-user='<?=json_encode($user)?>'>
                    <!-- < type="hidden" name="test" value="test"></td> -->
                    <td><?=$user["username"]?></td>
                    <td><?= $roles[array_search($user["roleId"], array_column($roles, 'id'))]["name"]?></td>
                    <td>
                        <button id="edit" data-modal-target="editModal" data-modal-toggle="editModal" class="DataTableButton green">Editar</button>
                        
                        <form method="POST" action="/admin/deleteUser" style="display: inline-block">
                            <input type="hidden" name="userId" value="<?=$user["id"]?>">
                            <button class="DataTableButton red">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
    </script>
</body>
</html>
