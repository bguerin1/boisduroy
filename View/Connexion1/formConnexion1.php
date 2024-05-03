<?php
    require("Model/mdpChange.php");
?>
<form action="" method="post">
    <table class="tableauFormConn">
        <tr>
            <th><label for="mdp">Nouveau Mot de passe:</label></th>
            <td>
                <div class="mdp">
                    <input type="password" name="mdp" id="form1Mdp" class="inputConn">
                    <i class="fas fa-eye"></i>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="mdp">Confirmation Mot de passe:</label></th>
            <td>
                <div class="mdp">
                    <input type="password" name="1erConnexionMdp" id="form1Mdp" class="inputConn">
                    <i class="fas fa-eye"></i>
                </div>
            </td>
        </tr>
        <tr>
            <th>
            </th>
            <td>
                <div>
                    <button type="submit" name="btnModifierMDP" id="btnModifierMDP" class="buttonAll">Modifier</button>
                </div>
            </td>
        </tr>
    </table>
</form>