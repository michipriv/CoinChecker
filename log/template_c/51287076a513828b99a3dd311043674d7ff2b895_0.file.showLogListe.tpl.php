<?php
/* Smarty version 4.3.4, created on 2024-02-24 07:45:17
  from 'C:\tmp\htdocs\log\template\showLogListe.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d9907d5991f8_11791314',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51287076a513828b99a3dd311043674d7ff2b895' => 
    array (
      0 => 'C:\\tmp\\htdocs\\log\\template\\showLogListe.tpl',
      1 => 1708757068,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d9907d5991f8_11791314 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-Liste</title>
    <!-- Einbinden des Bootstrap Litera CSS von Bootswatch -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Responsives Design für Mobilgeräte */
        @media (max-width: 768px) {
            table.table-responsive-sm {
                overflow-x: auto;
            }
        }
        
        /* Hover-Effekt für Tabellenzeilen */
        table.table tbody tr:hover {
            background-color: #f0f0f0; /* Hellgrau */
            transition: background-color 0.2s ease-in-out;
        }

        /* Hintergrundfarbe des Headers */
        .header {
            background-color: #ADD8E6; /* Hellblau */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4 header">Log-Liste</h2>
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Datum</th>
                    <th>Uhrzeit</th>
                    <th>Coin</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['logs']->value, 'log');
$_smarty_tpl->tpl_vars['log']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['log']->value) {
$_smarty_tpl->tpl_vars['log']->do_else = false;
?>
                    <tr onclick="window.location.href = '/log/log.php?action=showID&id=<?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
'">
                        <td><?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['log']->value['datum'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['log']->value['uhrzeit'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['log']->value['coin'];?>
</td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
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
