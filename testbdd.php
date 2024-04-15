<?php
        
        // Connexion à la base de donnée 
        $serverName="192.168.10.16";
        $dbName="guerin2_bryan_aventure";
        $username="guerin2_bryan";
        $password="Bs9IP91a";
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
            $conn=new PDO("mysql:host=$serverName;dbName=$dbName", $username,$password);
            echo "Connexion réussie";
            $mail=$_POST["matricule"];
            $mdp=$_POST["mdp"];
            $requete=$conn ->prepare("SELECT * FROM joueur WHERE loginJoueur = :matricule AND mdpJoueur=PASSWORD(:mdp);");
            // On lie la variable $email définie au-dessus au paramètre :mail de la requête préparée
            $requete->bindValue(':matricule',$mail , PDO::PARAM_STR);
            $requete->bindValue(':mdp',$mdp , PDO::PARAM_STR);
            //On exécute la requête
            $requete->execute();
            // On récupère le résultat
            if ($requete->fetch()) {
                echo 'Joueur Connecté';
            } else {
                echo 'Joueur Inconnu ou mot de passe incorrect';
            }
                
            //Fermeture de la connexion
            $conn=null;

        }
        catch(PDOException $e){
            echo "Erreur :" . $e ->getMessage();
            echo "Le numéro de l'erreur est : " . $e ->getCode();
            die;
        }
?>