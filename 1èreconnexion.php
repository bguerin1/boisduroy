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
                    <h1 class="logo">Bois Du Roy </h1> 
                    <a href="index.php"> <img src="img/arbre.png" alt=""></a>
                </div>      
                <!-- 
                <div class="m-right">
    
                    <a href="index.html" class="m-link"><i class="fa-solid fa-house"></i>     Accueil</a>
                    <a href="article.html" class="m-link"><i class="fa-solid fa-newspaper"></i> Actualités</a>
                    <a href="C:\Users\jeanp\Desktop\KPOP\groupe.html" class="m-link"><i class="fa-solid fa-music"></i> Groupes</a>
                    <a href="jeu.php" class="m-link"><i class="fa-solid fa-newspaper"></i> Jeu</a>
    
                </div>
                --> 
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