<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$allowed = ['actus', 'palmares', 'tournois', 'tarifs', 'horaires', 'histoire', 'resultats', 'liens_tarifs'];

$fichier = $_POST['fichier'] ?? '';
$donnees = $_POST['donnees'] ?? '';

if (!in_array($fichier, $allowed)) {
    echo json_encode(['success' => false, 'message' => 'Fichier non autorisé']);
    exit;
}

$chemin = '../data/' . $fichier . '.json';

if (file_put_contents($chemin, $donnees) !== false) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de la sauvegarde']);
}
?>