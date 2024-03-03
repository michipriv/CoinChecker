<?php
/* Smarty version 4.3.4, created on 2024-02-27 20:10:04
  from 'C:\tmp\htdocs\log\template\logFormular.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65de338c4f0b10_20256744',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '898ff6a797142257a16b9f0240f53afbc112ffc8' => 
    array (
      0 => 'C:\\tmp\\htdocs\\log\\template\\logFormular.tpl',
      1 => 1708852547,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65de338c4f0b10_20256744 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade-Eingabe</title>
    <!-- Einbinden des Bootstrap Litera CSS von Bootswatch -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css" rel="stylesheet">
    <style>
		  /* Standardbreite für kleine Geräte */
		.custom-container {
			max-width: 100%;
		}

		/* Minimale Breite 576px (Small Devices, Smartphones) */
		@media (min-width: 576px) {
			.custom-container {
				max-width: 540px; /* Bootstrap's .container-sm */
			}
		}

		/* Minimale Breite 720px (Medium Devices, Tablets) */
		@media (min-width: 720px) {
			.custom-container {
				max-width: 720px; /* Bootstrap's .container-md */
			}
		}

		/* Minimale Breite 720px (Large Devices, Desktops) */
		@media (min-width: 720px) {
			.custom-container {
				max-width: 720px; /* Bootstrap's .container-lg */
			}
		}

		/* Minimale Breite 720px (Extra Large Devices, Wide Screens) */
		@media (min-width: 720px) {
			.custom-container {
				max-width: 720px; /* Bootstrap's .container-xl */
			}
		}
		
        body { 
            background-color: #f8f9fa; /* Heller Hintergrund */
            margin-top: 20px;
			line-height: 0.4; 
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
			
		.btn-custom-light-green {
			background-color: #b2f2bb !important; /* Hellgrün */
			border-color: #8cda9d !important; /* Dunkleres Grün für den Rand */
		}

		.btn-custom-light-green:hover {
			background-color: #a2e2ab !important;
			border-color: #8cda9d !important;
		}
		
		.button-container-pair {
			display: flex;
			align-items: center; /* Zentriert die Elemente vertikal */
			gap: 20px; /* Abstand zwischen Button und Container */
		}

		/* Stil für die image-container, falls benötigt */
		.image-container {
			width: 100px; /* Oder eine andere gewünschte Breite */
			height: 100px; /* Oder eine andere gewünschte Höhe */
			border: 1px solid #ccc; /* Einen Rand hinzufügen */
			display: flex;
			justify-content: center;
			align-items: center;
		}

		/* Anpassungen für die Buttons, falls noch nicht definiert */
		.btn-custom-light-green {
			/* Deine spezifischen Stile für die Buttons */
		}

		/* Container für alle Paare */
		.container-for-pairs {
			display: flex;
			flex-direction: column;
			gap: 10px; /* Abstand zwischen den Paaren */
		}
		
		.custom-modal-size {
			max-width: 80%; /* oder jede gewünschte Breite */
		}
		.clickable-image {
			cursor: pointer; /* Ändert den Cursor zu einem Zeiger, um Anklickbarkeit anzuzeigen */
		}
		.clickable-image:hover {
			opacity: 0.5; /* Macht das Bild leicht transparent beim Hover */
			transition: opacity 0.3s ease; /* Animiert den Übergang für einen weicheren Effekt */
		}
	
</style>


</head>
<body>

	<!-- Bild-Vollansicht Modal -->
	<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
	  <div class="modal-dialog custom-modal-size" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="imageModalLabel">Vollbildansicht</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Schließen">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<img src="" id="fullSizeImage" style="width: 100%;"> <!-- Das Bild wird hier eingefügt -->
		  </div>
		</div>
	  </div>
	</div>




    <div class="container custom-container mt-6">
       
        <form action="log.php?action=saveTrade" method="post" enctype="multipart/form-data" class="form-section">
			
			<div class="form-row">
				
				<div class="form-group col-md-6">
					<label> <h2 class="mb-4 text-center">Aufzeichnung</h2></label>
					<input type="hidden" name="id" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['coins']->value['id'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"> <!-- Verstecktes Feld für die ID -->
				</div>
				
			</div>
			
			<div class="form-row">
                <div class="form-group col-md-6">
                    <label for="datum">Datum</label>
                    <input type="date" class="form-control" id="datum" name="datum" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['currentDate']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
                <div class="form-group col-md-6">
                    <label for="uhrzeit">Uhrzeit</label>
                    <input type="time" class="form-control" id="uhrzeit" name="uhrzeit"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['currentTime']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
            </div>
            
            <div class="form-row">
				<div class="form-group col-md-6">
					<label for="coin">Coin</label>
					<select class="form-control" id="coin" name="coin">
						<option value="" <br />  <!-- leer -->
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pdcoins']->value, 'pdcoin');
$_smarty_tpl->tpl_vars['pdcoin']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pdcoin']->value) {
$_smarty_tpl->tpl_vars['pdcoin']->do_else = false;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['pdcoin']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['selectedCoinId']->value == $_smarty_tpl->tpl_vars['pdcoin']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['pdcoin']->value['coin'];?>
</option>			
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</div>
				
				<div class="form-group col-md-6">
                    <label for="ziel_guv">Ziel Guv</label>
                    <input type="text" class="form-control" id="ziel_guv" name="ziel_guv" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['coins']->value['ziel_guv'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
				
			</div>
        
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="account">Account</label>
                    <input type="text" class="form-control" id="account" name="account" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['coins']->value['account'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
                <div class="form-group col-md-6">
                    <label for="trade">Trade</label>
                    <input type="text" class="form-control" id="trade" name="trade" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['coins']->value['trade'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="commission">Commission</label>
                    <input type="text" class="form-control" id="commission" name="commission" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['coins']->value['commission'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
                <div class="form-group col-md-6">
                    <label for="chart">Chart</label>
                    <input type="text" class="form-control" id="chart" name="chart" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['coins']->value['chart'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="order">Order</label>
                    <input type="text" class="form-control" id="orderbl" name="orderbl" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['coins']->value['orderbl'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
				
				<div class="form-group col-md-6">
					<label for="ema">Ema</label>
					<input type="text" class="form-control" id="ema" name="ema" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['coins']->value['ema'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
				</div>
			</div> 
			
           

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="qqe-mod">QQE MOD</label>
					<input type="text" class="form-control" id="qqe_mod" name="qqe_mod" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['coins']->value['qqe_mod'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
				</div>

				<div class="form-group col-md-6">
					<label for="trend-meter">Trend Meter</label>
					<input class="form-control" list="trendMeterOptions" id="trend_meter" name="trend_meter" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['coins']->value['trend_meter'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
					<datalist id="trendMeterOptions">
						<option value="Alle 2 Linien, alle 3 Punkte GRÜN">
						<option value="5x Grün, + Punkt">
						<option value="5x Grün + Plus Punkt">
					</datalist>
				</div>
			</div>
			
            
            <div class="form-group">
				<label for="bemerkung">Bemerkung | Emotion | Gefühle</label>
				<textarea class="form-control" id="bemerkung" name="bemerkung" rows="3"><?php echo (($tmp = $_smarty_tpl->tpl_vars['coins']->value['bemerkung'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
			</div>






			<!-- Bild upload original und Thumb_nail -->

			<div class="form-group">
				<div class="images-section">
					<div class="d-flex flex-wrap">
					
			<div class="button-container-pair">
				<button class="btn btn-success btn-custom-light-green" data-target="imageContainer1" type="button">Bild 1 einfügen</button>
				<div id="imageContainer1" class="image-container"></div>   <!-- thumbnail anzeigen -->
				<input type="hidden" id="imageData1" name="imageData1" >	 <!-- original bilder speichern -->
				<input type="hidden" id="thimageData1" name="thimageData1" >	 <!-- thumbnails bilder speichern -->
				
			</div>

			<div class="button-container-pair">
				<button class="btn btn-success btn-custom-light-green" data-target="imageContainer2" type="button">Bild 2 einfügen</button>
				<div id="imageContainer2" class="image-container"></div>
				<input type="hidden" id="imageData2" name="imageData2" > 
				<input type="hidden" id="thimageData2" name="thimageData2" >	 
			</div>

			<div class="button-container-pair">
				<button class="btn btn-success btn-custom-light-green" data-target="imageContainer3" type="button">Bild 3 einfügen</button>
				<div id="imageContainer3" class="image-container"></div>
				<input type="hidden" id="imageData3" name="imageData3" >
				<input type="hidden" id="thimageData3" name="thimageData3" >	 
			</div>

			<div class="button-container-pair">
				<button class="btn btn-success btn-custom-light-green" data-target="imageContainer4" type="button">Bild 4 einfügen</button>
				<div id="imageContainer4" class="image-container"></div>
				<input type="hidden" id="imageData4" name="imageData4" >
				<input type="hidden" id="thimageData4" name="thimageData4" >	 
			</div>

			
			
			
			
			
					
						
						
					</div>
				</div>
				
			</div>

			<button type="submit" class="btn btn-primary mt-3">Speichern</button>
            <a href="log.php" class="btn btn-danger mt-3">Abbrechen</a>
        
		</form>
    </div>

    
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
	
	
	<?php echo '<script'; ?>
>
	
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-custom-light-green').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const hiddenInputId = this.getAttribute('data-target').replace('imageContainer', 'imageData');
            const targetContainer = document.getElementById(targetId);
            
            console.log(`Bereit für Einfügen in ${targetId}. Bitte drücke jetzt Ctrl+V.`);
            
            document.addEventListener('paste', (event) => {
                handlePasteEvent(event, targetContainer, hiddenInputId);
            }, { once: true });
        });
    });
});


function handlePasteEvent(event, container, hiddenInputId) {
    event.preventDefault();
    const items = (event.clipboardData || window.clipboardData).items;
    for (let item of items) {
        if (item.type.indexOf("image") !== -1) {
            const blob = item.getAsFile();
            const reader = new FileReader();
            reader.onload = function(e) {
				// Erstelle und zeige das Thumbnail
				const img = document.createElement("img");
				img.src = e.target.result;
				img.classList.add("clickable-image"); 
				img.style.width = '100px';
				img.style.height = '100px';
				img.style.objectFit = 'cover';
				container.innerHTML = ''; // Löscht vorherige Inhalte
				container.appendChild(img);

                // Speichere das Original Bild im Hidden input  imageData1 - imageData4
                document.getElementById(hiddenInputId).value = e.target.result;

				// Speichere das Thumbnailbild im versteckten Input-Feld thimageData1 - thimageData4
                const thumbnailHiddenInputId = "th" + hiddenInputId; // und füge 'th' hinzu
				
                //document.getElementById(thumbnailHiddenInputId).value =   //thumnail picture




                // Füge Event-Listener hinzu, der das Modal - zeigt original Image an,  öffnet
				img.addEventListener('click', function() {
					// Setze die Quelle des Vollbild-Images im Modal
					document.getElementById('fullSizeImage').src = img;
					// Öffne das Modal
					$('#imageModal').modal('show');
				});
            };
            reader.readAsDataURL(blob);
        }
    }
}

document.getElementById('imageForm').addEventListener('submit', function(event) {
    
    event.preventDefault(); // Verhindere das tatsächliche Absenden zum Debugging-Zweck

    // Überprüfe jedes versteckte Feld
    const imageDataFields = ['imageData1', 'imageData2', 'imageData3', 'imageData4'];
    imageDataFields.forEach(function(fieldName) {
        const value = document.getElementById(fieldName).value;
        //console.log(fieldName + ': ', value.substring(0, 100)); // Gib die ersten 100 Zeichen aus
    });

});


<?php echo '</script'; ?>
>




</body>
</html>
<?php }
}
