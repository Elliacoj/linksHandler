<div id="loginDiv">
    <h3>Login</h3>
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
</div>

<div id="CreateDiv">
    <h3>Creation de compte</h3>
    <form action="index.php?controller=user&action=create" method="POST">
        <div>
            <label for="createMail">Adresse mail:</label>
            <input type="email" name="createMail" id="createMail" required>
        </div>

        <div>
            <label for="createPassword">Mot de passe:</label>
            <input type="password" name="createPassword" id="createPassword" required>
        </div>

        <div>
            <label for="confirmCreatePassword">Confirme mot de passe:</label>
            <input type="password" name="confirmCreatePassword" id="confirmCreatePassword" required>
        </div>
        <input type="submit" id="buttonSubmit" value="Se connecter">
    </form>
</div>

<div class="backButton"><a href="index.php">Retour</a></div>
