<div id="loginDiv">
    <form action="index.php?controller=user&action=login" method="POST">
        <div>
            <label for="mail">Adresse mail:</label>
            <input type="email" name="mail" id="mail" required>
        </div>
        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <input type="submit" id="buttonSubmit" value="Se connecter">
    </form>
    <div class="backButton"><a href="index.php">Retour</a></div>
</div>

