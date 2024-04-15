
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

            // Connexion à la base de donnée 
            $servername="localhost";
            $dbname="ap1";
            $username="root";
            $password="";
            try{
                /*
                if (!isset($_POST["mail"]) || !isset($_POST["mdp"])) {
                    header("Location: index.html");
                }
                else {
                    $indexjoueur = array_search($_POST["mail"], $joueur);
                    if ($indexjoueur !== false) {
                        if ($motDePasse[$indexjoueur] == $_POST["mdp"]) {
                            echo "personnages du joueur : <br>";
                            foreach ($persoJoueur[$indexjoueur] as $perso ) {
                                echo "nom du personnage : " . $perso . "<br>";
                                foreach ($personnage[$perso] as $carac => $value ) {
                                    echo $carac . " : " . $value . "<br>";
                                }
                                echo "<a href='jeu.php?perso=" . $perso ."'>Jouer avec ce personnage</a><br>";
                            }
                        } else {
                            echo "mot de passe incorrect<br>";
                        }
                    } else {
                        echo "adresse mail incorrect";
                    }
                }
                */
                $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
                /*$mail=$_POST["mail"];
                $mdp=$_POST["mdp"];
                */
                $requete=$conn ->prepare("SELECT CONCAT(PRENOM,' ',NOM) AS NOM FROM notefrais JOIN employe ON notefrais.MATRICULE = employe.MATRICULE;");
                // On lie la variable $email définie au-dessus au paramètre :mail de la requête préparée
                /*$requete->bindValue(':mail',$mail , PDO::PARAM_STR);
                $requete->bindValue(':pwd',$pwd , PDO::PARAM_STR);*/
                //On exécute la requête
                $requete->execute();
                // On récupère le résultat
               $data= $requete -> fetch();
                echo $data["NOM"];
                    
                //Fermeture de la connexion
                $conn=null;

            }
            catch(PDOException $e){
                echo "Erreur :" . $e ->getMessage();
                echo "Le numéro de l'erreur est : " . $e ->getCode();
                die;
            }

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