<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../etc/config.php';
require_once SMARTY_PATH . 'Smarty.class.php';
require_once 'class/clDB.php';

/*

Alarm in tradingview anlegen

{"time":"{{time}}","coin":"{{ticker}}","indikator":"QQE-MOD","entry":"long" }
qqe linie
aufwärts kreuzend
wert 0


{"time":"{{time}}","coin":"{{ticker}}","indikator":"TRENDMETER","entry":"long" }
3 TM turns green with TBs 1+2
pro balkenschluss

Webhook
http://localhost/log/log.php?action=webhook
 
 
 
Testaufruf Dos
curl -X POST -H "Content-Type: application/json" -d "{\"time\":\"2024-03-05T00:00:00Z\",\"coin\":\"TEST\",\"indikator\":\"QQE-MOD\",\"entry\":\"TEST\"}" http://localhost/log/log.php?action=webhook

			

*/

class clIndikator {
    private $smarty;
    private $tradeRecord;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(TEMPLATE_DIR);
        $this->smarty->setCompileDir(COMPILE_DIR);
        $this->smarty->setCacheDir(CACHE_DIR);
        $this->smarty->setConfigDir(CONFIG_DIR);

        // Initialisiere die Verbindung zur Datenbank Klasse
        $this->tradeRecord = new TradeRecord();
		
				
    }
		
	function getWebhook() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$content = file_get_contents("php://input");
			$data = json_decode($content, true);

			if ($data) {
				try {
				
					
					// Umwandlung und Formatierung der Zeit
					$timeUTC =  new DateTime($data['time']);
					$timeUTC->add(new DateInterval('PT1H')); // Eine Stunde zu 'time' hinzufügen für 'timeutc'
					$tag = $timeUTC->format('Y-m-d'); // Formatieren von 'time'
					$zeit = $timeUTC->format('H:i:s'); // Formatieren von 'timeutc'

					$formData=[
						'tag' => $tag,
						'zeit' => $zeit,
						'coin' => $data['coin'],
						'indikator' => $data['indikator'],
						'entry' => $data['entry'],
					];
					$this->tradeRecord->updateTable( "indikator", $formData);
					
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

 
	public function displayAllIndikator() {
		
		$indikator =  $this->tradeRecord->getTable(-1, "indikator");
		//print_r($indikator);
				
		$this->smarty->assign('indikatoren', $indikator);
		$this->smarty->display('indikatorList.tpl'); 
	}
	
	
     public function fetchLatestEntries() {
        $coins = ['BTCUSDT', 'ETHUSDT', 'RUNEUSDT'];
        $entriesData = [];
    
        foreach ($coins as $coin) {
            $results = $this->tradeRecord->getLatestEntriesForCoin($coin);
    
            $gotSignal = false;
    
            // Berechne die Zeitdifferenz zwischen den letzten beiden Einträgen
            $timeDiff = abs(strtotime($results[0]['zeit']) - strtotime($results[1]['zeit']));
            
            // Überprüfe, ob die Zeitdifferenz <= 15 Minuten (900 Sekunden) ist
            // und ob die Indikatoren unterschiedlich sind, aber der 'entry' Wert gleich ist
            if ($results[0]['indikator'] !== $results[1]['indikator'] &&
                $results[0]['entry'] === $results[1]['entry'] && 
                $timeDiff <= 900) {
                $gotSignal = true;
            } else {
                // Wenn mehr als 15 Minuten vergangen sind, behalte nur den neuesten Datensatz
                $results = [$results[0]];
            }
    
            // Füge die Daten für diesen Coin zum Array hinzu
            $entriesData[$coin] = [
                'entries' => $results,
                'gotSignal' => $gotSignal,
            ];
        }
    
        // Weise die gesammelten Daten Smarty zu und zeige das Template an
        $this->smarty->assign('entriesData', $entriesData);
        $this->smarty->display('indikatorLast.tpl');
    }






}
