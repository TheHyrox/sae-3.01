var productModal = document.getElementById("addProductModal");

var productButtons = document.getElementsByClassName("addProductButton");

var productSpan = document.getElementsByClassName("close-product")[0];

for (var i = 0; i < productButtons.length; i++) {
    productButtons[i].onclick = function(event) {
        event.preventDefault();
        document.getElementById('productCategory').value = this.previousElementSibling.value;
        productModal.style.display = "block";
    }
}

productSpan.onclick = function() {
    productModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target === productModal) {
        productModal.style.display = "none";
    }
}