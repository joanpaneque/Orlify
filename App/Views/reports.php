<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <link rel="stylesheet" href="/main.css"/>
    <script src="/js/bundle.js" ></script>
    <meta allocation="reports">

    <title>Tu Página</title>
</head>
<body>

    <header class="primary text-white p-4">
        <h1 class="text-2xl font-semibold">Orlify</h1>
    </header>

    <div class="mx-auto my-8 p-8 bg-gray shadow-lg rounded-lg">

        <h1 class="title">Reports d'usuaris</h1>

        <table id="tables" class="table-auto min-w-full reportsTable">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2">Usuari</th>
                    <th class="py-2">Descripció</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody style="overflow: hidden; border-radius: 15px;">  
                <?php foreach ($reports as $report): ?>
                    <tr class="text-center hover:bg-gray-100" data-report-id="<?= $report['id']; ?>" data-marked="<?= $report['marked']; ?>">
                        <td class="py-2"><?= $report['name']; ?></td>
                        <td class="py-2"><?= $report['description']; ?></td>
                        <td class="py-2">
                            <input type="checkbox" name="toggleReports" class="loginCheckbox hover:cursor-pointer toggleReportsCheckbox" data-report-id="<?= $report['id']; ?>" <?php echo $report['marked'] ? 'checked' : ''; ?>/>
                        </td>
                    </tr>
                <?php endforeach; ?>  
            </tbody>
        </table>
    </div>
</body>
</html>
