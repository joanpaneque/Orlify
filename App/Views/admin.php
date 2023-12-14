<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="/main.css">
    <script src="/js/bundle.js"></script>
    <meta allocation="admin">
    <meta allocation="inputBlock">
    <title>Administració</title>
</head>
<body>


<!-- Add bots modal -->
<div id="botsModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <form method="POST" action="/admin/addBots">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900" id="botsModal__title">
                    Afegir bots
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="botsModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4" id="csvModal__body">
                <input type="number" name="botsAmount" id="botsModal__bots" min="1" max="100" value="1" class="w-20 h-10 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-transparent">
            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button id="botsModal__update" data-modal-hide="botsModal" type="submit" class="DataTableButton red opaque mr-2">Afegir bots</button>
                <button data-modal-hide="botsModal" type="button" class="DataTableButton black opaque">Cancel·lar</button>
            </div>
            </form>

        </div>
    </div>
</div>

<!-- Import CSV modal -->
<div id="csvModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900" id="csvModal__title">
                    Importar CSV
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="csvModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4" id="csvModal__body">
                <input type="file" name="image" id="csvModal__file" accept=".csv">
            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button id="csvModal__update" data-modal-hide="csvModal" type="button" class="DataTableButton red opaque mr-2">Importar usuaris</button>
                <button data-modal-hide="csvModal" type="button" class="DataTableButton black opaque">Cancel·lar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit modal -->
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

<!-- Add modal -->
<div id="addModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900" id="addModal__title">
                    Creació d'usuari
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="addModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4" id="addModal__body">
                <form autocomplete="off" action="/admin/createuser" method="POST">
                    <div class="inputBlock">
                        <label for="name" class="white">Nom</label>
                        <input type="text" name="name" class="inputField" required>
                    </div>
                    <div class="inputBlock">
                        <label for="surnames" class="white">Cognoms</label>
                        <input type="text" name="surnames" class="inputField" required>
                    </div>
                    <div class="inputBlock">
                        <label for="username" class="white">Nom d'usuari</label>
                        <input type="text" name="username" class="inputField" required>
                    </div>
                    <div class="inputBlock">
                        <label for="email" class="white">Email</label>
                        <input type="email" name="email" class="inputField" required>
                    </div>
                    <div class="inputBlock">
                        <label for="password" class="white">Contrasenya</label>
                        <input type="password" name="password" class="inputField" required>
                    </div>
                    <div class="inputBlock">
                        <label for="repeatPassword" class="white">Repetir contrasenya</label>
                        <input type="password" name="repeatPassword" class="inputField" required>
                    </div>
                    <button type="hidden" id="addModal__submit">Submit</button>           
                </form>
            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button id="addModal__create" data-modal-hide="addModal" type="button" class="DataTableButton red opaque mr-2">Crear usuari</button>
                <button data-modal-hide="addModal" type="button" class="DataTableButton black opaque">Cancel·lar</button>
            </div>
        </div>
    </div>
</div>

<div class="container">

<div class="tableOptions">
    <button class="roundedRedButton m-0" data-modal-target="addModal" data-modal-toggle="addModal">Afegir usuari</button>
    <button class="roundedRedButton m-0" data-modal-target="csvModal" data-modal-toggle="csvModal">Importar CSV</button>
    <button class="roundedLightRedButton m-0" data-modal-target="botsModal" data-modal-toggle="botsModal">Afegir bots</button>
</div>


    <table id="adminTable" data-roles='<?=json_encode($roles)?>' class="display">
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
</div>
</body>
</html>
