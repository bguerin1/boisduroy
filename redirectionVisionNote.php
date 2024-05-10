<?php
    require("Controler/verifSession.php");
    if(isset($_POST["btnAnnuler"]) && isset($_POST["idNoteFrais"]))
    {
        $idNoteFrais = htmlspecialchars($_POST["idNoteFrais"]);

        if($idNoteFrais == 0 || $idNoteFrais < 0 || $idNoteFrais == "")
        {
            header("Location: connexion.php");
        }
        else{
            require("Model/infoBDD.php");
            $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                    
            // SUPPRESSION DANS LA TABLE LIGNENOTE 
    
            $requete5 = $conn->prepare("DELETE FROM LIGNENOTE WHERE IDNOTEFRAIS=:idNoteFrais;");
            $requete5 ->bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
            $requete5->execute();
    
            // SUPPRESSION DANS LA TABLE ETAPE_VALIDATION
            $requete7 = $conn->prepare("DELETE FROM ETAPE_VALIDATION WHERE IDETAPVALID IN (SELECT IDETAPVALID FROM VALIDER WHERE IDNOTEFRAIS = :idNoteFrais);");
            $requete7 ->bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
            $requete7->execute();
    
            // SUPPRESSION DE LA NOTE DE FRAIS
    
            $requete4 = $conn->prepare("DELETE FROM NOTEFRAIS WHERE IDNOTEFRAIS=:idNoteFrais;");
            $requete4 ->bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
            $requete4->execute();
    
            header("Location: index.php");
        }

    }   
    else{
        header("Location: connexion.php");
    }
?>