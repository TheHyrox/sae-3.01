var gradeModal = document.getElementById("addGradeModal");

var gradeBtn = document.getElementById("addGradeButton");

var gradeSpan = document.getElementsByClassName("close-grade")[0];

gradeBtn.onclick = function(event) {
    event.preventDefault();
    gradeModal.style.display = "block";
}

gradeSpan.onclick = function() {
    gradeModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target === gradeModal) {
        gradeModal.style.display = "none";
    }
}