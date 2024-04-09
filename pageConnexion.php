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
                <ul>
                        <li>
                            <a href="index.html" class="m-link"><i class="fa-solid fa-house"></i>Jean-Durand</a>
                            <ul>
                                <li>
                                    <a href="" class="lienMenu">Compte</a>
                                </li>
                                <li>
                                    <a href="" class="lienMenu">Déconnexion</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <h1 class="central">Bienvenue Jean-Durand(E431)</h1>
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
    
    <div class="central-section">
        <table>
        <tr>
            <th> <p>  </p></th>
            <th>Notes :</th>
            <th>État :</th>
            <th>Date :</th>
            <th>Coût Total :</th>
        </tr>
        <?php
            for($i=0;$i<50;$i++)
            {
                echo "<tr>";
                    echo "<td>";
                        echo "<div>";
                            echo "<img src='img/caseacocher.png' alt=''>";
                        echo "</div>";
                    echo "</td>";     
                    echo "<td>";
                        echo "<div>";
                            echo "<p>Note de frais de Jean-Dupont</p>";
                        echo "</div>";
                    echo "</td>"; 
                    echo "<td>";
                        echo "<div>";
                            echo "<p>En cours de validation Responsable</p>";
                        echo "</div>";
                    echo "</td>";
                    echo "<td>";
                        echo "<div>";
                            echo "<p>15/03/2024 </p>";
                        echo "</div>";
                    echo "</td>";
                    echo "<td>";
                        echo "<div>";
                            echo "<p>1000 €</p>";
                        echo "</div>";
                    echo "</td>";
                echo "</tr>";
            }
            
        ?>
        </table>
    </div>
</body>
</html>