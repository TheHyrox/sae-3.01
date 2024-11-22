<?php
foreach ($grades as $row) {
    if (isset($row['Id_Grade'])) {
        echo "<article>
                    <h2>" . htmlspecialchars($row['Nom_Grade']) . "</h2>
                    <div class='imgBackground'><img src='../../Pictures/Uploads/" . htmlspecialchars($row['URL_Img_Grade']) . "' alt=''></div>
                    <p>" . htmlspecialchars($row['Desc_Grade']) . "</p>
                    <div class='row'>
                        <form action='checkout.php' method='post'>
                            <input type='hidden' name='name' value='" . htmlspecialchars($row['Nom_Grade']) . "'>
                            <input type='hidden' name='price' value='" . htmlspecialchars($row['Prix_Grade']) . "'>
                            <input type='hidden' name='quantity' value='1'>
                            <input type='submit' name='add_to_cart' value='Acheter'>
                        </form>
                        <h3>" . htmlspecialchars($row['Prix_Grade']) . "€</h3>
                    </div>
                  </article>";
    }
}
