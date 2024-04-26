<?php
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
            $requete2 = $conn->prepare("SELECT IDNOTEFRAIS, PRENOM, NOM, EMPLOYE.MATRICULE, DATEVALID, NOMSTATUT, DATENAISS, MATRICULE_ETRE_RESPONSABLE FROM NOTEFRAIS JOIN EMPLOYE ON EMPLOYE.MATRICULE = NOTEFRAIS.MATRICULE JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.MATRICULE = EMPLOYE.MATRICULE JOIN STATUT ON ETAPE_VALIDATION.IDSTATUT = STATUT.IDSTATUT WHERE EMPLOYE.MATRICULE = :matricule AND MDPCOMPTE=PASSWORD(:mdp);");
            $requete2 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
            $requete2 ->bindValue(":mdp",$_SESSION["MDP"],PDO::PARAM_STR);
            $requete2->execute();
            $data = $requete2->fetchALL(PDO::FETCH_ASSOC);
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
?>