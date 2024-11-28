<article id="eventDetails">
    <h1 style="display: none" id="idEventEdit" data-id=""></h1>
    <h2>Nom évènement</h2>
    <img src="../../Pictures/soiree-jeux.webp" alt="image">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis quisquam aspernatur assumenda excepturi, architecto sit ipsum odit adipisci eveniet provident, consectetur reprehenderit quidem illo! Eligendi a adipisci magnam dolores repellendus!</p>
    <div class="row">
        <form action="" method="post">
            <?php
            if (isset($_SESSION['isAdminView']) && $_SESSION['isAdminView']) {
                echo "<input type='submit' id='editEventButton' value='Modifier'>";
            } else {
                echo "<input type='submit' value='Réserver'>";
            }
            ?>
        </form>
        <h3>3€</h3>
    </div>
</article>