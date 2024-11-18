<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
  $resourceId = $resourceIds[$group];
  $baseUrl = 'http://planning.univ-lemans.fr/jsp/custom/modules/plannings/anonymous_cal.jsp';
  $params = 'resources=' . $resourceId . '&projectId=7&calType=ical&nbWeeks=4';
  return $baseUrl . '?' . $params;
}

function downloadIcsFiles($resourceIds) {
  $logFile = '/tmp/agenda_errors.log';
  foreach ($resourceIds as $group => $resourceId) {
    $link = getDownloadLink($group, $resourceIds);
    echo "Téléchargement de $link...\n";
    $data = file_get_contents($link);
    if ($data === false || stripos($data, 'BEGIN:VCALENDAR') === false) {
      echo "Erreur : Les données pour $group ne sont pas valides.\n";
      file_put_contents($logFile, "Erreur : $group - $link\n", FILE_APPEND);
      continue;
    }
    $filename = __DIR__ . '/../Calendar/' . $group . '.ics';
    echo "Enregistrement de $filename...\n";
    if (file_put_contents($filename, $data) === false) {
      echo "Erreur : Impossible d'enregistrer $filename\n";
      file_put_contents($logFile, "Erreur d'enregistrement : $group - $filename\n", FILE_APPEND);
    } else {
      echo "Fichier $filename téléchargé avec succès.\n";
    }
  }
}

downloadIcsFiles($resourceIds);
?>
