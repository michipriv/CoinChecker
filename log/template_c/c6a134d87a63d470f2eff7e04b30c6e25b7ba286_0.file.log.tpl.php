<?php
/* Smarty version 4.3.4, created on 2024-03-05 22:00:10
  from 'C:\tmp\htdocs\log\template\log.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65e787dadc7c87_56225807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6a134d87a63d470f2eff7e04b30c6e25b7ba286' => 
    array (
      0 => 'C:\\tmp\\htdocs\\log\\template\\log.tpl',
      1 => 1709672409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e787dadc7c87_56225807 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Management</title>
    <!-- Einbinden des Bootstrap Litera CSS von Bootswatch -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Benutzerdefinierte Button-Stile */
        .custom-btn {
            background-color: #b3e0ff; /* Blass hellblau */
            color: #ffffff; /* Weißer Text */
            border: none; /* Kein Rand */
        }
        .custom-btn:hover {
            background-color: #99ccff; /* Dunkleres Blau beim Hover */
            color: #ffffff; /* Textfarbe beibehalten */
        }
        /* Stellt sicher, dass Buttons untereinander und mittig ausgerichtet sind */
        .button-container .btn {
            display: block; /* Block-Level, damit sie die volle Breite einnehmen */
            width: 100%; /* Volle Breite */
            margin-bottom: 10px; /* Abstand zwischen den Buttons */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Log Management</h2>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <div class="button-container">
                    <a href="log.php?action=dbinit" class="btn custom-btn">DB </a>
					<a href="log.php?action=showlist" class="btn custom-btn">Log-Liste anzeigen</a>
                    <a href="log.php?action=form" class="btn custom-btn">Log-Formular anzeigen</a>
					<a href="log.php?action=AlarmAnzeige" class="btn custom-btn">Alle Alarme</a>
					<a href="log.php?action=latest" class="btn custom-btn">aktuelle Alarme</a>
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
