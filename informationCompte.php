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
                    <div class="dropdown">
                        <button class="mainmenubtn">Jean-Durand</button>
                        <div class="dropdown-child">
                            <a href="informationCompte.php">Compte</a>
                            <a href="index.php">Déconnexion</a>
                        </div>
                    </div>             
                </div>
            </div>
        </nav>
    </header>
    
    <h1 class="central">Informations du compte :</h1>
    
    <div class="central-section">
        <table>
        <tr>
            <th>Prénom :</th>
            <td><input type="text" value="Jean" readonly></td>
        </tr>
        <tr>
            <th>Nom :</th>
            <td><input type="text" value="Dupont" readonly></td>
        </tr>
        <tr>
            <th>Matricule</th>
            <td><input type="text" value="E431" readonly></td>
        </tr>
        <tr>
            <th>Date Naiss :</th>
            <td><input type="text" value="19/06/2024" readonly></td>
        </tr>
        <tr>
            <th>Responsable :</th>
            <td><input type="text" value="E435" readonly></td>
        </tr>

        
        </table>
    </div>
</body>
</html>