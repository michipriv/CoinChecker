
Created on Tue Mar  5 21:44:37 2024
@author: michi



Datenbank
http://localhost/phpmyadmin/


Hauptaplikation
http://localhost/log/log.php

Webhook
http://localhost/alert/wh.php?action=webhook


test
curl -X POST -H "Content-Type: application/json" -d "{\"time\":\"2024-03-05T00:00:00Z\",\"coin\":\"TEST\",\"indikator\":\"QQE-MOD\",\"entry\":\"TEST\"}" http://localhost/log/log.php?action=webhook


Alarm in tradingview anlegen

{"time":"{{time}}","coin":"{{ticker}}","indikator":"QQE-MOD","entry":"long" }
qqe linie
aufwärts kreuzend
wert 0


{"time":"{{time}}","coin":"{{ticker}}","indikator":"TRENDMETER","entry":"long" }
3 TM turns green with TBs 1+2
pro balkenschluss








KI prompt:

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

