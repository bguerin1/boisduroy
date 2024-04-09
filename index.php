<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Bois Du Roy</title>
</head>
<body>
    <header>
        <nav class="menu" role="navigation">
            <div class="inner">
                <div class="m-left">
                    <h1 class="logo">Bois Du Roy</h1>
                    <a href="index.php"> <img src="img/arbre.png" alt=""></a>
                </div>
            </div>
        </nav>
    </header>

    <div class="central-section">
        <h1 class="central"> Se connecter :</h1>
        <form action="1èreconnexion.php" class="formAccueil" method="post">
            <label for="identifiant">Identifiant :</label>
            <input type="text" name="matricule" id="matricule">
            <br>
            <br>
            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" id="mdp">
            <br> <br>
            <button type="submit" name="btnConnexion" id="btnConnexion" class="buttonAll">Connexion</button>
        </form>
    </div>    
</body>
</html>