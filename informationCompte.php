<?php
    session_start();
    if(!isset($_SESSION["IDSESSION"]))
    {
        header("Location: index.php");
    }
    else{
        if($_SESSION["IDSESSION"] != session_id())
        {
            header("Location: index.php");
        }
    }
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
                        <button class="mainmenubtn"><?= $_SESSION["PRENOM"] . " " .$_SESSION["NOM"] ?></button>
                        <div class="dropdown-child">
                            <a href="informationCompte.php">Compte</a>
                            <a href="deconnexion.php">Déconnexion</a>
                        </div>
                    </div>             
                </div>
            </div>
        </nav>
    </header>
    <br>
    <div class="divdivCentralRefus">
        <h1>Informations du compte :</h1>
        <div class="central-sectionInfoCompte">
            <table class="tableauInformation">
                <tr>
                    <th>Prénom :</th>
                    <td>
                        <div>
                            <input type="text" value=<?= $_SESSION["PRENOM"] ?> class="inputSaisie" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Nom :</th>
                    <td> 
                        <input type="text" value=<?=  $_SESSION["NOM"] ?> class="inputSaisie" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Matricule</th>
                    <td>
                        <div>
                            <input type="text" value=<?=$_SESSION["MATRICULEEMPLOYE"]?> class="inputSaisie" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Date Naiss :</th>
                    <td>
                        <div>
                            <input type="text" value=<?=  $_SESSION["DATENAISS"] ?> class="inputSaisie" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Responsable :</th>
                    <td>
                        <div>
                            <input type="text" value=<?=  $_SESSION["RESPONSABLE"] ?> class="inputSaisie" readonly>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
