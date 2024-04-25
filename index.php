<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.1-web\css\all.min.css" />
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
    <div class="central-sectionFormConn">  
        <form action="redirection.php" class="formAccueil" method="post" id="formConnexion">
        <h1 class="central"> Se connecter :</h1>
        <table class="tableauFormConn">
            <tr>
                <th><label for="identifiant">Identifiant :</label></th>
                <td>
                    <div>
                        <input type="text" name="matricule" id="form1Login" class="inputConn">
                    </div>
                </td>
            </tr>
            <tr>
                <td><div id="form1LoginError"></td>
            </tr>
            <tr>
                <th><label for="mdp">Mot de passe:</label></th>
                <td>
                    <div class="mdp">
                        <input type="password" name="mdp" id="form1Mdp" class="inputConn">
                        <i class="fas fa-eye"></i>
                    </div>
                </td>
            </tr>
        </table>
        <div id="form1MdpError"></div>
        <br>
        <button type="submit" name="btnConnexion" id="btnConnexion" class="buttonAll">Connexion</button>
        </form>
        <!-- Partie affichage / cacher mot de passe en js -->
       
       <script>
            let input=document.querySelector('.mdp input');
            let showBtn = document.querySelector('.mdp i');
            showBtn.onclick=function(){
                if(input.type==="password"){
                    input.type = "text";
                    showBtn.classList.add('active');
                } else{
                    input.type ="password";
                    showBtn.classList.remove('active');
                }
            }
        </script>
    </div>
</body>
</html>