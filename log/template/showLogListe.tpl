<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-Liste</title>
    <!-- Einbinden des Bootstrap Litera CSS von Bootswatch -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Responsives Design für Mobilgeräte */
        @media (max-width: 768px) {
            table.table-responsive-sm {
                overflow-x: auto;
            }
        }
        
        /* Hover-Effekt für Tabellenzeilen */
        table.table tbody tr:hover {
            background-color: #f0f0f0; /* Hellgrau */
            transition: background-color 0.2s ease-in-out;
        }

        /* Hintergrundfarbe des Headers */
        .header {
            background-color: #ADD8E6; /* Hellblau */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4 header">Log-Liste</h2>
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Datum</th>
                    <th>Uhrzeit</th>
                    <th>Coin</th>
                </tr>
            </thead>
            <tbody>
                {foreach $logs as $log}
                    <tr onclick="window.location.href = '/log/log.php?action=showID&id={$log.id}'">
                        <td>{$log.id}</td>
                        <td>{$log.datum}</td>
                        <td>{$log.uhrzeit}</td>
                        <td>{$log.coin}</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
