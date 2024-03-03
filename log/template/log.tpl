<!DOCTYPE html>
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
					<a href="log.php?action=AllIndikator" class="btn custom-btn">Alle Alarme</a>
					<a href="log.php?action=latest" class="btn custom-btn">aktuelle Alarme</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
