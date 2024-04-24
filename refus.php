<?php
    session_start();
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
                        <button class="mainmenubtn">Jeremy</button>
                        <div class="dropdown-child">
                            <a href="informationCompte.php">Compte</a>
                            <a href="deconnexion.php">Déconnexion</a>
                        </div>
                    </div>             
                </div>
            </div>
        </nav>
    </header>
    <br><br>
    <div class="divdivCentralRefus">
        <h1> Raison du refus de la note de frais :</h1>
        <div class="centralsectionRefus">
            <textarea name="" id="" cols="10" rows="10" class="textareaRefus" placeholder="Ecrivez votre commentaire ici..."></textarea>
        </div>
        <br>
        <div class="btnRefus">
            <button name="btnRefus" id="btnRefus" class="buttonAll">Confirmer le refus</button>
        </div>        
    </div>
</body>
</html>