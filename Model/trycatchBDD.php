<?php
    try{
        $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
        $requete=$conn ->prepare("SELECT MATRICULE, MDPCOMPTE FROM EMPLOYE WHERE MATRICULE = :matricule AND MDPCOMPTE=:mdp;");
        // On lie la variable $email définie au-dessus au paramètre :mail de la requête préparée
        $requete->bindValue(':matricule', $_SESSION["MATRICULE"] , PDO::PARAM_STR);
        $requete->bindValue(':mdp',$_SESSION["MDP"] , PDO::PARAM_STR);
        //On exécute la requête
        $requete->execute();
        // On récupère le résultat
        if ($requete->fetch()) {
            // Cas de première connexion 
            $requete1erConn = $conn ->prepare("SELECT PREMIERECONNEXION FROM EMPLOYE WHERE MATRICULE = :matricule AND MDPCOMPTE=:mdp;");
            $requete1erConn->bindValue(':matricule', $_SESSION["MATRICULE"] , PDO::PARAM_STR);
            $requete1erConn->bindValue(':mdp',$_SESSION["MDP"] , PDO::PARAM_STR);
            $requete1erConn->execute();
            $dataRequete = $requete1erConn -> fetch();
            $_SESSION["PREMIERECONNEXION"] = $dataRequete["PREMIERECONNEXION"];
            if($dataRequete["PREMIERECONNEXION"] == 1){
                header("Location: connexion1.php");
            }

            // Vérification du nombre de notes de frais 
            $requete4 = $conn->prepare("SELECT COUNT(IDNOTEFRAIS) AS NBNOTE FROM NOTEFRAIS WHERE MATRICULE=:matricule;");
            $requete4 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
            $requete4->execute();
            $data = $requete4 -> fetch();
            $requete4->closeCursor();
            $_SESSION["NBNOTE"] = $data;

            if($_SESSION["NBNOTE"] == 0)
            {
                echo "kfdgljk,ng";
            }
            else{
                // SELECT DES INFOS LIES A LA NOTE DE FRAIS 
                $requete2 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS AS IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, PRENOM, NOM, COUTTOTAL, NOTEFRAIS.MATRICULE FROM NOTEFRAIS JOIN EMPLOYE ON EMPLOYE.MATRICULE = NOTEFRAIS.MATRICULE JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE = :matricule;");
                $requete2 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                $requete2->execute();
                $data = $requete2->fetchALL(PDO::FETCH_ASSOC);      
                $requete2->closeCursor();

                // SELECT EMPLOYE 

                $requete7 = $conn->prepare("SELECT MATRICULE, MATRICULE_ETRE_RESPONSABLE, NOM, PRENOM, DATENAISS, ADMINI FROM EMPLOYE WHERE MATRICULE = :matricule;");
                $requete7 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                $requete7->execute();
                $data2 = $requete7->fetchALL(PDO::FETCH_ASSOC);
            }
        } else {
            header("Location: connexion.php");
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
?>