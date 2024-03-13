<?php
/* Smarty version 4.3.4, created on 2024-03-09 10:31:54
  from 'C:\tmp\htdocs\log\template\indikatorLast.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65ec2c8a96d944_44200889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e7543916f12803dc4119bc3b8c2ffdbe86a9e72' => 
    array (
      0 => 'C:\\tmp\\htdocs\\log\\template\\indikatorLast.tpl',
      1 => 1709976713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ec2c8a96d944_44200889 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\tmp\\htdocs\\log\\smarty\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),1=>array('file'=>'C:\\tmp\\htdocs\\log\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coin, Zeit-Indikator und Leere Boxen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/litera/bootstrap.min.css">
    <link rel="stylesheet" href="template/indikator.css">



<?php echo '<script'; ?>
>
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
     
<?php echo '</script'; ?>
>



</head>
<body>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['entriesData']->value, 'data', false, 'coin');
$_smarty_tpl->tpl_vars['data']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['coin']->value => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->do_else = false;
?>
<div class="container">
    
    <div class="row">
        
        <!-- box1 -->
       <!-- Coin Box -->
        <div class="col-md-4">
            <div class="custom-box coin-box blink" id="coin_box_<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['coin']->value,'USDT','');?>
">
                <h1 style="font-size: 36px; font-weight: bold; letter-spacing: 2px;"><?php echo $_smarty_tpl->tpl_vars['coin']->value;?>
</h1>
            </div>
        </div>
        
        <!-- box2 -->
        <div class="col-md-4">
            <div class="custom-box time-indicator-box">
                <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['data']->value['entries']) > 0) {?>
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
                <?php }?>
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
                 <button class="btn btn-custom btn-alarm" data-coin="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['coin']->value,'USDT','');?>
" style="background-color: #AEC6CF;">Alarm</button>
                 <button class="btn btn-custom" style="background-color: #FDBA74;">TradingView</button> <!-- Pastellorange -->
                 <button class="btn btn-custom" style="background-color: #77DD77;">Long</button> <!-- Pastellgrün -->
                 <button class="btn btn-custom" style="background-color: #FF6961;">Short</button> <!-- Pastellrot -->
                 <button class="btn btn-custom" style="background-color: #CFCFC4;">Close</button> <!-- Pastellgrau -->
             </div>
         </div>
         
         
         
    </div>
    
   
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</body>
</html>
<?php }
}
