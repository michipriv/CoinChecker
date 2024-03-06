<?php
session_start();  //wird für einmaligen alert benötigt, damit dieser nicht bei seiten refresh ausgelöst wird.

ini_set('display_errors', 1);
error_reporting(E_ALL);

$dbFile = 'indikator.sqlite'; // Pfad zur SQLite-Datenbank
$coins = ['BTCUSDT', 'ETHUSDT', 'RUNEUSDT'];






?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deine Webseite</title>
    <!-- Bootstrap CSS einbinden -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body {
			padding-left: 2cm;
			padding-right: 2cm;
		}
		.content-container {
			max-width: 40%; /* Maximale Breite auf 30% des Bildschirms beschränken */
			margin: auto; /* Zentriert den Container horizontal */
		}
		.coin-header {
			font-size: 18px;
			font-weight: bold;
			background-color: #4CAF50;
			color: white;
			padding: 10px;
			border-radius: 5px;
			margin-top: 20px;
			text-align: center; /* Zentriert den Text der Überschrift */
		}
		.table-responsive {
			overflow-x: auto; /* Ermöglicht horizontales Scrollen für kleinere Bildschirme */
		}
		.table thead th {
			background-color: #4CAF50;
			color: white;
		}
		.table {
			box-shadow: 0 2px 4px rgba(0,0,0,.1);
			border-radius: 5px;
			width: 100%; /* Stellt sicher, dass die Tabelle die Breite ihres Containers ausfüllt */
		}
		.entry-long {
			background-color: rgba(76, 175, 80, 0.15); /* 15% Sättigung Grün */
			color: #4CAF50; /* Dunkleres Grün für den Text, um Lesbarkeit zu gewährleisten */
		}
		.entry-short {
			background-color: rgba(244, 67, 54, 0.15); /* 15% Sättigung Rot */
			color: #f44336; /* Dunkleres Rot für den Text */
			}
			
		 .clock-container {
			background-color: #8BC34A; /* Helligeres Grün */
			color: white;
			font-size: 38px;
			text-align: center;
			padding: 20px;
			border-radius: 5px;
			width: fit-content;
			margin: 20px auto; /* Fügt auch vertikalen Abstand hinzu */
			position: absolute;
			top: 20px;
			right: 50px;
		}
		 .table-success {
        background-color: #e8f5e9; /* Helligeres Grün */
		}
		.table-danger {
			background-color: #ffebee; /* Helligeres Rot */
		}
		
		
		@media (max-width: 576px) { /* Bootstrap's kleiner Bildschirm Breakpoint */
			.no-padding-mobile {
				padding-left: 0 !important;
				padding-right: 0 !important;
			}
			.no-margin-mobile {
				margin-left: 0 !important;
				margin-right: 0 !important;
			}
			.container-fluid, .row, .col-12 {
				padding-left: 0 !important;
				padding-right: 0 !important;
				margin-left: 0 !important;
				margin-right: 0 !important;
			}
		}
		
		.container {
			width: 100%; /* oder eine spezifische Maximalbreite */
			margin: 0 auto; /* Zentriert den Container, falls weniger breit als der Viewport */
			padding: 20px; /* Abstand innen, passt du ggf. an deine Bedürfnisse an */
		}

		@keyframes blinkBackground {
			0% { background-color: white; }
			50% { background-color: red; }
			100% { background-color: white; }
		}

		.blinking-background {
			animation: blinkBackground 500ms infinite;
		}




	</style>

<script>
	// Funktion, um das Blinken zu starten
	function startBlinking() {
		document.body.classList.add("blinking-background");
	}

	// Funktion, um das Blinken zu stoppen
	function stopBlinking() {
		document.body.classList.remove("blinking-background");
	}

	document.addEventListener('DOMContentLoaded', (event) => {
		const confirmButton = document.getElementById("confirmAlarmButton");
		if(confirmButton) {
			confirmButton.addEventListener("click", function() {
				stopBlinking();
			});
		}
	});
</script>

