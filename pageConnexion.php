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
                    <h1 class="logo">Bois Du Roy </h1>
                </div>

                <div class="m-right">
                    <a href="index.html" class="m-link"><i class="fa-solid fa-house"></i>NDF Employé</a>
                    <a href="article.html" class="m-link"><i class="fa-solid fa-newspaper"></i> Liste des employés</a>
                    <a href="C:\Users\jeanp\Desktop\KPOP\groupe.html" class="m-link"><i class="fa-solid fa-music"></i>Liste des produits</a>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="wrapperBoutonListe">
        <div>
            <button class="buttonAll"> <a href="ajoutNote.php">+ Ajouter une fiche</a> </button>
        </div>
        <div>
            <button class="buttonAll"> <a href="ajoutNote.php"> Copier </a></button>
        </div>
        <div> 
            <select name="listeDeroulante" id="listeDeroulante">
                <option value="">Tri des notes ...</option>
                <option value="1">Date</option>
                <option value="2">Coût Total</option>
                <option value="3">État</option>
            </select>
        </div>
        <div>
            <button class="buttonListe"> <img src="img/loupe.png" alt="loupe"></button>
        </div>
    </div>
    
    <div class="central-section" class="wrapper">

    </div>
</body>
</html>