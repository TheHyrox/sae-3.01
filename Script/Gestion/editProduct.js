document.addEventListener("DOMContentLoaded", function() {
    var editProductModal = document.getElementById("editProductModal");

    var editProductBtns = document.querySelectorAll("#editProductButton");

    var editProductSpan = document.getElementsByClassName("close-product")[0];

    editProductBtns.forEach(function(editProductBtn) {
        editProductBtn.onclick = function(event) {
            event.preventDefault();
            var productId = this.getAttribute('data-id');

            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../Controllers/getProduct.php?id=' + productId, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    try {
                        var product = JSON.parse(xhr.responseText);
                        document.getElementById('productIdEdit').value = product.Id_Produit;
                        document.getElementById('productNameEdit').value = product.Nom_Produit;
                        document.getElementById('productDescriptionEdit').value = product.Desc_Produit;
                        document.getElementById('productPriceEdit').value = product.Prix_Produit;
                        document.getElementById('productCategoryEdit').value = product.Cat_Produit;
                        document.getElementById('productStockEdit').value = product.Stock_Produit;
                        document.getElementById('currentImgEdit').value = product.URL_Img_Produit;
                        document.getElementById('productPicturePreviewEdit').src = '../../Pictures/Uploads/' + product.URL_Img_Produit;

                        editProductModal.style.display = "block";
                    } catch (e) {
                        console.error("Parsing error:", e);
                    }
                }
            };
            xhr.send();
        }
    });

    editProductSpan.onclick = function() {
        editProductModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target === editProductModal) {
            editProductModal.style.display = "none";
        }
    }

});