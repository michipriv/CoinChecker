<?php


require_once __DIR__ . '/../etc/config.php';

class TradeRecord {
    private $db;

	public function __construct() {
        // Erstelle, eine Verbindung zur MySQL-Datenbank 
        try {
            $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD);
    
			// Setze einige PDO-Attribute für besseres Fehlermanagement und Kompatibilität
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            // Bei einer fehlgeschlagenen Verbindung, zeige den Fehler an oder logge ihn
            die("PDO-Verbindung fehlgeschlagen: " . $e->getMessage());
        }
    }

    public function createTable() {
		// trades Table
		$dropQuery = "DROP TABLE IF EXISTS trades";
		$this->db->exec($dropQuery);

		$query = "
			CREATE TABLE trades (
			id INT AUTO_INCREMENT PRIMARY KEY,
			datum DATE,
			uhrzeit TIME,
			coin VARCHAR(255),
			ziel_guv VARCHAR(255),
			account VARCHAR(255),
			trade VARCHAR(255),
			commission VARCHAR(255),
			chart VARCHAR(255),
			orderbl VARCHAR(255),
			ema VARCHAR(255),
			qqe_mod VARCHAR(255),
			trend_meter VARCHAR(255),
			bemerkung TEXT,
			image1 TEXT,
			image2 TEXT,
			image3 TEXT,
			image4 TEXT,
			image5 TEXT,
			image6 TEXT
			)
			";
		$this->db->exec($query);
		
		// indikator Table
		$dropQuery = "DROP TABLE IF EXISTS indikator";
		$this->db->exec($dropQuery);
		
		$query=
		"CREATE TABLE indikator (
				id INT AUTO_INCREMENT PRIMARY KEY,
				tag DATE NOT NULL,
				zeit TIME NOT NULL,
				coin VARCHAR(255) NOT NULL,
				indikator VARCHAR(255) NOT NULL,
				entry VARCHAR(255) NOT NULL
			)
			";
		$this->db->exec($query);
		
		// COIN Table
		$dropQuery = "DROP TABLE IF EXISTS coins";
		$this->db->exec($dropQuery);
		
		$query = "
		CREATE TABLE coins (
		id INT AUTO_INCREMENT PRIMARY KEY,
		coin VARCHAR(255) NOT NULL
		)
		";
		$this->db->exec($query);

		$query="
		INSERT INTO coins (coin) VALUES ('BTC');
		INSERT INTO coins (coin) VALUES ('ETH');
		INSERT INTO coins (coin) VALUES ('RUNE');
		";
		$this->db->exec($query);
		
		
		
		
	}

	
	public function truncateTable() {
		// SQL-Abfrage zum Zurücksetzen der Tabelle
		$query = "TRUNCATE TABLE trades";
		
		// Ausführen der SQL-Abfrage
		$this->db->exec($query);
	}


	
	
	/* Log Formular Start */

   
	// Generelle Funktion die Daten mittels  Insert oder Update in der Datenbank speichert
	//übergabe Daten als array und tabellenname
	
	public function updateTable($tableName, $formData) {
		try {
			
			
			// Überprüfe, ob eine ID vorhanden ist, um zwischen UPDATE und INSERT zu unterscheiden
			if (isset($formData['id']) && !empty($formData['id'])) {
				// UPDATE
				$query = "UPDATE $tableName SET ";
				$updates = [];
				foreach ($formData as $key => $value) {
					// Ignoriere die ID im UPDATE-Statement
					if ($key !== 'id') {
						$updates[] = "$key = :$key";
					}
				}
				$query .= implode(', ', $updates);
				$query .= " WHERE id = :id";
			} else {
				// INSERT
				unset($formData['id']); // Entferne die ID aus dem Array, falls leer oder nicht gesetzt
				$columns = implode(", ", array_keys($formData));
				$placeholders = ":" . implode(", :", array_keys($formData));
				$query = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";
			}

			//print("db:". $query);
			$stmt = $this->db->prepare($query);

			// Parameter dynamisch binden
			foreach ($formData as $key => &$value) {
				$stmt->bindParam(":$key", $value);
			}

			// SQL-Anweisung ausführen
			$stmt->execute();

			// Rückmeldung geben
			if ($stmt->rowCount()) {
				return isset($formData['id']) ? "Daten erfolgreich in '$tableName' aktualisiert." : "Daten erfolgreich in '$tableName' hinzugefügt.";
			} else {
				// Keine Daten wurden aktualisiert oder hinzugefügt
				return "Keine Änderung erkannt oder Datensatz nicht gefunden in '$tableName'.";
			}
		} catch (PDOException $e) {
			// Fehlerbehandlung
			error_log("Fehler beim Speichern/Aktualisieren der Daten in '$tableName': " . $e->getMessage());
			throw $e; // Oder eine benutzerdefinierte Fehlerbehandlung
		}
	}



	// Generel Funktion die Daten aus der Tabelle nach id oder alle lädt
	// id = -1 alle
	public function getTable($id, $table) {
		try {
			// Überprüfe, ob alle Datensätze abgerufen werden sollen
			if ($id == -1) {
				$sql = "SELECT * FROM $table ORDER BY tag DESC, zeit DESC";

				$stmt = $this->db->prepare($sql);
				// BindParam wird in diesem Fall nicht benötigt
			} else {
				$sql = "SELECT * FROM $table WHERE id = :id ORDER BY tag DESC, zeit DESC";
				$stmt = $this->db->prepare($sql);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			}

			$stmt->execute();

			// Unterscheide, ob alle Datensätze oder nur einer zurückgegeben werden soll
			if ($id == -1) {
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			} else {
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
			}

			// Überprüfe, ob das Ergebnis leer ist und gib entsprechend null oder das Ergebnis zurück
			return $result ? $result : null;
		} catch (PDOException $e) {
			// Fehlerbehandlung, z.B. einen Fehler loggen
			error_log('Fehler beim Abrufen der Daten aus ' . $table . ': ' . $e->getMessage());
			return null;
		}
	}

	
	//Lese daten für pulldown menü coins
	public function getCoins() {
		$stmt = $this->db->prepare("SELECT id, coin FROM coins");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC); 
	}


	/* Log Formular Ende */

	
	
	/* showLogList Formular Start */
	
	//showloglist, lade liste von datenbank
	 public function getLogListe() {
		 
        $stmt = $this->db->prepare("SELECT id, datum, uhrzeit, coin FROM trades ORDER BY datum DESC, uhrzeit DESC");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
	
	
	
	/* showLogList Formular Ende */
	
	/* Alert Indikator  START*/
	
	// die letzten beiden Alerts von einem Coin aufrufen
    public function getLatestEntriesForCoin($coin) {
        $stmt = $this->db->prepare("SELECT * FROM indikator WHERE coin = :coin AND is_confirmed = FALSE ORDER BY id DESC LIMIT 2");
        $stmt->execute([':coin' => $coin]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $results;
    }
    
    public function updateSignalMatches($coin, $ids) {
        if (empty($ids) || count($ids) < 2) {
            // Wenn nicht genügend IDs für ein Match vorhanden sind, breche ab.
            return false;
        }
    
        try {
            $matchedIdsString = implode(',', $ids); // Konvertiere die IDs-Array in einen String
            $matchFound = true; // Setze match_found auf true
    
            // Update-Query vorbereiten
            $query = "UPDATE indikator SET match_found = :match_found, matched_ids = :matched_ids WHERE id IN (:id1, :id2)";
            $stmt = $this->db->prepare($query);
    
            // Parameter binden
            $stmt->bindParam(':match_found', $matchFound, PDO::PARAM_BOOL);
            $stmt->bindParam(':matched_ids', $matchedIdsString, PDO::PARAM_STR);
            $stmt->bindParam(':id1', $ids[0], PDO::PARAM_INT);
            $stmt->bindParam(':id2', $ids[1], PDO::PARAM_INT);
    
            // Query ausführen
            $stmt->execute();
    
            // Überprüfe, ob die Operation erfolgreich war
            if ($stmt->rowCount() > 0) {
                return true; // Erfolg
            }
            return false; // Keine Zeilen betroffen, Operation nicht erfolgreich
        } catch (PDOException $e) {
            error_log('Fehler beim Aktualisieren der Signal-Matches: ' . $e->getMessage());
            return false; // Fehler
        }
    }

    
	/* Alert Indikator  ENDE*/

}
