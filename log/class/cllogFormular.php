<?php


require_once __DIR__ . '/../etc/config.php';
require_once SMARTY_PATH . 'Smarty.class.php';
require_once 'class/clDB.php';

class clLogFormular {
    private $smarty;
    private $tradeRecord;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(TEMPLATE_DIR);
        $this->smarty->setCompileDir(COMPILE_DIR);
        $this->smarty->setCacheDir(CACHE_DIR);
        $this->smarty->setConfigDir(CONFIG_DIR);

        // Initialisiere die Verbindung zur Datenbank Klasse
        $this->tradeRecord = new TradeRecord(DB_PATH);
		
		$this->initializeFormDefaults();
		
    }
	
	private function initializeFormDefaults() {
        // Ermitteln des aktuellen Datums und der aktuellen Zeit
        $currentDate = date('Y-m-d'); // Format: YYYY-MM-DD
        $currentTime = date('H:i'); // Format: HH:MM

        // Zuweisen der Werte zu Smarty-Variablen
        $this->smarty->assign('currentDate', $currentDate);
        $this->smarty->assign('currentTime', $currentTime);
    }
	
    public function displayleeresForm() {
        //$this->smarty->display('logFormular.tpl');
		$this->loadFormData(-1);	//Leeres Formular anzeigen
    }

     public function saveTradeData() {
        // Überprüfen, ob die Anfrage per POST erfolgt ist
		
		// Speichere Bilder abrufen
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$savedImages = []; // Array zum Sammeln der gespeicherten Bildpfade

			// Verarbeite jedes Bild
			$imageFields = ['imageData1', 'imageData2', 'imageData3', 'imageData4', 'thimageData1'];
			foreach ($imageFields as $index => $field) {
				// Prüfe, ob das Feld gesetzt ist und nicht leer ist
				if (isset($_POST[$field]) && !empty(trim($_POST[$field]))) {
					$imagePath = $this->saveBase64Image($_POST[$field], "trade_image" . ($index + 1));
					
					if ($imagePath) {
						$savedImages["image" . ($index + 1)] = $imagePath; // Speichere den Pfad im Array
					} else {
						$savedImages["image" . ($index + 1)] = null;
					}
				}
			}

			// $savedImages['image1'] 
			//print("Bild 1:");	print($savedImages['image1'] );
		}
		
		
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Daten aus dem Formular sammeln
            $formData = [
				'id' => $_POST['id'],
                'datum' => $_POST['datum'],
                'uhrzeit' => $_POST['uhrzeit'],
                'coin' => $_POST['coin'],
                'ziel_guv' => $_POST['ziel_guv'],
                'account' => $_POST['account'],
                'trade' => $_POST['trade'],
                'commission' => $_POST['commission'],
                'chart' => $_POST['chart'],
                'orderbl' => $_POST['orderbl'],
				'ema' => $_POST['ema'],
                'qqe_mod' => $_POST['qqe_mod'],
                'trend_meter' => $_POST['trend_meter'],
                'bemerkung' => $_POST['bemerkung'],
				'image1' => $savedImages['image1'] ?? null ,
				'image2' => $savedImages['image2'] ?? null,
				'image3' => $savedImages['image3'] ?? null ,
				'image4' => $savedImages['image4'] ?? null
				
                
            ];

            //Insert, Update Data into Database
			$this->tradeRecord->updateTable( "trades", $formData);
			
        }
    }
	
	public function saveBase64Image($base64Image, $imagePrefix = 'image') {
		// Entferne den Data-URL-Präfix
		$base64Image = str_replace('data:image/png;base64,', '', $base64Image);
		$base64Image = str_replace(' ', '+', $base64Image);
		$imageData = base64_decode($base64Image);
		
		// Verwende die extern definierte Konstante für den Bildpfad
		$targetDir = IMG_PATH;

		// Stelle sicher, dass das Zielverzeichnis existiert
		if (!file_exists($targetDir)) {
			mkdir($targetDir, 0777, true);
		}

		// Generiere einen eindeutigen Dateinamen
		 
		$filename = $imagePrefix . '_' . uniqid() . '.png';
		//print("Filename".$filename."<br>");

		if (file_put_contents($targetDir . $filename, $imageData)) {
			return $filename; // Gib den Pfad des gespeicherten Bildes zurück
		} else {
			return null; // Gib null zurück, falls ein Fehler aufgetreten ist
		}
	}


	//lade daten aus tabelle zu datensatz mit id
	public function loadFormData($id) {
		
		if ($id == -1) {
			//pulldownmenü coin laden
			$pdcoins = $this->tradeRecord->getCoins();
			$this->smarty->assign('pdcoins', $pdcoins);
			$this->smarty->assign('selectedCoinId', -1);
			
			$this->smarty->display('logFormular.tpl');
		} else {
			// Daten aus der Datenbank abrufen
			$coins = $this->tradeRecord->getTable($id, "trades");
			//print_r($coins);		
			$this->smarty->assign('coins', $coins);
			
			//pulldownmenü coin laden
			$pdcoins = $this->tradeRecord->getCoins();
			//print_r($coins);	
			$this->smarty->assign('pdcoins', $pdcoins);
			$this->smarty->assign('selectedCoinId', $coins['coin'] );
			
			
			$this->smarty->display('logFormular.tpl');
		}
	}
	
}
