<form action='' method='post' enctype='multipart/form-data'>
    <h2>Modifier le produit</h2>
    <input type='hidden' id='productIdEdit' name='Id_Produit'>

    <label for='productNameEdit'>Nom du produit:</label>
    <input type='text' id='productNameEdit' name='Nom_Produit' required>

    <label for='productDescriptionEdit'>Description du produit:</label>
    <textarea id='productDescriptionEdit' name='Desc_Produit' required></textarea>

    <label for='productPriceEdit'>Prix du produit:</label>
    <input type='number' id='productPriceEdit' name='Prix_Produit' required>

    <label for="productStockEdit">Stock du produit:</label>
    <input type="number" id="productStockEdit" name="Stock_Produit" required>

    <input type="hidden" id="productCategoryEdit" name="Cat_Produit">

    <label for="productPictureEdit">Image du produit:</label>
    <input type="file" id="productPictureEdit" name="productPictureEdit" accept="image/png, image/jpeg">
    <input type="hidden" id="currentImgEdit" name="current_img">
    <img id="productPicturePreviewEdit" src="" alt="">

    <input type='submit' value='Modifier le produit'>
</form>

<script>
    document.getElementById('productPictureEdit').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('productPicturePreviewEdit').src = reader.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>