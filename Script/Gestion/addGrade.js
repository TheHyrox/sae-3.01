var addGradeModal = document.getElementById("addGradeModal");

var addGradeBtn = document.getElementById("addGradeButton");

var addGradeSpan = document.getElementsByClassName("close-grade")[0];

addGradeBtn.onclick = function(event) {
    event.preventDefault();
    document.getElementById('gradeName').value = '';
    document.getElementById('gradeDescription').value = '';
    document.getElementById('gradePrice').value = '';
    document.getElementById('gradePicture').value = '';
    document.getElementById('gradePicturePreview').src = '';

    addGradeModal.style.display = "block";
}

addGradeSpan.onclick = function() {
    addGradeModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target === addGradeModal) {
        addGradeModal.style.display = "none";
    }
}