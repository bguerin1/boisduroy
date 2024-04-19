<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
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
    <br><br><br><br>
    <div class="central-section">
        <h1 class="central"> Se connecter :</h1>
        <form action="pageConnexion.php" class="formAccueil" method="post" id="formConnexion">
            <label for="identifiant">Identifiant :</label>
            <input type="text" name="matricule" id="form1Login">
            <br>
            <br>
            <div id="form1LoginError"></div>
            <br>
            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" id="form1Mdp">
            <br>
            <br>
            <div id="form1MdpError"></div>
            <br><br>
            <button type="submit" name="btnConnexion" id="btnConnexion" class="buttonAll">Connexion</button>
        </form>
    </div>    
</body>
</html>