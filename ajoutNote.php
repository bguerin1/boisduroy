<?php

?>
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
                    <a href="index.php"> <img src="img/arbre.png" alt=""></a>
                </div>

                <div class="m-right">
                    <a href="pageConnexion.php" class="m-link"><i class="fa-solid fa-house"></i>NDF Employé</a>
                    <a href="" class="m-link"><i class="fa-solid fa-newspaper"></i> Liste des employés</a>
                    <a href="" class="m-link"><i class="fa-solid fa-music"></i>Liste des produits</a>
                    <ul>
                        <li>
                            <a href="">Articles</a>
                            <ul class="sous-menu">
                                <li>
                                    <a href="../index.php">Compte</a>
                                </li>
                                <li>
                                    <a href="">Déconnexion</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <br>
    <div class="central-section">
        <h1 class="central">Saisie des notes de frais :</h1>
        <form action="pageConnexion.php" method="post">
            <label for="date">Date :</label>
            <input type="Date" name="date" id="date" required>
            <br><br>
            <label for="employé">Employé :</label>
            <input type="text" name="employé" id="employé" required>
            <h2> Liste des frais à rembourser : </h2>
            <div class="wrapper">
                <div>
                    <button name="AjoutLigne" class="ajoutLigne"> <img src="img/PLUS copy.png" alt=""> </button>
                </div> 
                <div>
                    <label for="typeFrais">Type de frais</label>
                    <br><br>
                    <select name="typeFrais" id="typefrais" required>
                        <option value="1">Frais Kilométriques</option>
                        <option value="2">Repas midi</option>
                        <option value="3">Repas soir</option>
                        <option value="4">Soir hors Paris</option>
                        <option value="5">Soir Paris</option>
                    </select>
                </div>
                <div>
                    <label for="typeFrais">Quantité</label>
                    <br><br>
                    <input type="number" name="quantite" id="quantite" required>
                    <br>
                </div>
                <div>
                    <label for="coutNoteFrais">Coûts</label>
                    <br><br>
                    <input type="text" name="coutNoteFrais" id="coutNoteFrais" required>
                </div>
            </div>
            <br>
            <div class="wrapperajoutNote">
                <div>
                    <label for="coutTotal">Coût Total : </label><input type="number" name="coutTotal" id="coutTotal">
                </div>
                <div>
                    <button name="btnConnexion" id="btnConnexion" class="buttonAll"> <a href="pageConnexion.php">Annuler</a></button>
                </div>
                <div>
                    <button type="submit" name="btnConnexion" id="btnConnexion" class="buttonAll">Envoyer la fiche</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>