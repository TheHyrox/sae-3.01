document.addEventListener("DOMContentLoaded", function() {
    var editGradeModal = document.getElementById("editGradeModal");

    var editGradeBtns = document.querySelectorAll("#editGradeButton");

    var editGradeSpan = document.getElementsByClassName("close-grade")[0];

    editGradeBtns.forEach(function(editGradeBtn) {
        editGradeBtn.onclick = function(event) {
            event.preventDefault();
            var gradeId = this.getAttribute('data-id');

            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../Controllers/getGrade.php?id=' + gradeId, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    try {
                        var grade = JSON.parse(xhr.responseText);
                        document.getElementById('gradeIdEdit').value = grade.Id_Grade;
                        document.getElementById('gradeNameEdit').value = grade.Nom_Grade;
                        document.getElementById('gradeDescriptionEdit').value = grade.Desc_Grade;
                        document.getElementById('gradePriceEdit').value = grade.Prix_Grade;
                        document.getElementById('currentImgEdit').value = grade.URL_Img_Grade;
                        document.getElementById('gradePicturePreviewEdit').src = '../../Pictures/Uploads/' + grade.URL_Img_Grade;

                        editGradeModal.style.display = "block";
                    } catch (e) {
                        console.error("Parsing error:", e);
                    }
                }
            };
            xhr.send();
        }
    });

    editGradeSpan.onclick = function() {
        editGradeModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target === editGradeModal) {
            editGradeModal.style.display = "none";
        }
    }

});