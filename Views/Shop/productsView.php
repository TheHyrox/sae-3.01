<?php
echo "<article>
                    <h2>" . htmlspecialchars($row['Nom_Produit']) . "</h2>
                    <div class='imgBackground'><img src='../../Pictures/Uploads/" . htmlspecialchars($row['URL_Img_Produit']) . "' alt=''></div>
                    <p>" . htmlspecialchars($row['Desc_Produit']) . "</p>
                    <div class='row'>
                        <form action='checkout.php' method='post'>
                            <input type='hidden' name='name' value='" . htmlspecialchars($row['Nom_Produit']) . "'>
                            <input type='hidden' name='price' value='" . htmlspecialchars($row['Prix_Produit']) . "'>
                            <input type='hidden' name='quantity' value='1'>
                            <input type='submit' name='add_to_cart' value='Acheter'>
                        </form>
                        <h3>" . htmlspecialchars($row['Prix_Produit']) . "€</h3>
                    </div>
                  </article>";
