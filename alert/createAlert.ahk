#Requires AutoHotkey v2.0

; Definiert Alt + B als Hotkey in AHK v2
!b::DoSequence()  ; Ruft die Funktion DoSequence auf, korrekt ohne zusätzliche geschweifte Klammern

DoSequence() {
    SendInput("{Alt down}a{Alt up}")  ; Sendet Alt + A als erstes
    Sleep 100  ; Kurze Pause, um sicherzustellen, dass die Aktion verarbeitet wird
    SendInput("0")  ; 0 eingeben
    SendInput("{Tab 2}")  ; 2x Tab
    SendInput("{Space}")  ; Space drücken
    SendInput("{Tab 2}")  ; 2x Tab
    SendInput("COIN ALARM NAME")  ; "COIN ALARM NAME" eingeben
    SendInput("{Tab}")  ; Tab
    SendInput("^a")  ; Sendet Strg+A
SendInput "{""time"":""{{time}}"",""coin"":""{{ticker}}"",""indikator"":""QQE-MOD"",""entry"":""long""}"



	
    return  ;
}
