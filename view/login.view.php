<h1>Links handler</h1>
<h2>Page de connection/création de compte</h2>
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
        <input type="submit" class="buttonSubmit" value="Se connecter">
    </form>
</div>

<div id="createDiv">
    <h3>Creation de compte</h3>
    <form action="index.php?controller=user&action=create" method="POST">
        <div>
            <label for="createLastname">Nom:</label>
            <input type="text" name="createLastname" id="createLastname" required>
        </div>

        <div>
            <label for="createFirstname">Prénom:</label>
            <input type="text" name="createFirstname" id="createFirstname" required>
        </div>

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
        <input type="submit" class="buttonSubmit" value="Se connecter" id="confirmCreate">
    </form>
</div>
