<?php
// confirm_alert.php
session_start();

$dbFile = 'indikator.sqlite'; // Pfad zur SQLite-Datenbank
$pdo = new PDO('sqlite:' . $dbFile);
	

$data = json_decode(file_get_contents('php://input'), true);
$alertId = $data['id'];

if (isset($alertId)) {
    $stmt = $pdo->prepare("UPDATE indikator SET is_confirmed = TRUE WHERE id = :id");
    $stmt->execute([':id' => $alertId]);
    echo json_encode(["message" => "Alert bestätigt"]);
} else {
    echo json_encode(["error" => "Fehler beim Bestätigen des Alerts"]);
}
?>
