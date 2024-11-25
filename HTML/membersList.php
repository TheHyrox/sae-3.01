<?php
require_once '../Utils/DBConfig/Config.php';
require_once '../Utils/DBConfig/Database.php';

use DBConfig\Database;

$conn = Database::getConnection();

$all = "SELECT Id_User, Nom_User, Prenom_User, Grp_TP_User, Url_PP_User, Niv_Acces_User FROM utilisateur";
$allmember = "SELECT Id_User, Nom_User, Prenom_User, Grp_TP_User, Url_PP_User, Niv_Acces_User FROM utilisateur WHERE Niv_Acces_User = 4";
$alladmin = "SELECT Id_User, Nom_User, Prenom_User, Grp_TP_User, Url_PP_User, Niv_Acces_User FROM utilisateur WHERE Niv_Acces_User > 4";
$but1 = "SELECT Id_User, Nom_User, Prenom_User, Grp_TP_User, Url_PP_User, Niv_Acces_User FROM utilisateur WHERE Grp_TP_User IN ('11A', '11B', '12C', '12D')";
$but2 = "SELECT Id_User, Nom_User, Prenom_User, Grp_TP_User, Url_PP_User, Niv_Acces_User FROM utilisateur WHERE Grp_TP_User IN ('21A', '21B', '22C', '22D')";
$but3 = "SELECT Id_User, Nom_User, Prenom_User, Grp_TP_User, Url_PP_User, Niv_Acces_User FROM utilisateur WHERE Grp_TP_User IN ('31A', '31B', '32C', '32D')";
$result = $conn->query($all);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Changer le CSS car en version utilisateur -->
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Membres</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        function fetchUsers(groups) {
            $.ajax({
                url: '../Controllers/fetch_users.php',
                type: 'POST',
                data: { groups: groups },
                success: function(data) {
                    $('#list-result').html(data);
                }
            });
        }

        function getActiveFilters() {
            let activeFilters = [];
            if ($('#showMembersSwitch').is(':checked')) activeFilters.push('members');
            if ($('#showAdminSwitch').is(':checked')) activeFilters.push('admin');
            if ($('#showBut1Switch').is(':checked')) activeFilters.push('but1');
            if ($('#showBut2Switch').is(':checked')) activeFilters.push('but2');
            if ($('#showBut3Switch').is(':checked')) activeFilters.push('but3');
            return activeFilters;
        }

        function checkSwitches() {
            let activeFilters = getActiveFilters();
            if (activeFilters.length === 0) {
                $('#showAllSwitch').prop('checked', true);
                fetchUsers(['all']);
            } else {
                $('#showAllSwitch').prop('checked', false);
                fetchUsers(activeFilters);
            }
        }

        $('#showAllSwitch').change(function() {
            if (this.checked) {
                fetchUsers(['all']);
                $('input[type="checkbox"]').not(this).prop('checked', false);
            }
        });

        $('#showMembersSwitch, #showAdminSwitch, #showBut1Switch, #showBut2Switch, #showBut3Switch').change(function() {
            checkSwitches();
        });

            $('#showAllSwitch').prop('checked', true);
            fetchUsers(['all']);
    });
    </script>
</head>
<body>
<?php include '../Views/header.php'; ?>

    <main>
        <div class="panel-list-member">
            <article id="settings">
                <h2>Options</h2>
                <ul>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showAllSwitch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>View All</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showMembersSwitch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>View Members</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showAdminSwitch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>View Admins</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showBut1Switch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>BUT1</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showBut2Switch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>BUT2</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showBut3Switch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>BUT3</p>
                    </li>
                </ul>
            </article>
            <article id="list-member">
                <h2>Liste des membres</h2>
                <div id="research">
                    <form action="" method="post">
                        <input type="text" name="research" id="research" placeholder="Rechercher..." required>
                        <button type="submit" value="search"><img src="../Icons/search.png" alt=""></button>
                    </form>
                </div>
                <div id="list-result" style="max-height: 400px; overflow-y: scroll;">
                    <?php
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
                        echo "No users found.";
                    }
                    ?>
                </div>
            </article>
        </div>
    </main>
</body>
</html>