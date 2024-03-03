<?php
/* Smarty version 4.3.4, created on 2024-02-26 05:43:51
  from 'C:\tmp\htdocs\log\template\indikator.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65dc170782c1b1_05419161',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7adaece17af4159fbd52255df83bc85ce7115f9' => 
    array (
      0 => 'C:\\tmp\\htdocs\\log\\template\\indikator.tpl',
      1 => 1708922628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65dc170782c1b1_05419161 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indikator Tabelle</title>
    <!-- Bootstrap CSS einbinden -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hintergrundfarbe der Tabelle und abgerundete Ecken */
        .table {
            background-color: #E3F2FD; /* Hellblau */
            border-radius: 0.25rem;
            overflow: hidden; /* Stellt sicher, dass die abgerundeten Ecken sichtbar sind */
        }

        /* Hintergrundfarbe der Tabellenkopfzeile anpassen auf Hellgrün */
        .table thead th {
            background-color: #C8E6C9; /* Hellgrün */
            color: #256029; /* Dunkelgrün für besseren Kontrast */
        }

        /* Hover-Effekt für Tabellenzeilen */
        .table tbody tr:hover {
            background-color: #B3E5FC; /* Noch helleres Blau für Hover */
        }

        /* Abgerundete Ecken für die erste und letzte Zelle jeder Zeile */
        .table tbody tr td:first-child,
        .table tbody tr th:first-child {
            border-top-left-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        .table tbody tr td:last-child,
        .table tbody tr th:last-child {
            border-top-right-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Indikator Tabelle</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tag</th>
                        <th>Zeit</th>
                        <th>Coin</th>
                        <th>Indikator</th>
                        <th>Entry</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indikatoren']->value, 'indikator');
$_smarty_tpl->tpl_vars['indikator']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['indikator']->value) {
$_smarty_tpl->tpl_vars['indikator']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['indikator']->value['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['indikator']->value['tag'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['indikator']->value['zeit'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['indikator']->value['coin'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['indikator']->value['indikator'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['indikator']->value['entry'];?>
</td>
                    </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php }
}
