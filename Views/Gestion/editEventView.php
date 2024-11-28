<form action='' method='post' enctype='multipart/form-data'>
    <h2>Modifier l'événement</h2>
    <input type='hidden' id='eventIdEdit' name='Id_Event'>

    <label for='eventNameEdit'>Nom de l'événement:</label>
    <input type='text' id='eventNameEdit' name='Nom_Event' required>

    <label for='eventDescriptionEdit'>Description de l'événement:</label>
    <textarea id='eventDescriptionEdit' name='Desc_Event' required></textarea>

    <label for='eventPriceEdit'>Prix de l'événement:</label>
    <input type='number' id='eventPriceEdit' name='Prix_Event' required>

    <label for="eventPlaceEdit">Stock de l'événement:</label>
    <input type="number" id="eventPlaceEdit" name="Nb_Place_Event" required>

    <label for="eventDateEdit">Date de l'événement:</label>
    <input type="date" id="eventDateEdit" name="Date_Event" required>

    <label for="eventLocationEdit">Lieu de l'événement:</label>
    <input type="text" id="eventLocationEdit" name="Lieu_Event" required>

    <label for="eventCategoryEdit">Catégorie de l'évenement</label>
    <select id="eventCategoryEdit" name="Cat_Event" required>
        <option value="Concert">Concert</option>
        <option value="Soirée">Soirée</option>
        <option value="Spectacle">Spectacle</option>
        <option value="Festival">Festival</option>
        <option value="Autre">Autre</option>
    </select>

    <label for="eventPictureEdit">Image de l'événement:</label>
    <input type="file" id="eventPictureEdit" name="eventPictureEdit" accept="image/png, image/jpeg">
    <input type="hidden" id="currentImgEdit" name="current_img">
    <img id="eventPicturePreviewEdit" src="" alt="">

    <input type='submit' value='Modifier le produit'>
</form>

<script>
    document.getElementById('eventPictureEdit').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('eventPicturePreviewEdit').src = reader.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>