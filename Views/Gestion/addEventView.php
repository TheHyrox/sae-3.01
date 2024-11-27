<form action='' method='post' enctype='multipart/form-data'>
    <label for='Nom_Event'>Nom de l'évenement:</label>
    <input type='text' id='eventName' name='Nom_Event' required>

    <label for='Desc_Event'>Description de l'évenement:</label>
    <textarea id='eventDescription' name='Desc_Event' required></textarea>

    <label for='Prix_Grade'>Prix de l'évenement:</label>
    <input type='number' id='eventPrice' name='Prix_Event' required>

    <label for="URL_Img_Event">Image de l'évenement:</label>
    <input type="file" id="eventPicture" name="eventPicture" accept="image/png, image/jpeg" required>

    <label for="Cat_Event">Catégorie de l'évenement</label>
    <select id="eventCategory" name="Cat_Event" required>
        <option value="Concert">Concert</option>
        <option value="Soirée">Soirée</option>
        <option value="Spectacle">Spectacle</option>
        <option value="Festival">Festival</option>
        <option value="Autre">Autre</option>
    </select>

    <label for="Date_Event">Date de l'évenement</label>
    <input type="date" id="eventDate" name="Date_Event" required>

    <label for="Lieu_Event">Lieu de l'évenement</label>
    <input type="text" id="eventPlace" name="Lieu_Event" required>

    <label for="Nb_Places_Event">Nombre de places pour l'évenement</label>
    <input type="number" id="eventPlaces" name="Nb_Places_Event" required>

    <img id="eventPicturePreview" src="" alt="">
    <script>
        document.getElementById('eventPicture').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.getElementById('eventPicturePreview').src = reader.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    <input type='submit' value="Créer l'évenement">
</form>