<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if (!isset($_FILES['pdf']) || $_FILES['pdf']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'upload']);
    exit;
}

$fichier = $_FILES['pdf'];
$extension = strtolower(pathinfo($fichier['name'], PATHINFO_EXTENSION));

if ($extension !== 'pdf') {
    echo json_encode(['success' => false, 'message' => 'Seuls les fichiers PDF sont acceptés']);
    exit;
}

$destination = '../data/fiche_inscription.pdf';

if (move_uploaded_file($fichier['tmp_name'], $destination)) {
    echo json_encode(['success' => true, 'message' => 'PDF uploadé avec succès']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de la sauvegarde du fichier']);
}
?>