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
            if(isset($_POST["btnCopie"]) && isset($_POST["idNoteFrais"]))
            {
                $idNoteFrais = htmlspecialchars($_POST["idNoteFrais"]);
                if($idNoteFrais == "" || $idNoteFrais == 0 || $idNoteFrais < 0)
                {
                    header("Location:index.php");
                }
                else{
                    require("Model/infoBDD.php");
                    
                    // DONNEE NOTEFRAIS 

                    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                    $requete7= $conn->prepare("SELECT DATENOTEFRAIS FROM NOTEFRAIS WHERE NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
                    $requete7 ->bindValue(":idNoteFrais",$_POST["idNoteFrais"],PDO::PARAM_STR);
                    $requete7->execute();
                    $data = $requete7 -> fetchALL(PDO::FETCH_ASSOC);
                   
                    // DONNEE LIGNENOTE

                    // FRAIS KILOMETRIQUES 
                    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                    $requeteFrais = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 1 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
                    $requeteFrais ->bindValue(":idNoteFrais",$_POST["idNoteFrais"],PDO::PARAM_STR);
                    $requeteFrais->execute();
                    $dataFrais = $requeteFrais -> fetchALL(PDO::FETCH_ASSOC);



                    // REPAS MIDI 
                    $requeteRepasMidi = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 2 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
                    $requeteRepasMidi ->bindValue(":idNoteFrais",$_POST["idNoteFrais"],PDO::PARAM_STR);
                    $requeteRepasMidi->execute();
                    $dataRepasMidi = $requeteRepasMidi -> fetchALL(PDO::FETCH_ASSOC);



                    // REPAS SOIR 
                    $requeteRepasSoir = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 3 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
                    $requeteRepasSoir ->bindValue(":idNoteFrais",$_POST["idNoteFrais"],PDO::PARAM_STR);
                    $requeteRepasSoir->execute();
                    $dataRepasSoir = $requeteRepasSoir -> fetchALL(PDO::FETCH_ASSOC);



                    // SOIR HORS PARIS 
                    $requeteHorsParis = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 4 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
                    $requeteHorsParis ->bindValue(":idNoteFrais",$_POST["idNoteFrais"],PDO::PARAM_STR);
                    $requeteHorsParis->execute();
                    $dataHorsParis = $requeteHorsParis -> fetchALL(PDO::FETCH_ASSOC);


                    // SOIR PARIS
                    $requeteSoirParis = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 5 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
                    $requeteSoirParis ->bindValue(":idNoteFrais",$_POST["idNoteFrais"],PDO::PARAM_STR);
                    $requeteSoirParis->execute();
                    $dataSoirParis = $requeteSoirParis -> fetchALL(PDO::FETCH_ASSOC);

                    foreach($data as $donnee)
                    {
                        $dateNoteFrais = $donnee["DATENOTEFRAIS"];
                    }

                    foreach($dataFrais as $donneeFrais)
                    {
                        $quantiteFrais = $donneeFrais["QUANTITE"];
                        $coutFrais = $donneeFrais["COUT"];
                    }

                    foreach($dataRepasMidi as $donneeRepasMidi)
                    {
                        $quantiteRepasMidi = $donneeRepasMidi["QUANTITE"];
                        $coutRepasMidi = $donneeRepasMidi["COUT"];
                    }
                
                    foreach($dataRepasSoir as $donneeRepasSoir)
                    {
                        $quantiteRepasSoir = $donneeRepasSoir["QUANTITE"];
                        $coutRepasSoir = $donneeRepasSoir["COUT"];
                    }
                
                    foreach($dataHorsParis as $donneeHorsParis)
                    {
                        $quantiteSoirHorsParis = $donneeHorsParis["QUANTITE"];
                        $coutHorsParis = $donneeHorsParis["COUT"];
                    }
                    foreach($dataSoirParis as $donneeSoirParis)
                    {
                        $quantiteSoirParis = $donneeSoirParis["QUANTITE"];
                        $coutSoirParis = $donneeSoirParis["COUT"];
                    }
                }
            }
            // VERIF PARAM OBLIGATOIRE A FAIRE !!!!!

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
                        
                        // Choisir le type de frais 

                        $quantiteFrais = htmlspecialchars($_POST["quantiteFraisKM"]);
                        $quantiteRepasMidi = htmlspecialchars($_POST["quantiteRepasMidi"]);
                        $quantiteRepasSoir = htmlspecialchars($_POST["quantiteRepasSoir"]);
                        $quantiteSoirHorsParis = htmlspecialchars($_POST["quantiteSoirParis"]);
                        $quantiteSoirParis = htmlspecialchars($_POST["quantiteSoirParis"]);

                        $coutFrais = $quantiteFrais * 0.5;
                        $coutRepasMidi = $quantiteRepasMidi * 15;
                        $coutRepasSoir = $quantiteRepasSoir * 25;
                        $coutSoirHorsParis = $quantiteSoirHorsParis * 80;
                        $coutSoirParis = $quantiteSoirParis * 120;

                        $coutTotal = $coutFrais + $coutRepasMidi + $coutRepasSoir + $coutSoirHorsParis + $coutSoirParis;

                        // Insertion de la note de frais
                        $requete2 = $conn->prepare("INSERT INTO NOTEFRAIS(MATRICULE,DATENOTEFRAIS,LIBELLENOTEFRAIS,COUTTOTAL) VALUES(:matricule,:dateNoteFrais,:libellenotefrais,:coutTotal);");
                        $requete2 -> bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                        $requete2 -> bindValue(":dateNoteFrais",$_POST["DATENOTEFRAIS"],PDO::PARAM_STR);
                        $requete2 -> bindValue(":libellenotefrais","",PDO::PARAM_STR);
                        $requete2 -> bindValue(":coutTotal",$coutTotal,PDO::PARAM_STR);
                        $requete2->execute();

                        $idNoteFrais = $conn -> lastInsertId();
                        

                        // Insertion d'une ligne de note de frais

                        $requete2 = $conn->prepare("INSERT INTO LIGNENOTE VALUES(:idNoteFrais,1,1,:quantite,:coutTotal);");
                        $requete2 -> bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                        $requete2 -> bindValue(":quantite",$quantiteFrais,PDO::PARAM_STR);
                        $requete2 -> bindValue(":coutTotal",$coutFrais,PDO::PARAM_STR);
                        
                        $requete2->execute();

                        $requete2 = $conn->prepare("INSERT INTO LIGNENOTE VALUES(:idNoteFrais,2,2,:quantite,:coutTotal);");
                        $requete2 -> bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                        $requete2 -> bindValue(":quantite",$quantiteRepasMidi,PDO::PARAM_STR);
                        $requete2 -> bindValue(":coutTotal",$coutRepasMidi,PDO::PARAM_STR);
                        
                        $requete2->execute();

                        $requete2 = $conn->prepare("INSERT INTO LIGNENOTE VALUES(:idNoteFrais,3,3,:quantite,:coutTotal);");
                        $requete2 -> bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                        $requete2 -> bindValue(":quantite",$quantiteRepasSoir,PDO::PARAM_STR);
                        $requete2 -> bindValue(":coutTotal",$coutRepasSoir,PDO::PARAM_STR);
                        
                        $requete2->execute();

                        $requete2 = $conn->prepare("INSERT INTO LIGNENOTE VALUES(:idNoteFrais,4,4,:quantite,:coutTotal);");
                        $requete2 -> bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                        $requete2 -> bindValue(":quantite",$quantiteSoirHorsParis,PDO::PARAM_STR);
                        $requete2 -> bindValue(":coutTotal",$coutSoirHorsParis,PDO::PARAM_STR);
                        
                        $requete2->execute();

                        $requete2 = $conn->prepare("INSERT INTO LIGNENOTE VALUES(:idNoteFrais,5,5,:quantite,:coutTotal);");
                        $requete2 -> bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                        $requete2 -> bindValue(":quantite",$quantiteSoirParis,PDO::PARAM_STR);
                        $requete2 -> bindValue(":coutTotal",$coutSoirParis,PDO::PARAM_STR);
                        
                        $requete2->execute();

                        // Insertion d'une étape de validation de la note de frais
                        
                        $requete2 = $conn->prepare("INSERT INTO ETAPE_VALIDATION(IDSTATUT,MATRICULE,RAISONREFUS,DATEVALID) VALUES(1,:matricule,NULL,NULL);");
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
