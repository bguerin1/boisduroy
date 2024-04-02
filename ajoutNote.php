<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Bois Du Roy</title>
</head>
<body>
    <header>
        <nav class="menu" role="navigation">
           
            <div class="inner">
                <div class="m-left">

                    <h1 class="logo">Bois Du Roy </h1>
    
                </div>
                <div class="m-right">
                    <a href="index.html" class="m-link"><i class="fa-solid fa-house"></i>     Accueil</a>
                    <a href="article.html" class="m-link"><i class="fa-solid fa-newspaper"></i> Actualités</a>
                    <a href="C:\Users\jeanp\Desktop\KPOP\groupe.html" class="m-link"><i class="fa-solid fa-music"></i> Groupes</a>
                    <a href="jeu.php" class="m-link"><i class="fa-solid fa-newspaper"></i> Jeu</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="central-section">
        <h1 class="central"> Formulaire de saisie des notes de frais :</h1>
        <form action="pageConnexion.php" class="formAccueil" method="post">
            <label for="date">Date :</label>
            <input type="Date" name="date" id="date" required>
            <br><br>
            <label for="employé">Employé :</label>
            <input type="text" name="employé" id="employé" required>
            <h2> Liste des frais à rembourser : </h2>
            <label for="typeFrais">Type de frais</label>
            <br>
            <select name="typeFrais" id="typefrais" required>
                <option value="1">Frais Kilométriques</option>
                <option value="2">Repas</option>
                <option value="3">vff</option>
                <option value="4">qef</option>
            </select>
            <br>
            <label for="typeFrais">Quantité</label>
            <br>
            <input type="number" name="quantite" id="quantite" required>
            <br>
            <label for="coutNoteFrais">Coûts</label>
            <br>
            <input type="text" name="coutNoteFrais" id="coutNoteFrais" required>
            <br><br>
            <button type="submit" name="btnConnexion" id="btnConnexion" class="buttonAjoutFiche"></button>
            <button type="submit" name="btnConnexion" id="btnConnexion">Envoyer la fiche</button>
        </form>
    </div>
</body>
</html>