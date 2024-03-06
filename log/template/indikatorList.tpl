<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indikator Tabelle</title>
    <!-- Bootstrap CSS einbinden -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css" rel="stylesheet">
    <style>
        .table {
            background-color: #E3F2FD; /* Hellblau */
            border-radius: 0.25rem;
            overflow: hidden;
        }

        .table thead th {
            background-color: #B3D7FF; /* Hellblau */
            color: #0056b3; /* Dunkleres Blau für den Text */
        }

        .long-entry {
            background-color: #d4edda; /* Hellgrün für 'long' Einträge */
        }

        .short-entry {
            background-color: #f8d7da; /* Hellrot für 'short' Einträge */
        }

        .table tbody tr:hover {
            background-color: #B3E5FC; /* Hervorhebung beim Hover */
        }

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
        
        /* Vorherige Stile */
    
        .title-box {
            background-color: #B3D7FF; /* Hellblau */
            padding: 10px 20px;
            border-radius: 10px; /* Abgerundete Ecken */
            color: #0056b3; /* Dunkleres Blau für den Text */
            margin-bottom: 20px; /* Abstand nach unten */
            display: flex;
            justify-content: space-between; /* Inhalte auseinander schieben */
            align-items: center; /* Vertikales Zentrieren */
        }
        
        .back-button {
            background-color: #B3D7FF; /* Hellblau */
            color: #fff; /* Weißer Text */
            border: none;
            padding: 5px 15px;
            border-radius: 5px; /* Leicht abgerundete Ecken */
            text-decoration: none; /* Keine Unterstreichung */
            font-weight: bold;
        }
        
        .back-button:hover {
            background-color: #99ccff; /* Dunkleres Blau beim Hover */
        }
        
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="title-box">
        <h2>Indikator Tabelle</h2>
        <a href="javascript:history.back()" class="back-button">Zurück</a>
    </div>
    
            
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Tag</th>
                        <th>Zeit</th>
                        <th>Coin</th>
                        <th>Indikator</th>
                        <th>Entry</th>
                        <th>Match gefunden</th>
                        <th>Abgeglichene IDs</th>
                        <th>Geprüft</th>
                        <th>Bestätigt</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $indikatoren as $indikator}
                    <tr class="{if $indikator.entry == 'long'}long-entry{elseif $indikator.entry == 'short'}short-entry{/if}">
                        <td>{$indikator.id}</td>
                        <td>{$indikator.tag}</td>
                        <td>{$indikator.zeit}</td>
                        <td>{$indikator.coin}</td>
                        <td>{$indikator.indikator}</td>
                        <td>{$indikator.entry}</td>
                        <td>{$indikator.match_found}</td>
                        <td>{$indikator.matched_ids}</td>
                        <td>{$indikator.checked}</td>
                        <td>{if $indikator.is_confirmed}Ja{else}Nein{/if}</td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