<script>
function confirmAlert(alertId) {
    fetch('confirm_alert.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: alertId }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        // Hier könntest du die Seite neu laden oder nur den spezifischen Alert aus dem DOM entfernen
        location.reload();
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}
</script>




<!-- Optionales JavaScript -->
<!-- jQuery zuerst, dann Popper.js, dann Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>






</head>




<?php

function initializeDatabase() {
    global $dbFile;
	/*
    try {
        $pdo = new PDO('sqlite:' . $dbFile);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->exec("DROP TABLE IF EXISTS indikator");

        $pdo->exec("CREATE TABLE IF NOT EXISTS indikator (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            tag TEXT NOT NULL,
            zeit TEXT NOT NULL,
            coin TEXT NOT NULL,
            indikator TEXT NOT NULL,
            entry TEXT NOT NULL,
			is_confirmed BOOLEAN DEFAULT FALSE
        )");

        echo "Datenbank und Tabelle erfolgreich initialisiert.\n";
    } catch (PDOException $e) {
        echo "Datenbankfehler: " . $e->getMessage() . "\n";
        exit;
    }
	*/
	
}

function extendTable() {
     global $dbFile;
    $pdo = new PDO('sqlite:' . $dbFile);
	
	
	$sql = "
	
	SELECT MAX(id) AS latestId FROM indikator GROUP BY coin;
	
	";
	try {
		$pdo->exec($sql);
		echo "Spalte erfolgreich hinzugefügt.";
	} catch (PDOException $e) {
		echo "Ein Fehler ist aufgetreten: " . $e->getMessage();
	}
	
	
	
	
	//Beschreibung der tabelle anzeigen

    $sql = "PRAGMA table_info(indikator);";
    try {
        $stmt = $pdo->query($sql);
        $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Start der HTML-Tabelle
        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<tr><th>Name</th><th>Typ</th><th>Nicht Null</th><th>Standardwert</th><th>Primärschlüssel</th></tr>";

        // Durchlaufen der Spalten und Hinzufügen als Tabellenzeilen
        foreach ($columns as $column) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($column['name']) . "</td>";
            echo "<td>" . htmlspecialchars($column['type']) . "</td>";
            echo "<td>" . ($column['notnull'] ? "Ja" : "Nein") . "</td>";
            echo "<td>" . ($column['dflt_value'] !== null ? htmlspecialchars($column['dflt_value']) : "NULL") . "</td>";
            echo "<td>" . ($column['pk'] ? "Ja" : "Nein") . "</td>";
            echo "</tr>";
        }

        // Ende der Tabelle
        echo "</table>";
    } catch (PDOException $e) {
        echo "Ein Fehler ist aufgetreten: " . $e->getMessage();
    }
}

function showDatabaseContent($coinFilter = null) {
    global $dbFile;
    try {
        $pdo = new PDO('sqlite:' . $dbFile);

        $query = "SELECT * FROM indikator";
        $parameters = [];

        if (!is_null($coinFilter)) {
            $query .= " WHERE coin = :coinFilter";
            $parameters[':coinFilter'] = $coinFilter;
        }

        $query .= " ORDER BY id DESC";
        $stmt = $pdo->prepare($query);

        if ($stmt === false) {
            echo "<div class='alert alert-warning' role='alert'>Keine Einträge gefunden.</div>";
            return;
        }

        $stmt->execute($parameters);

        echo "<div class='table-responsive' style='max-width: 80%; margin: auto;'><table class='table table-bordered table-hover'>";
        // Entferne die Spalte "Übereinstimmung" aus der Tabellenkopfzeile
        echo "<thead class='thead-light'><tr><th>ID</th><th>Tag</th><th>Zeit UTC</th><th>Coin</th><th>Indikator</th><th>Eintrag</th><th>Match-IDs</th><th>Geprüft</th></tr></thead><tbody>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rowClass = $row['entry'] == 'long' ? 'table-success' : ($row['entry'] == 'short' ? 'table-danger' : '');

            
            echo "<tr class='" . $rowClass . "'><td>" . htmlspecialchars($row['id']) . "</td><td>" . htmlspecialchars($row['tag']) . "</td><td>" . htmlspecialchars($row['zeit']) . "</td><td>" . htmlspecialchars($row['coin']) . "</td><td>" . htmlspecialchars($row['indikator']) . "</td><td>" . htmlspecialchars($row['entry']) . "</td><td>" . ($row['matched_ids'] ?? 'N/A') . "</td><td>" . ($row['is_confirmed'] ? 'True' : 'False') . "</td></tr>";

        }
        echo "</tbody></table></div>";
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger' role='alert'>Datenbankfehler: " . $e->getMessage() . "</div>";
        exit;
    }
}




function processWebhook() {
    global $dbFile;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $content = file_get_contents("php://input");
        $data = json_decode($content, true);
        
		#debug file mit schreiben
		file_put_contents('debug_input.txt', $content . "\n", FILE_APPEND | LOCK_EX);

        if ($data) {
            try {
                $pdo = new PDO('sqlite:' . $dbFile);
                $stmt = $pdo->prepare("INSERT INTO indikator (tag, zeit, coin, indikator, entry) VALUES (:tag, :zeit, :coin, :indikator, :entry)");

       
				// Umwandlung und Formatierung der Zeit
                
                $timeUTC =  new DateTime($data['time']);
                $timeUTC->add(new DateInterval('PT1H')); // Eine Stunde zu 'time' hinzufügen für 'timeutc'
                $tag = $timeUTC->format('Y-m-d'); // Formatieren von 'time'
				$zeit = $timeUTC->format('H:i:s'); // Formatieren von 'timeutc'
       
	   
                $stmt->execute([
                    ':tag' => $tag,
                    ':zeit' => $zeit,
                    ':coin' => $data['coin'],
                    ':indikator' => $data['indikator'],
                    ':entry' => $data['entry'],
                ]);

                echo json_encode(["status" => "success", "message" => "Daten erfolgreich empfangen und gespeichert"]);
            } catch (PDOException $e) {
                echo json_encode(["status" => "error", "message" => "Datenbankfehler: " . $e->getMessage()]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Fehler beim Empfangen der Daten"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Nur POST-Anfragen sind erlaubt"]);
    }
}





