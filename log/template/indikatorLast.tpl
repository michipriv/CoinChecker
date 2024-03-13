<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coin, Zeit-Indikator und Leere Boxen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/litera/bootstrap.min.css">
    <link rel="stylesheet" href="template/indikator.css">

{literal}

<script>
// Html seite alle 3 Sekunden neu laden
setInterval(function() { window.location.reload(); }, 3000);

window.addEventListener('DOMContentLoaded', (event) => {
    // Event-Listener für alle Alarm-Buttons
    document.querySelectorAll('.btn-alarm').forEach(button => {
        button.addEventListener('click', function() {
            // Ermittle die Coin-ID aus dem data-coin Attribut des Buttons
            const coinId = this.getAttribute('data-coin');
            // Verwende die Coin-ID, um die zugehörige Coin-Box zu finden und das Blinken zu stoppen
            document.getElementById(`coin_box_${coinId}`).classList.remove('blink');
        });
    });
});
     
</script>
{/literal}


</head>
<body>

{foreach $entriesData as $coin => $data}
<div class="container">
    
    <div class="row">
        
        <!-- box1 -->
       <!-- Coin Box -->
        <div class="col-md-4">
            <div class="custom-box coin-box blink" id="coin_box_{$coin|replace: 'USDT': ''}">
                <h1 style="font-size: 36px; font-weight: bold; letter-spacing: 2px;">{$coin}</h1>
            </div>
        </div>
        
        <!-- box2 -->
        <div class="col-md-4">
            <div class="custom-box time-indicator-box">
                {if $data.entries|@count > 0}
                <table class="table">
                    <tbody>
                        {foreach $data.entries as $entry}
                        <tr class="{if $entry.entry == 'long'}entry-long{else}entry-short{/if}">
                            <td>{$entry.zeit}</td>
                            <td>{$entry.indikator}</td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
                {/if}
            </div>
        </div>

        <!-- box3 -->
        <div class="col-md-4">
            <div class="custom-box empty-box">
                <!-- Kein Inhalt -->
            </div>
        </div>
        
        
         <!-- box4 -->
         <div class="full-width-box">
             <div class="inner-box" style="padding: 1px;">
                 <button class="btn btn-custom btn-alarm" data-coin="{$coin|replace: 'USDT': ''}" style="background-color: #AEC6CF;">Alarm</button>
                 <button class="btn btn-custom" style="background-color: #FDBA74;">TradingView</button> <!-- Pastellorange -->
                 <button class="btn btn-custom" style="background-color: #77DD77;">Long</button> <!-- Pastellgrün -->
                 <button class="btn btn-custom" style="background-color: #FF6961;">Short</button> <!-- Pastellrot -->
                 <button class="btn btn-custom" style="background-color: #CFCFC4;">Close</button> <!-- Pastellgrau -->
             </div>
         </div>
         
         
         
    </div>
    
   
</div>
{/foreach}

</body>
</html>
