<form action='' method='post' enctype='multipart/form-data'>
    <h2>Modifier le grade</h2>
    <input type='hidden' id='gradeIdEdit' name='Id_Grade'>

    <label for='gradeNameEdit'>Nom du grade:</label>
    <input type='text' id='gradeNameEdit' name='Nom_Grade' required>

    <label for='gradeDescriptionEdit'>Description du grade:</label>
    <textarea id='gradeDescriptionEdit' name='Desc_Grade' required></textarea>

    <label for='gradePriceEdit'>Prix du grade:</label>
    <input type='number' id='gradePriceEdit' name='Prix_Grade' required>

    <label for="gradePictureEdit">Image du grade:</label>
    <input type="file" id="gradePictureEdit" name="gradePictureEdit" accept="image/png, image/jpeg">
    <input type="hidden" id="currentImgEdit" name="current_imgEdit">
    <img id="gradePicturePreviewEdit" src="" alt="">

    <input type='submit' value='Modifier le grade'>
</form>

<script>
    document.getElementById('gradePictureEdit').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('gradePicturePreviewEdit').src = reader.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>