<form action='' method='post' enctype='multipart/form-data'>

    <label for='Nom_Grade'>Nom du grade:</label>
    <input type='text' id='gradeName' name='Nom_Grade' required>

    <label for='Desc_Produit'>Description du grade:</label>
    <textarea id='gradeDescription' name='Desc_Grade' required></textarea>

    <label for='Prix_Grade'>Prix du grade:</label>
    <input type='number' id='gradePrice' name='Prix_Grade' required>

    <label for="Stock_Grade">Stock du grade:</label>
    <input type="number" id="gradeStock" name="Stock_Grade" required>

    <label for="URL_Img_Grade">Image du grade:</label>
    <input type="file" id="gradePicture" name="gradePicture" accept="image/png, image/jpeg" required>

    <img id="gradePicturePreview" src="" alt="">
    <script>
        document.getElementById('gradePicture').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.getElementById('gradePicturePreview').src = reader.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    <input type='submit' value='Créer le grade'>
</form>