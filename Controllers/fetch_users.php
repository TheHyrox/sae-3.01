<?php
require_once '../Utils/DBConfig/Config.php';
require_once '../Utils/DBConfig/Database.php';

use DBConfig\Database;

$conn = Database::getConnection();

$groups = $_POST['groups'];
$conditions = [];

if (in_array('members', $groups)) {
    $conditions[] = "Niv_Acces_User = 4";
}
if (in_array('admin', $groups)) {
    $conditions[] = "Niv_Acces_User <= 3";
}
if (in_array('but1', $groups)) {
    $conditions[] = "Grp_TP_User IN ('11A', '11B', '12C', '12D')";
}
if (in_array('but2', $groups)) {
    $conditions[] = "Grp_TP_User IN ('21A', '21B', '22C', '22D')";
}
if (in_array('but3', $groups)) {
    $conditions[] = "Grp_TP_User IN ('31A', '31B', '32C', '32D')";
}

$sql = "SELECT Id_User, Nom_User, Prenom_User, Grp_TP_User, Url_PP_User, Niv_Acces_User FROM utilisateur";
if (!empty($conditions)) {
    $sql .= " WHERE " . implode(' OR ', $conditions);
}

$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="profil-bar">';
        echo '<div>';
        echo '<img src="' . $row["Url_PP_User"] . '" alt="">';
        echo '<p style="text-align: left">' . $row["Prenom_User"] . ' ' . $row["Nom_User"] . ' - ' . $row["Grp_TP_User"] . '</p>';
        echo '</div>';
        echo '<form action="" method="post">';
        echo '<button type="submit" value="' . $row["Id_User"] . '">Voir</button>';
        echo '</form>';
        echo '</div>';
    }
} else {
    echo '<div class="profil-bar">';
    echo '<div>';
    echo '<img src="https://static.vecteezy.com/system/resources/previews/044/448/989/non_2x/round-red-cross-mark-free-png.png" alt="">';
    echo '<p style="text-align: left">No Users was found</p>';
    echo '</div>';
    echo '</div>';
}
?>