<?php
// Basispfad des Projekts anpassen
define('BASE_PATH', __DIR__ . '/..'); // Geht davon aus, dass config.php in /log/etc liegt

// Pfad zur Smarty-Bibliothek
define('SMARTY_PATH', BASE_PATH . '/smarty/');

// Verzeichnispfade für Smarty
define('TEMPLATE_DIR', BASE_PATH . '/template/');
define('COMPILE_DIR', BASE_PATH . '/template_c/'); // Annahme: template_c ist direkt unter /log
define('CACHE_DIR', BASE_PATH . '/cache/');
define('CONFIG_DIR', BASE_PATH . '/etc/'); // Da config.php sich hier befindet

// Datenbankpfad (für SQLite)
define('DB_PATH', BASE_PATH . '/log.db');

// Datenbankkonfiguration für eine MySQL-Datenbank
define('DB_HOST', 'localhost'); // Der Hostname deines Datenbankservers. Verwende 'localhost', wenn die Datenbank auf dem gleichen Server läuft.
define('DB_NAME', 'trading'); // Der Name deiner MySQL-Datenbank
define('DB_USER', 'aluser'); // Dein MySQL-Datenbankbenutzer
define('DB_PASSWORD', '8pohJhKnxDs4KNbynd8R'); // Das Passwort für deinen MySQL-Datenbankbenutzer
define('DB_CHARSET', 'utf8mb4');


// Bild upload
define('IMG_PATH', 'image/'); // Pfad zur Bildablage

?>
