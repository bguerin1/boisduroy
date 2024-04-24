<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.1-web\css\all.min.css" />
    <title>Bois Du Roy</title>
</head>
<body>
    <header>
        <nav class="menu" role="navigation">
                <div class="inner">
                    <div class="m-left">
                        <h1 class="logo">Bois Du Roy</h1>
                    </div>
                    <div class="m-left2">
                        <a href="index.php"> <img src="img/arbre.png" alt="" class="imageLogo"></a>
                    </div>
                </div>     
        </nav>
    </header>
    <br><br><br>
    <h1 class="central">Bienvenue Jean-Dupont !</h1>
    <p class="central"> Pour votre première connexion, veuillez changer votre mot de passe : </p> 
    <div class="central-sectionFormPremsConn">
        <form action="pageConnexion.php">
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
                            <input type="password" name="mdp" id="form1Mdp" class="inputConn">
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
    </div>
</body>
</html>