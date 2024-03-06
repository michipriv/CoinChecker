<?php
/* Smarty version 4.3.4, created on 2024-03-06 21:50:09
  from 'C:\tmp\htdocs\log\template\indikatorLast.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65e8d7011c1b02_56940490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e7543916f12803dc4119bc3b8c2ffdbe86a9e72' => 
    array (
      0 => 'C:\\tmp\\htdocs\\log\\template\\indikatorLast.tpl',
      1 => 1709758206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e8d7011c1b02_56940490 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\tmp\\htdocs\\log\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indikator Übersicht</title>
    <!-- Bootstrap CSS direkt von CDN für das Styling. -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 20px;
        }
        .header {
            background-color: #87CEFA; /* Helles Blau */
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .entry-long {
            background-color: #d4edda; /* Hellgrün */
        }
        .entry-short {
            background-color: #f8d7da; /* Hellrot */
        }
        .btn-custom {
            background-color: #87CEEB; /* Himmelblau */
            color: white;
            border-radius: 5px;
            border: none;
            padding: 5px 10px;
        }
        .btn-custom:hover {
            background-color: #549ACF; /* Dunkleres Blau */
        }
        .table {
            border-radius: 0.75rem;
            overflow: hidden; /* Stellt sicher, dass die abgerundeten Ecken innerhalb des Container-Elements angewendet werden */
        }
        .table-hover tbody tr:hover {
            background-color: #B3E5FC; /* Sehr helles Blau */
        }
        .btn-long {
        background-color: #6B8E23; /* Hellgrün */
        color: white;
        border: none;
        }
        .btn-long:hover {
            background-color: #556B2F; /* Dunkleres Grün beim Hover */
        }
    
        .btn-short {
            background-color: #FFB6C1; /* Hellrot */
            color: white;
            border: none;
        }
        .btn-short:hover {
            background-color: #DB7093; /* Dunkleres Rot beim Hover */
        }
    
        .btn-close {
            background-color: #D3D3D3; /* Hellgrau */
            color: white;
            border: none;
        }
        .btn-close:hover {
            background-color: #A9A9A9; /* Dunkleres Grau beim Hover */
        }
    
        /* Zusätzlicher Stil für Abstände zwischen den Buttons */
        .btn + .btn {
            margin-left: 10px;
        }
        .padding-left-custom {
            padding-left: 5px !important; /* Überschreibt das Standard-Padding von Bootstrap */
        }
        .coin-box {
            background-color: #87CEFA; /* Helles Blau */
            border-radius: 10px; /* Abgerundete Ecken */
            padding: 10px; /* Innerer Abstand */
            color: white; /* Textfarbe */
            margin-right: 5px; /* Abstand nach rechts */
            /* Sorgt für eine gleichmäßige Höhe mit den angrenzenden Boxen */
            display: flex;
            align-items: center;
            justify-content: center;
        }
                    
    </style>
 
    <?php echo '<script'; ?>
>
        <!-- Html seite alle 3 sekunedn neu laden -->
        setInterval(function() { window.location.reload(); }, 5000);
    <?php echo '</script'; ?>
>



</head>
<body>
<div class="container">
    <div class="header">
        <h2>Letzte Indikatoren</h2>
    </div>
    

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['entriesData']->value, 'data', false, 'coin');
$_smarty_tpl->tpl_vars['data']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['coin']->value => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->do_else = false;
?>
<div class="row mb-3 d-flex align-items-stretch">
    <!-- Box für den Coin-Namen -->
    <div class="col-4 d-flex">
        <div class="coin-box w-100">
            <h3 id="coin_<?php echo $_smarty_tpl->tpl_vars['coin']->value;?>
" class="coin-name <?php if ($_smarty_tpl->tpl_vars['data']->value['gotSignal']) {?>blink-red<?php }?>"><?php echo $_smarty_tpl->tpl_vars['coin']->value;?>
</h3>
        </div>
    </div>

    <!-- Mittlere Spalte für Zeit und Indikator -->
    <div class="col-4 d-flex">
        <div class="w-100">
            <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['data']->value['entries']) > 0) {?>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['entries'], 'entry');
$_smarty_tpl->tpl_vars['entry']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->do_else = false;
?>
                        <tr class="<?php if ($_smarty_tpl->tpl_vars['entry']->value['entry'] == 'long') {?>entry-long<?php } else { ?>entry-short<?php }?>">
                            <td><?php echo $_smarty_tpl->tpl_vars['entry']->value['zeit'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['entry']->value['indikator'];?>
</td>
                        </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
            <?php } else { ?>
            <p>Keine Einträge gefunden.</p>
            <?php }?>
        </div>
    </div>

    <!-- Rechte Spalte, vorerst leer -->
    <div class="col-4 d-flex">
        <div class="w-100">
            <!-- Platzhalter für zukünftige Inhalte -->
        </div>
    </div>
</div>

<!-- Container für die Buttons, die sich über die gesamte Breite erstrecken -->
<div class="row">
    <div class="col-12">
        <div class="confirm-button-container mb-5">
            <button class="btn btn-custom">Alarm Bestätigen</button>
            <a href="https://www.tradingview.com/" target="_blank" class="btn btn-custom">TradingView</a>
            <button class="btn btn-long">Long</button>
            <button class="btn btn-short">Short</button>
            <button class="btn btn-close">Close</button>
        </div>
    </div>
</div>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


        
       
</div>
<!-- Optional JavaScript -->
<!-- jQuery und Bootstrap JS -->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
