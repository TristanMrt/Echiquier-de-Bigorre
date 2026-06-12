<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$allowed = ['actus', 'palmares', 'tournois', 'tarifs', 'horaires', 'histoire', 'resultats', 'liens_tarifs', 'activites'];

$fichier = $_GET['fichier'] ?? '';

if (!in_array($fichier, $allowed)) {
    echo json_encode([]);
    exit;
}

$chemin = '../data/' . $fichier . '.json';

if (file_exists($chemin)) {
    echo file_get_contents($chemin);
} else {
    echo json_encode([]);
}
?>