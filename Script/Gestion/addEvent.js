var addEventModal = document.getElementById("addEventModal");

var addEventBtn = document.getElementById("addEventButton");

var addEventSpan = document.getElementsByClassName("close-event")[0];

addEventBtn.onclick = function(event) {
    event.preventDefault();
    addEventModal.style.display = "block";
}

addEventSpan.onclick = function() {
    addEventModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target === addEventModal) {
        addEventModal.style.display = "none";
    }
}