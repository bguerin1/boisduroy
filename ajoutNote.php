<?php
    session_start();
    if(!isset($_SESSION["IDSESSION"]))
    {
        header("Location: connexion.php");
    }
    else{
        if($_SESSION["IDSESSION"] != session_id())
        {
            header("Location: connexion.php");
        }
        else{
            if(isset($_POST["btnAjout"]))
            {
                require("Model/infoBDD.php");
                try{
                    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                    $requete=$conn ->prepare("SELECT MATRICULE,MDPCOMPTE FROM EMPLOYE WHERE MATRICULE = :matricule AND MDPCOMPTE=PASSWORD(:mdp);");
                    // On lie la variable $email définie au-dessus au paramètre :mail de la requête préparée
                    $requete->bindValue(':matricule', $_SESSION["MATRICULE"] , PDO::PARAM_STR);
                    $requete->bindValue(':mdp',$_SESSION["MDP"] , PDO::PARAM_STR);
                    //On exécute la requête
                    $requete->execute();
                    // On récupère le résultat
                    if ($requete->fetch()) {
                        
                        // Insertion de la note de frais
                        $requete2 = $conn->prepare("INSERT INTO NOTEFRAIS(MATRICULE,DATENOTEFRAIS,LIBELLENOTEFRAIS) VALUES(:matricule,:dateNoteFrais,:libellenotefrais);");
                        $requete2 -> bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                        $requete2 -> bindValue(":dateNoteFrais",$_POST["DATENOTEFRAIS"],PDO::PARAM_STR);
                        $requete2 -> bindValue(":libellenotefrais","",PDO::PARAM_STR);
                        $requete2->execute();

                        $idNoteFrais = $conn -> lastInsertId();
    
                        // Insertion d'une ligne de note de frais

                        $requete2 = $conn->prepare("INSERT INTO LIGNENOTE VALUES(:idNoteFrais,1,:typeFrais,:quantite,:couttotal,:cout);");
                        $requete2 -> bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                        $requete2 -> bindValue(":typeFrais",$_POST["typeFrais"],PDO::PARAM_STR);
                        $requete2 -> bindValue(":quantite",$_POST["quantite"],PDO::PARAM_STR);
                        $requete2 -> bindValue(":couttotal",$_POST["coutTotal"],PDO::PARAM_STR);  
                        $requete2 -> bindValue(":cout",$_POST["cout"],PDO::PARAM_STR);
                        $requete2->execute();

                        // Insertion d'une étape de validation de la note de frais
                        
                        $requete2 = $conn->prepare("INSERT INTO ETAPE_VALIDATION(IDSTATUT,MATRICULE,RAISONREFUS,DATEVALID) VALUES(1,:matricule,0,NULL);");
                        $requete2 -> bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                        $requete2->execute();

                        $idEtapValid = $conn -> lastInsertId();

                        // Insertion dans la table VALIDER
                        
                        $requete2 = $conn->prepare("INSERT INTO VALIDER VALUES(:idEtapValid,:idNoteFrais);");
                        $requete2 -> bindValue(":idEtapValid",$idEtapValid,PDO::PARAM_STR);
                        $requete2 -> bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                        $requete2->execute();

                        
                    } else {
                        header("Location: index.php");
                        exit();
                    }
                    //Fermeture de la connexion
                    $conn=null;
                 }
                 catch(PDOException $e){
                     echo "Erreur :" . $e ->getMessage();
                     echo "Le numéro de l'erreur est : " . $e ->getCode();
                     die;
                 }
            }
        }
    }
            
?>
<?php
    require("View/AjoutNote/headerAjoutNote.php");
?>
    <br><br>
        <?php
            require("View/AjoutNote/formAjoutNote.php");
        ?>
    <br>
<?php
    require("View/Connexion/footerConnexion.php");
?>
