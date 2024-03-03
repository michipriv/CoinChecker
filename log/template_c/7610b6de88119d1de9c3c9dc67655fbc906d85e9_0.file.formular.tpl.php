<?php
/* Smarty version 4.3.4, created on 2024-02-23 17:35:23
  from 'C:\tmp\htdocs\log\template\formular.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d8c94b2e4e24_22944700',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7610b6de88119d1de9c3c9dc67655fbc906d85e9' => 
    array (
      0 => 'C:\\tmp\\htdocs\\log\\template\\formular.tpl',
      1 => 1708706116,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d8c94b2e4e24_22944700 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benutzerfreundliches und Vollständiges Formular</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #f8f9fa; /* Heller Hintergrund */
            margin-top: 20px;
        }
        .form-control:focus { 
            border-color: #80bdff; /* Blauer Fokus */
            box-shadow: 0 0 0 .2rem rgba(0,123,255,.25); /* Leichter Schatten um das fokussierte Feld */
        }
        .form-section, .images-section { 
            background-color: #ffffff; /* Weißer Hintergrund für die Bereiche */
            padding: 20px; 
            border-radius: 5px; /* Abgerundete Ecken */
            box-shadow: 0 4px 8px rgba(0,0,0,.05); /* Schatten für die Bereiche */
            transition: box-shadow .3s ease-in-out; /* Sanfter Übergang für den Schatten */
        }
        .form-section:hover, .images-section:hover {
            box-shadow: 0 6px 12px rgba(0,0,0,.1); /* Stärkerer Schatten beim Hover */
        }
        .image-slot { 
            width: 80px; height: 80px; 
            background-color: #6c757d; 
            color: white; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            margin-bottom: 10px; 
            border-radius: 5px; /* Abgerundete Ecken für Bilder */
        }
        h2, h4 {
            color: #17a2b8; /* Blaue Überschriften */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Trade-Eingabe</h2>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="form-section">
				
                    <form action="log.php?action=saveTrade" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="datum">Datum</label>
                                <input type="date" class="form-control" id="datum" name="datum">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="uhrzeit">Uhrzeit</label>
                                <input type="time" class="form-control" id="uhrzeit" name="uhrzeit">
                            </div>
                        </div>
                        <div class="form-row">
							<div class="form-group col-md-6">
							<label for="coin">Coin</label>
							<select class="form-control" id="coin" name="coin">
							<option value="BTC"></option>
							<option value="BTC">BTC</option>
							<option value="ETH">ETH</option>
							<option value="RUNE">RUNE</option>
							</select>
							</div>

                            <div class="form-group col-md-6">
                                <label for="ziel-guv">Ziel / GuV</label>
                                <input type="text" class="form-control" id="ziel-guv" name="ziel-guv">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="account">Account</label>
                                <input type="text" class="form-control" id="account" name="account">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="trade">Trade</label>
                                <input type="text" class="form-control" id="trade" name="trade">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="commission">Commission</label>
                                <input type="text" class="form-control" id="commission" name="commission">
                            </div>
						<div class="form-group col-md-6">
						<label for="chart">Chart</label>
						<select class="form-control" id="chart" name="chart">
						<option value=""></option>
						<option value="5m" selected>5m</option>
						</select>
						</div>
	
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="order">Order</label>
                                <input type="text" class="form-control" id="order" name="order">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="qqe-mod">QQE MOD</label>
                                <input type="text" class="form-control" id="qqe-mod" name="qqe-mod">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
							<label for="trend-meter">Trend Meter</label>
							<input class="form-control" list="trendMeterOptions" id="trend-meter" name="trend-meter">
							<datalist id="trendMeterOptions">
							<option value="Alle 2 Linien, alle 3 Punkte GRÜN">
							<option value="5x Grün, + Punkt">
							<option value="5x Grün + Plus Punkt">
							</datalist>
							</div>
                        <div class="form-group">
                            <label for="bemerkung">Bemerkung</label>
                            <textarea class="form-control" id="bemerkung" name="bemerkung" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Speichern</button>
                    
                </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="images-section">
                    <h4>Bilder</h4>
                    <div class="d-flex flex-wrap">
                        <div class="image-slot m-1">1</div>
                        <div class="image-slot m-1">2</div>
                        <div class="image-slot m-1">3</div>
                        <div class="image-slot m-1">4</div>
                        <div class="image-slot m-1">5</div>
                        <div class="image-slot m-1">6</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
