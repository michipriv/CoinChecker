<?php
/* Smarty version 4.3.4, created on 2024-03-06 06:52:33
  from 'C:\tmp\htdocs\log\template\indikatorList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65e804a14b5c61_97497676',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6474dc096233373b75cb3f24f69226b29236c61d' => 
    array (
      0 => 'C:\\tmp\\htdocs\\log\\template\\indikatorList.tpl',
      1 => 1709704283,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e804a14b5c61_97497676 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indikator Tabelle</title>
    <!-- Bootstrap CSS einbinden -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css" rel="stylesheet">
    <style>
        .table {
            background-color: #E3F2FD; /* Hellblau */
            border-radius: 0.25rem;
            overflow: hidden;
        }

        .table thead th {
            background-color: #B3D7FF; /* Hellblau */
            color: #0056b3; /* Dunkleres Blau für den Text */
        }

        .long-entry {
            background-color: #d4edda; /* Hellgrün für 'long' Einträge */
        }

        .short-entry {
            background-color: #f8d7da; /* Hellrot für 'short' Einträge */
        }

        .table tbody tr:hover {
            background-color: #B3E5FC; /* Hervorhebung beim Hover */
        }

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
        
        /* Vorherige Stile */
    
        .title-box {
            background-color: #B3D7FF; /* Hellblau */
            padding: 10px 20px;
            border-radius: 10px; /* Abgerundete Ecken */
            color: #0056b3; /* Dunkleres Blau für den Text */
            margin-bottom: 20px; /* Abstand nach unten */
            display: flex;
            justify-content: space-between; /* Inhalte auseinander schieben */
            align-items: center; /* Vertikales Zentrieren */
        }
        
        .back-button {
            background-color: #B3D7FF; /* Hellblau */
            color: #fff; /* Weißer Text */
            border: none;
            padding: 5px 15px;
            border-radius: 5px; /* Leicht abgerundete Ecken */
            text-decoration: none; /* Keine Unterstreichung */
            font-weight: bold;
        }
        
        .back-button:hover {
            background-color: #99ccff; /* Dunkleres Blau beim Hover */
        }
        
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="title-box">
        <h2>Indikator Tabelle</h2>
        <a href="javascript:history.back()" class="back-button">Zurück</a>
    </div>
    
            
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Tag</th>
                        <th>Zeit</th>
                        <th>Coin</th>
                        <th>Indikator</th>
                        <th>Entry</th>
                        <th>Match gefunden</th>
                        <th>Abgeglichene IDs</th>
                        <th>Geprüft</th>
                        <th>Bestätigt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indikatoren']->value, 'indikator');
$_smarty_tpl->tpl_vars['indikator']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['indikator']->value) {
$_smarty_tpl->tpl_vars['indikator']->do_else = false;
?>
                    <tr class="<?php if ($_smarty_tpl->tpl_vars['indikator']->value['entry'] == 'long') {?>long-entry<?php } elseif ($_smarty_tpl->tpl_vars['indikator']->value['entry'] == 'short') {?>short-entry<?php }?>">
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
                        <td><?php echo $_smarty_tpl->tpl_vars['indikator']->value['match_found'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['indikator']->value['matched_ids'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['indikator']->value['checked'];?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['indikator']->value['is_confirmed']) {?>Ja<?php } else { ?>Nein<?php }?></td>
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
