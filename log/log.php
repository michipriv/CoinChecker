<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
/*
http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=trading&table=indikator


Verhalte dich wie ein php programmiere mit folgenden kentnisse:
cryptotrading, smarty, bootstrap und ooe entwicklung in php.
erstelle die smarty templates  in responsive Design für Mobilgeräte 
verwened grüne blaue pastell farben mit hover effekt bei buttons
buttons sind abgerunet ud die eingae felder entsprechen einem modern design 
verwende dieses thema von bootstrap:
<link href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css" rel="stylesheet">

das projekt verwendet folgende Verzeichniss Struktur
class/
	clDB.php
	clFormular.php
	
cache
smarty
template
	config
	template_c
	formular.tpl
	
log.db  (Sqllite db)
log.php  (haupt file)
etc
	config.php
image

Antworte mit BINGO wenn du es gelesen hast.


ich kopiere dir den aktuellen code rein, wenn du den code gelsen hast antworte nur mit bingo.
verwende diesen code um später die programmierung zu erweitern

hast du alle dateien gelesen?
liste auf welche datein und klassen du nun kennst

*/

// Klassendefinitionen einbinden
require_once __DIR__ . '/etc/config.php';
require_once SMARTY_PATH . 'Smarty.class.php';
require_once 'class/clDB.php';
require_once 'class/clLogFormular.php';
require_once 'class/clShowLogliste.php';
require_once 'class/clIndikator.php';




// Smarty-Instanzierung und Konfiguration für die Log.tpl
$smarty = new Smarty();
$smarty->setTemplateDir(TEMPLATE_DIR);
$smarty->setCompileDir(COMPILE_DIR);
$smarty->setCacheDir(CACHE_DIR);
$smarty->setConfigDir(CONFIG_DIR);


//zugriff auf die Klasse DB
$dbHandler = new TradeRecord();

// Logik für die Anzeige des Log Formulars
$logFormHandler = new clLogFormular();
$showListFormHandler = new clShowLogListe();
$indikatorFormHandler = new clIndikator();
			
			
// Überprüfen, ob der GET-Parameter 'action' gesetzt ist
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'dbinit':
            // Logik für die Initialisierung der Datenbank
            
			//$dbHandler->createTable();
			//$dbHandler->truncateTable();
            echo "Die Datenbank und die Tabelle für Handelsdatensätze wurden erfolgreich initialisiert.";
            break;
            
        case 'form':
			// zeige INgabeform zum Aufzeichnen der Tradingdaten
            $logFormHandler->displayleeresForm();
            break;
			
		case 'saveTrade':
            // Logik zum Speichern der Formulardaten
            $logFormHandler->saveTradeData();
            echo "Trade-Daten erfolgreich gespeichert.";
			$smarty->display('log.tpl');
            break;
		
		case 'showlist':
            // Logik zur Anzeige der Logliste
            $showListFormHandler->displayLogListe();
            break;
			
		case 'showID':
           if(isset($_GET['id'])) {
                // Die ID aus dem GET-Parameter extrahieren
                $id = $_GET['id'];
                // Logik zur Anzeige von Daten basierend auf der ID
                $logFormHandler->loadFormData($id);
            } else {
                // Fehlermeldung ausgeben, wenn keine ID angegeben wurde
                echo "Fehler: Keine ID angegeben.";
            }
			break;
			
		case 'latest':
            // zeige aktuelle Coins und Alerts

            break;
		
		case 'AllIndikator':
			$indikatorFormHandler->displayAllIndikator();
			break;
			
		case 'webhook':
			// Logik zur Verarbeitung des Webhook
			
			$indikatorFormHandler->getWebhook();
			break;
			
            		
            
        default:
            echo "default Main Formular";
            break;
    }
} else {
    // Rückmeldung, wenn kein 'action'-Parameter angegeben ist
    $smarty->display('log.tpl');
}