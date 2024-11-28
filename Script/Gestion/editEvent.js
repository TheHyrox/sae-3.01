document.addEventListener("DOMContentLoaded", function() {
    var editEventModal = document.getElementById("editEventModal");

    var editEventBtns = document.querySelectorAll("#editEventButton");

    var editEventSpan = document.getElementsByClassName("close-event")[0];

    editEventBtns.forEach(function(editEventBtn) {
        editEventBtn.addEventListener('click', function(event) {
            event.preventDefault();
            var eventId = this.parentElement.parentElement.parentElement.getAttribute('data-id');

            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../Controllers/getEvent.php?id=' + eventId, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var event = JSON.parse(xhr.responseText);
                        document.getElementById('eventIdEdit').value = event.Id_Event;
                        document.getElementById('eventNameEdit').value = event.Nom_Event;
                        document.getElementById('eventDescriptionEdit').value = event.Desc_Event;
                        document.getElementById('eventDateEdit').value = event.Date_Event;
                        document.getElementById('eventLocationEdit').value = event.Lieu_Event;
                        document.getElementById('eventCategoryEdit').value = event.Cat_Event;
                        document.getElementById('eventPlaceEdit').value = event.Nb_Place_Event;
                        document.getElementById('eventPriceEdit').value = event.Prix_Event;
                        document.getElementById('currentImgEdit').value = event.URL_Img_Event;
                        document.getElementById('eventPicturePreviewEdit').src = '../../Pictures/Uploads/' + event.URL_Img_Event;

                        editEventModal.style.display = "block";
                    } catch (e) {
                        console.error("Parsing error:", e);
                    }
                }
            };
            xhr.send();
        });
    });

    editEventSpan.onclick = function() {
        editEventModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target === editEventModal) {
            editEventModal.style.display = "none";
        }
    }
});