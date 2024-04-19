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
                    <h1 class="logo">Bois Du Roy</h1>
                </div>
                <div class="m-left2">
                    <a href="pageConnexion.php"> <img src="img/arbre.png" alt="" class="imageLogo"></a>
                </div>

                <div class="m-right">
                    <div class="dropdown">
                        <button class="mainmenubtn"> <?= $donnee['PRENOM'] . " " .$donnee['NOM'] ?> </button>
                        <div class="dropdown-child">
                            <a href="informationCompte.php">Compte</a>
                            <a href="index.php">Déconnexion</a>
                        </div>
                    </div>             
                </div>
            </div>
        </nav>
    </header>
    <br>
    <div class="central-section">
        <h1 class="central">Saisie des notes de frais :</h1>
        <form action="" method="post">
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
                </div>
                <div>
                    <label for="typeFrais">Quantité</label>
                </div>
                <div>
                    <label for="coutNoteFrais">Coûts</label>
                    <br><br>
                </div>
            </div>
            <div class="wrapper">
                <div>
                    
                </div> 
                <div>
                    <select name="typeFrais" id="typefrais" required>
                        <option value="1">Frais Kilométriques</option>
                        <option value="2">Repas midi</option>
                        <option value="3">Repas soir</option>
                        <option value="4">Soir hors Paris</option>
                        <option value="5">Soir Paris</option>
                    </select>
                </div>
                <div>
                    <input type="number" name="quantite" id="quantite" required>
                    <br>
                </div>
                <div>
                    <input type="text" name="coutNoteFrais" id="coutNoteFrais" required>
                </div>
            </div>
            <?php
                if(isset($_POST["AjoutLigne"]))
                {
                    echo "<div class='wrapper'>";
                        echo "<div>";
                        
                        echo "</div>"; 
                    
                        echo "<div>";
                            echo "<select name='typeFrais' id='typefrais' required>";
                                echo "<option value='1'>Frais Kilométriques</option>";                            
                                echo "<option value='2'>Repas midi</option>";
                                echo "<option value='3'>Repas soir</option>";
                                echo "<option value='4'>Soir hors Paris</option>";
                                echo "<option value='5'>Soir Paris</option>";
                            echo "</select>";
                        echo "</div>";
                        echo "<div>";
                            echo "<input type='number' name='quantite' id='quantite' required>";
                            echo "<br>";
                        echo "</div>";
                        echo "<div>";
                            echo "<input type='text' name='coutNoteFrais' id='coutNoteFrais' required>";
                        echo "</div>";
                    echo "</div>";
                    echo "<br>";
                }
            ?>
        </form>
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
    </div>
</body>
</html>