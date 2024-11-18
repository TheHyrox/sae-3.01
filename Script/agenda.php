<?php
$resourceIds = array(
  'TP11A' => 282,
  'TP11B' => 567,
  'TP12C' => 861,
  'TP12D' => 869,
  'TP21A' => 2667,
  'TP21B' => 2668,
  'TP22C' => 3113,
  'TP22D' => 3115,
  'TP31A' => 5269,
  'TP31B' => 5419,
  'TP32C' => 6239,
  'TP32D' => 6241
);

function getDownloadLink($group, $resourceIds) {
  if (!isset($resourceIds[$group])) {
    throw new Exception("Groupe invalide : $group");
  }
  $resourceId = $resourceIds[$group];
  $baseUrl = 'http://planning.univ-lemans.fr/jsp/custom/modules/plannings/anonymous_cal.jsp';
  $params = 'resources=' . $resourceId . '&projectId=7&calType=ical&nbWeeks=4';
  return $baseUrl . '?' . $params;
}

function downloadIcsFiles($resourceIds) {
  foreach ($resourceIds as $group => $resourceId) {
    try {
      $link = getDownloadLink($group, $resourceIds);
      echo "Téléchargement de $link...\n";
      $data = file_get_contents($link);
      if ($data === false) {
        echo "Erreur lors du téléchargement de $link\n";
        continue;
      }
      $filename = '../Calendar/' . $group . '.ics';
      echo "Enregistrement de $filename...\n";
      if (file_put_contents($filename, $data) === false) {
        echo "Erreur lors de l'enregistrement de $filename\n";
      } else {
        echo "Fichier $filename téléchargé avec succès\n";
      }
    } catch (Exception $e) {
      echo "Erreur : " . $e->getMessage() . "\n";
    }
  }
}

// Exécution
downloadIcsFiles($resourceIds);
?>
