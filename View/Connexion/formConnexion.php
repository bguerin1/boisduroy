<form action="redirection.php" class="formAccueil" method="post" id="formConnexion">
    <h1 class="central"> Se connecter :</h1>
    <table class="tableauFormConn">
        <tr>
            <th><label for="identifiant">Identifiant :</label></th>
            <td>
                <div>
                    <input type="text" name="matricule" id="form1Login" class="inputConn">
                </div>
            </td>
        </tr>
        <tr>
            <td><div id="form1LoginError"></td>
        </tr>
        <tr>
            <th><label for="mdp">Mot de passe:</label></th>
            <td>
                <div class="mdp">
                    <input type="password" name="mdp" id="form1Mdp" class="inputConn">
                    <i class="fas fa-eye"></i>
                </div>
            </td>
        </tr>
    </table>
    <div id="form1MdpError"></div>
    <br>
    <button type="submit" name="btnConnexion" id="btnConnexion" class="buttonAll">Connexion</button>
</form>