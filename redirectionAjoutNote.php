<?php
    require("Controler/verifSession.php");
    if(isset($_POST["btnAjout"]) || isset($_POST["quantiteFraisKM"]) || isset($_POST["quantiteRepasMidi"]) || isset($_POST["quantiteRepasSoir"]) || isset($_POST["quantiteSoirHorsParis"]) || isset($_POST["quantiteSoirParis"]) || isset($_POST["DATENOTEFRAIS"]) || isset($_POST["employé"]))
    {
        // Choisir le type de frais 

        $quantiteFrais = htmlspecialchars($_POST["quantiteFraisKM"]);
        $quantiteRepasMidi = htmlspecialchars($_POST["quantiteRepasMidi"]);
        $quantiteRepasSoir = htmlspecialchars($_POST["quantiteRepasSoir"]);
        $quantiteSoirHorsParis = htmlspecialchars($_POST["quantiteSoirHorsParis"]);
        $quantiteSoirParis = htmlspecialchars($_POST["quantiteSoirParis"]);
        $dateNoteFrais = htmlspecialchars($_POST["DATENOTEFRAIS"]);
        $employe = htmlspecialchars($_POST["employé"]);

        if($quantiteFrais == "")
        {
            echo "La quantité de frais kilométriques est vide !";
        }
        else if($quantiteRepasMidi == "")
        {
            echo "La quantité de repas du midi est vide";
        }
        else if($quantiteRepasSoir == "")
        {
            echo "La quantité de repas du soir est vide";
        }
        else if($quantiteSoirHorsParis == "")
        {
            echo "La quantité de soir hors Paris est vide";
        }
        else if($quantiteSoirParis == "")
        {
            echo "La quantité de soir Paris est vide !";
        }
        else if($dateNoteFrais == "")
        {
            echo "La date de la note de frais est vide !";
        }
        else if($employe == "")
        {
            echo "Le matricule de l'employé est vide !";
        }
        else{
            $coutFrais = $quantiteFrais * 0.5;
            $coutRepasMidi = $quantiteRepasMidi * 15;
            $coutRepasSoir = $quantiteRepasSoir * 25;
            $coutSoirHorsParis = $quantiteSoirHorsParis * 80;
            $coutSoirParis = $quantiteSoirParis * 120;
    
            $coutTotal = $coutFrais + $coutRepasMidi + $coutRepasSoir + $coutSoirHorsParis + $coutSoirParis;
    
            require("Model/infoBDD.php");
            $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
    
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
    
            header("Location: index.php");
    
            $conn = null;
        }
    }
    else{
        echo "Un ou plusieurs paramètres sont vides !";
    }