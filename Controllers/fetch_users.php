<?php
require_once '../Utils/DBConfig/Config.php';
require_once '../Utils/DBConfig/Database.php';

use DBConfig\Database;

$conn = Database::getConnection();

$roleMode = isset($_POST['roleMode']);

echo 'isRoleMode = ' . $roleMode . ';';

if ($roleMode == 1) {
    $groups = isset($_POST['groups']) ? $_POST['groups'] : [];
    $conditions = [];

    if (in_array('members', $groups)) {
        $conditions[] = "Niv_Acces_User = 4";
    }
    if (in_array('admin', $groups)) {
        $conditions[] = "Niv_Acces_User > 4";
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

    $sql = "SELECT Id_User, Nom_User, Prenom_User, Grp_TP_User, Url_PP_User, Niv_Acces_User FROM UTILISATEUR";
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(' OR ', $conditions);
    }
} else {
    $sql = "SELECT Nom_Grade, Desc_Grade, URL_Img_Grade, Prix_Grade FROM GRADE";
}

$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        if ($roleMode == false) {
            $urlPPUser = isset($row["Url_PP_User"]) ? $row["Url_PP_User"] : 'https://www.w3schools.com/howto/img_avatar.png';
            $prenomUser = isset($row["Prenom_User"]) ? $row["Prenom_User"] : 'N/A';
            $nomUser = isset($row["Nom_User"]) ? $row["Nom_User"] : 'N/A';
            $grpTPUser = isset($row["Grp_TP_User"]) ? $row["Grp_TP_User"] : 'N/A';
            $idUser = isset($row["Id_User"]) ? $row["Id_User"] : 'N/A';

            echo '<div class="profil-bar">';
            echo '<div>';
            echo '<img src="' . $urlPPUser . '" alt="">';
            echo '<p style="text-align: left">' . $prenomUser . ' ' . $nomUser . ' - ' . $grpTPUser . '</p>';
            echo '</div>';
            echo '<form action="" method="post">';
            echo '<button type="submit" value="' . $idUser . '">Voir</button>';
            echo '</form>';
            echo '</div>';
        } else {
            $nomGrade = isset($row["Nom_Grade"]) ? $row["Nom_Grade"] : 'N/A';
            $descGrade = isset($row["Desc_Grade"]) ? $row["Desc_Grade"] : 'N/A';
            $urlImgGrade = isset($row["URL_Img_Grade"]) ? "../Pictures/" . $row["URL_Img_Grade"] : '';
            $prixGrade = isset($row["Prix_Grade"]) ? $row["Prix_Grade"] : 'N/A';

            echo '<div class="profil-bar">';
            echo '<div>';
            echo '<img src="' . $urlImgGrade . '" alt="">';
            echo '<p style="text-align: left">' . $nomGrade . ' - ' . $descGrade . ' - ' . $prixGrade . '</p>';
            echo '</div>';
            echo '</div>';
        }
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