function showLatestEntriesPerCoin() {
    global $dbFile;
    global $coins;
    try {
        $pdo = new PDO('sqlite:' . $dbFile);

        echo "<div class='container-fluid mt-4 px-0'>"; 

		//test blinken Alarm
        // echo "<script>startBlinking();</script>";

        foreach ($coins as $coin) {
            echo "<div class='row mx-0'>";
            echo "<div class='col-12 px-0'>";
            
			echo "<div class='coin-header mb-3' id='coinHeader{$coin}'>{$coin}</div>";

            $stmt = $pdo->prepare("SELECT * FROM indikator WHERE coin = :coin AND is_confirmed = FALSE ORDER BY id DESC LIMIT 2");

            $stmt->execute([':coin' => $coin]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $entriesToShow = [];
			$gotSignal[$coin]=false;  //eindeutiges Signal für coin bekommen
            if (count($results) > 0) {
                if (count($results) == 1 || $results[0]['indikator'] !== $results[1]['indikator']) {
                    if (count($results) == 2) {
                        $timeDiff = abs(strtotime($results[0]['zeit']) - strtotime($results[1]['zeit']));
                        if ($results[0]['entry'] === $results[1]['entry'] && $timeDiff <= 1200) {
                            $entriesToShow = $results;
							$gotSignal[$coin] = true;  //gültiges Signal für diesen Indikator bekommen, qqe und trendmeter sind beide valid innerhalb der zeit
                        } else {
                            $entriesToShow[] = $results[0]; // Zeige nur den neuesten Eintrag
                        }
                    } else {
                        $entriesToShow[] = $results[0];
                    }
                } else {
                    // Wenn die letzten zwei Einträge gleiche Indikatoren haben, zeige nur den aktuellsten
                    $entriesToShow[] = $results[0];
                }
                
                if (!empty($entriesToShow)) {
                    // Generiere Nachricht das ein neues Indikator paar/Coin da ist
                    $aktuelleZeit = date('H:i:s');

					if ( $gotSignal[$coin]) {
						echo "<script>startBlinking();</script>";
					}

			
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<thead class='thead-light'><tr><th class='d-none d-md-table-cell'>ID</th><th class='d-none d-md-table-cell'>Tag</th><th>Zeit UTC</th><th>Coin</th><th>Indikator</th><th>Eintrag</th><th class='d-none d-md-table-cell'>Übereinstimmung</th></tr></thead><tbody>";
                    foreach ($entriesToShow as $row) {
                        $rowClass = $row['entry'] == 'long' ? 'table-success' : ($row['entry'] == 'short' ? 'table-danger' : '');
                        echo "<tr class='" . $rowClass . "'><td class='d-none d-md-table-cell'>" . htmlspecialchars($row['id']) . "</td><td class='d-none d-md-table-cell'>" . htmlspecialchars($row['tag']) . "</td><td>" . htmlspecialchars($row['zeit']) . "</td><td>" . htmlspecialchars($row['coin']) . "</td><td>" . htmlspecialchars($row['indikator']) . "</td><td>" . htmlspecialchars($row['entry']) . "</td><td class='d-none d-md-table-cell'>" . ($row['checked'] ?? 'Nein') . "</td></tr>";
                    }
                    echo "</tbody></table>";
					//Alert Button für coin
					echo "<button onclick='confirmAlert(" . $row['id'] . ")' class='btn btn-primary'>Bestätigen</button>";
					echo "<a href='https://de.tradingview.com/chart/v4d255ae/' class='btn btn-primary'>Button Text</a>";






                    echo "</div>"; // Ende von .table-responsive
                }
            } else {
                echo "<p>Keine Einträge gefunden für $coin.</p>";
            }

            echo "</div>"; // Ende von .col-12
            echo "</div>"; // Neue Zeile für jeden Coin
        }
        echo "</div>"; // Ende von .container-fluid

        echo "<script>setInterval(function() { window.location.reload(); }, 5000);</script>";

    } catch (PDOException $e) {
        echo "Datenbankfehler: " . $e->getMessage();
        exit;
    }
}














// Hauptlogik
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'init':
            //initializeDatabase();
            break;
        case 'show':
            // Überprüfe, ob ein 'coin' Parameter in der GET-Anfrage existiert
            if (isset($_GET['coin'])) {
                $coinFilter = $_GET['coin'];
                showDatabaseContent($coinFilter); // Rufe die Funktion mit dem Coin-Filter auf
            } else {
                showDatabaseContent(); // Rufe die Funktion ohne Coin-Filter auf
            }
            break;
        case 'latest':
            showLatestEntriesPerCoin();
            break;
		
		case 'ext': // Erweitere die Tabelle bei Bedarf
            extendTable();
            break;
    }
} else {
    processWebhook();
}




?>


</body>
</html>

