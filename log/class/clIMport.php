
<?php

/*

Aufruf zum import der sqllite daten nach Mysql 
http://localhost/log/class/clIMport.php 


*/



require_once __DIR__ . '/../etc/config.php';

class TradeRecord {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            die("PDO-Verbindung fehlgeschlagen: " . $e->getMessage());
        }
    }

    public function updateTableStructure() {
        try {
            $alterTableSQL = "
            ALTER TABLE indikator 
            ADD COLUMN match_found TEXT DEFAULT '',
            ADD COLUMN matched_ids TEXT DEFAULT '',
            ADD COLUMN checked TEXT DEFAULT NULL,
            ADD COLUMN is_confirmed BOOLEAN DEFAULT FALSE;
            ";
            
            $this->db->exec($alterTableSQL);

            echo "Tabelle wurde erfolgreich aktualisiert.\n";
        } catch (PDOException $e) {
            echo "Fehler beim Aktualisieren der Tabelle: " . $e->getMessage() . "\n";
        }
    }

    public function importSQLiteToMySQL($sqliteDbPath) {
        try {
            $sqlite = new PDO('sqlite:' . $sqliteDbPath);
            $sqlite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $sqlite->query("SELECT id, tag, zeit, coin, indikator, entry, match_found, matched_ids, checked, is_confirmed FROM indikator");
            $items = $query->fetchAll(PDO::FETCH_ASSOC);

            $this->db->exec("DELETE FROM indikator");

            $insertStmt = $this->db->prepare("INSERT INTO indikator (tag, zeit, coin, indikator, entry, match_found, matched_ids, checked, is_confirmed) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

            foreach ($items as $item) {
                $insertStmt->execute([
                    $item['tag'],
                    $item['zeit'],
                    $item['coin'],
                    $item['indikator'],
                    $item['entry'],
                    $item['match_found'],
                    $item['matched_ids'],
                    $item['checked'],
                    $item['is_confirmed']
                ]);
            }

            echo "Daten erfolgreich von SQLite nach MySQL importiert.\n";
        } catch (PDOException $e) {
            echo "Fehler beim Import: " . $e->getMessage() . "\n";
        }
    }
}

// Verwendung
$tradeRecord = new TradeRecord();
//$tradeRecord->updateTableStructure(); // Update der Tabellenstruktur vor dem Import
$dbFile = '../indikator.sqlite'; // Pfad zur SQLite-Datenbankdatei anpassen
$tradeRecord->importSQLiteToMySQL($dbFile); // Importieren der Daten

?>
