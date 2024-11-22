<?php
$isAdmin = isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true;

echo "<article>
    <h2>" . htmlspecialchars($row['Nom_Produit']) . "</h2>
    <div class='imgBackground'><img src='../../Pictures/Uploads/" . htmlspecialchars($row['URL_Img_Produit']) . "' alt=''></div>
    <p>" . htmlspecialchars($row['Desc_Produit']) . "</p>
    <div class='row'>";

if ($isAdmin) {
    echo "<form action='editProduct.php' method='post'>
        <input type='hidden' name='product_id' value='" . htmlspecialchars($row['Id_Produit']) . "'>
        <input type='submit' name='edit_product' value='Modifier'>
    </form>";
} else {
    echo "<form action='checkout.php' method='post'>
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