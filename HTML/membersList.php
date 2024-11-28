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
            let isRoleMode = false;

            function fetchUsers(groups, searchTerm = '') {
                $.ajax({
                    url: '../Controllers/fetch_users.php',
                    type: 'POST',
                    data: { groups: groups, roleMode: isRoleMode, search: searchTerm },
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
            $('#memberRoleSwitch').prop('checked', false);
            fetchUsers(['all']);

            $('#memberRoleSwitch').on('change', function() {
                isRoleMode = this.checked;

                if (isRoleMode) {
                    $('#viewmember-p').text('Role 1');
                    $('#viewadmin-p').text('Role 2');
                    $('#viewbut1-p').text('Role 3');
                    $('#viewbut2-p').hide(); 
                    $('#showBut2Switch').hide();
                    $('#viewbut3-p').hide(); 
                    $('#showBut3Switch').hide();
                } else {
                    $('#viewmember-p').text('View Members');
                    $('#viewadmin-p').text('View Admins');
                    $('#viewbut1-p').text('BUT1');
                    $('#viewbut2-p').text('BUT2').show();
                    $('#showBut2Switch').show();
                    $('#viewbut3-p').text('BUT3').show(); 
                    $('#showBut3Switch').show();
                }

                checkSwitches();
            });

            $('#researchInput').on('input', function() {
                let searchTerm = $(this).val().toLowerCase(); // Get the search term
                let activeFilters = getActiveFilters();
                fetchUsers(activeFilters, searchTerm); // Fetch users with the search term
            });
        });
    </script>
</head>
<body>
<?php include '../Views/header.php'; ?>

    <main>
        <div class="panel-list-member">
            <article id="settings">
                <h2>Options</h2>
                <label class="switch switch-text">
                    <input type="checkbox" id="memberRoleSwitch" name="demoCheckBox">
                    <span class="s-text"></span>
                    <span></span>
                </label>
                <ul>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showAllSwitch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p id="viewall-p">View All</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showMembersSwitch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p id="viewmember-p">View Members</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showAdminSwitch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p id="viewadmin-p">View Admins</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showBut1Switch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p id="viewbut1-p">BUT1</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showBut2Switch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p id="viewbut2-p">BUT2</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showBut3Switch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p id="viewbut3-p">BUT3</p>
                    </li>
                </ul>
            </article>
            <article id="list-member">
                <h2>Liste des membres</h2>
                <div id="research">
                    <form id="searchForm" action="" method="post">
                        <input type="text" name="research" id="researchInput" placeholder="Rechercher..." required>
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