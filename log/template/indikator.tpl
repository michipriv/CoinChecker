<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indikator Tabelle</title>
    <!-- Bootstrap CSS einbinden -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hintergrundfarbe der Tabelle und abgerundete Ecken */
        .table {
            background-color: #E3F2FD; /* Hellblau */
            border-radius: 0.25rem;
            overflow: hidden; /* Stellt sicher, dass die abgerundeten Ecken sichtbar sind */
        }

        /* Hintergrundfarbe der Tabellenkopfzeile anpassen auf Hellgrün */
        .table thead th {
            background-color: #C8E6C9; /* Hellgrün */
            color: #256029; /* Dunkelgrün für besseren Kontrast */
        }

        /* Hover-Effekt für Tabellenzeilen */
        .table tbody tr:hover {
            background-color: #B3E5FC; /* Noch helleres Blau für Hover */
        }

        /* Abgerundete Ecken für die erste und letzte Zelle jeder Zeile */
        .table tbody tr td:first-child,
        .table tbody tr th:first-child {
            border-top-left-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        .table tbody tr td:last-child,
        .table tbody tr th:last-child {
            border-top-right-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Indikator Tabelle</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tag</th>
                        <th>Zeit</th>
                        <th>Coin</th>
                        <th>Indikator</th>
                        <th>Entry</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $indikatoren as $indikator}
                    <tr>
                        <td>{$indikator.id}</td>
                        <td>{$indikator.tag}</td>
                        <td>{$indikator.zeit}</td>
                        <td>{$indikator.coin}</td>
                        <td>{$indikator.indikator}</td>
                        <td>{$indikator.entry}</td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
