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
                    </div>
                    <div class="m-left2">
                        <a href="index.php"> <img src="img/arbre.png" alt="" class="imageLogo"></a>
                    </div>
                </div>     
        </nav>
    </header>

    <div class="central-section">
        <h1 class="central">Bienvenue Jean-Dupont</h1>
        <p class="central"> Pour votre première connexion, veuillez changer votre mot de passe : </p> 
        <form action="pageConnexion.php" class="formAccueil">
            <label for="mdp">Nouveau Mot de Passe :</label>
            <input type="password" name="password" id="password">
            <br>
            <br>
            <label for="mdp">Confirmation Mot de passe:</label>
            <input type="password" name="mdp" id="mdp">
            <br> <br>
            <button type="submit" name="btnConnexion" id="btnConnexion" class="buttonAll">Modifier</button>
        </form>
    </div>
</body>
</html>