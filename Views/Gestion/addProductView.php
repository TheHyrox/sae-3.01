<form action='' method='post' enctype='multipart/form-data'>
    <input type='hidden' id='productCategory' name='Cat_Produit' required>

    <label for='Nom_Produit'>Nom du produit:</label>
    <input type='text' id='productName' name='Nom_Produit' required>

    <label for='Desc_Produit'>Description du produit:</label>
    <textarea id='productDescription' name='Desc_Produit' required></textarea>

    <label for='Prix_Produit'>Prix du produit:</label>
    <input type='number' id='productPrice' name='Prix_Produit' required>

    <label for="Stock_Produit">Stock du produit:</label>
    <input type="number" id="productStock" name="Stock_Produit" required>

    <label for="URL_Img_Produit">Image du produit:</label>
    <input type="file" id="productPicture" name="productPicture" accept="image/png, image/jpeg" required>

    <img id="productPicturePreview" src="" alt="">
    <script>
        document.getElementById('productPicture').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.getElementById('productPicturePreview').src = reader.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    <input type='submit' value='Créer le produit'>
</form>