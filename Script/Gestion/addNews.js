document.addEventListener('DOMContentLoaded', () => {
    const addButton = document.querySelector('#news-add input[type="submit"]');
    const popup = document.querySelector('#news-popup');
    const closeButton = document.querySelector('#news-popup .close');

    addButton.addEventListener('click', (e) => {
        e.preventDefault();
        popup.style.display = 'block';
        document.body.classList.add('popup-open');
    });

    closeButton.addEventListener('click', () => {
        popup.style.display = 'none';
        document.body.classList.remove('popup-open');
    });

    document.querySelector('#news-popup form').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const response = await fetch('/Script/Gestion/addNews.php', {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.success) {
            location.reload();
        } else {
            alert('Failed to add newsletter');
        }
    });
});