<?php
$isAdminView = isset($_SESSION['isAdminView']) && $_SESSION['isAdminView'] === true;

echo "<article>
    <h2>" . htmlspecialchars($row['Nom_Produit']) . "</h2>
    <div class='imgBackground'><img src='../../Pictures/Uploads/" . htmlspecialchars($row['URL_Img_Produit']) . "' alt=''></div>
    <p>" . htmlspecialchars($row['Desc_Produit']) . "</p>
    <div class='row'>";

if ($isAdminView) {
    echo "<form action='' method='post'>
        <input type='hidden' name='product_id' value='" . htmlspecialchars($row['Id_Produit']) . "'>
        <input type='submit' id='editProductButton' 
               data-id='" . htmlspecialchars($row['Id_Produit']) . "'
               data-name='" . htmlspecialchars($row['Nom_Produit']) . "'
               data-description='" . htmlspecialchars($row['Desc_Produit']) . "'
               data-price='" . htmlspecialchars($row['Prix_Produit']) . "'
               data-stock='" . htmlspecialchars($row['Stock_Produit']) . "'
               data-img='" . htmlspecialchars($row['URL_Img_Produit']) . "'
               value='Modifier'>
    </form>";
} else {
    echo "<form action='checkout' method='post'>
        <input type='hidden' name='name' value='" . htmlspecialchars($row['Nom_Produit']) . "'>
        <input type='hidden' name='price' value='" . htmlspecialchars($row['Prix_Produit']) . "'>
        <input type='hidden' name='quantity' value='1'>
        <input type='submit' name='add_to_cart' value='Acheter'>
    </form>";
}

echo "<h3>" . htmlspecialchars($row['Prix_Produit']) . "€</h3>
    </div>
</article>";
?>