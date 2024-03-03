<?php

require_once __DIR__ . '/../etc/config.php';
require_once SMARTY_PATH . 'Smarty.class.php';
require_once 'class/clDB.php';


class clShowLogListe {
    private $tradeRecord;
	private $smarty;
	
	
   public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(TEMPLATE_DIR);
        $this->smarty->setCompileDir(COMPILE_DIR);
        $this->smarty->setCacheDir(CACHE_DIR);
        $this->smarty->setConfigDir(CONFIG_DIR);

        // Initialisiere die Verbindung zur Datenbank Klasse
        $this->tradeRecord = new TradeRecord(DB_PATH);
		
    }
	


    public function displayLogListe() {
		
        $logs =  $this->tradeRecord->getLogListe();
		$this->smarty->assign('logs', $logs);
        $this->smarty->display('showLogListe.tpl'); // Stellen Sie sicher, dass dieses Template existiert und korrekt gestaltet ist.
    }
}
