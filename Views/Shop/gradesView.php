<?php
$isAdminActive = isset($_SESSION['isAdminView']) && $_SESSION['isAdminView'] === true;

foreach ($grades as $row) {
    if (isset($row['Id_Grade'])) {
        echo "<article>
                    <h2>" . htmlspecialchars($row['Nom_Grade']) . "</h2>
                    <div class='imgBackground'><img src='../../Pictures/Uploads/" . htmlspecialchars($row['URL_Img_Grade']) . "' alt=''></div>
                    <p>" . htmlspecialchars($row['Desc_Grade']) . "</p>
                    <div class='row'>";

        if ($isAdminActive) {
            echo "<form action='' method='post'>
                        <input type='hidden' name='grade_id' value='" . htmlspecialchars($row['Id_Grade']) . "'>
                        <input type='submit' id='editGradeButton' 
                               data-id='" . htmlspecialchars($row['Id_Grade']) . "'
                               data-name='" . htmlspecialchars($row['Nom_Grade']) . "'
                               data-description='" . htmlspecialchars($row['Desc_Grade']) . "'
                               data-price='" . htmlspecialchars($row['Prix_Grade']) . "'
                               data-img='" . htmlspecialchars($row['URL_Img_Grade']) . "'
                               value='Modifier'>
                    </form>";
        } else {
            echo "<form action='checkout' method='post'>
                        <input type='hidden' name='name' value='" . htmlspecialchars($row['Nom_Grade']) . "'>
                        <input type='hidden' name='price' value='" . htmlspecialchars($row['Prix_Grade']) . "'>
                        <input type='hidden' name='quantity' value='1'>
                        <input type='hidden' name='modifiable' value='false'>
                        <input type='submit' name='add_to_cart' value='Acheter'>
                    </form>";
        }

        echo "<h3>" . htmlspecialchars($row['Prix_Grade']) . "€</h3>
                    </div>
                  </article>";
    }
}
?>