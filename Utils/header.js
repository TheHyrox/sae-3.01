document.addEventListener('DOMContentLoaded', () => {
    const adminSwitch = document.getElementById('adminSwitch');
    const linksContainer = document.getElementById('linksContainer');
    const root = document.documentElement;

    function updateColors(isChecked) {
        if (isChecked) {
            root.style.setProperty('--linearClassic', 'linear-gradient(90deg, rgba(217, 125, 18, 1) 0%, rgba(233, 83, 19, 1) 27%, rgba(237, 40, 217, 1) 100%)');
            root.style.setProperty('--linearAdmin', 'linear-gradient(90deg, rgba(0, 151, 178, 1) 0%, rgba(32, 164, 153, 1) 27%, rgba(78, 182, 116, 1) 100%)');
        } else {
            root.style.setProperty('--linearClassic', 'linear-gradient(90deg, rgba(0, 151, 178, 1) 0%, rgba(32, 164, 153, 1) 27%, rgba(78, 182, 116, 1) 100%)');
            root.style.setProperty('--linearAdmin', 'linear-gradient(90deg, rgba(217, 125, 18, 1) 0%, rgba(233, 83, 19, 1) 27%, rgba(237, 40, 217, 1) 100%)');
        }
    }

    if (adminSwitch) {
        adminSwitch.addEventListener('change', () => {
            const isChecked = adminSwitch.checked;

            fetch(isChecked ? 'Views/headerLinksAdminView.php' : 'Views/headerLinksView.php')
                .then(response => {
                    if (!response.ok) throw new Error('Erreur lors du chargement des liens');
                    return response.text();
                })
                .then(html => {
                    linksContainer.innerHTML = html;
                })
                .catch(error => console.error(error));

            fetch('../Utils/saveAdminViewState.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ isAdminView: isChecked })
            });

            updateColors(isChecked);

            fetch('../Utils/saveColorState.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    linearClassic: getComputedStyle(root).getPropertyValue('--linearClassic'),
                    linearAdmin: getComputedStyle(root).getPropertyValue('--linearAdmin')
                })
            });
        });

        updateColors(adminSwitch.checked);
    }
});