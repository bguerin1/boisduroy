<?php
    require("Controler/verifSession.php");
    if(isset($_POST["textAreaRefus"]) && isset($_POST["idNoteFraisRefus"]))
    {
        $raisonRefus = htmlspecialchars($_POST["textAreaRefus"]);
        $idNoteFraisRefus = htmlspecialchars($_POST["idNoteFraisRefus"]);

        if($idNoteFraisRefus == "" || $idNoteFraisRefus == 0 || $idNoteFraisRefus <0)
        {
            header("Location: connexion.php");
            exit();
        }
        else if($raisonRefus == ""){
            echo "La raison du refus de la note de frais est vide !";
        }
        else{
            require("Model/infoBDD.php");
            $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
            $requete3 = $conn->prepare("UPDATE ETAPE_VALIDATION JOIN VALIDER ON VALIDER.IDETAPVALID = ETAPE_VALIDATION.IDETAPVALID SET IDSTATUT=3, RAISONREFUS=:raisonRefus,MATRICULE_REFUS=:matriculeRefus WHERE IDNOTEFRAIS=:idNoteFrais;");
            $requete3 ->bindValue(":raisonRefus",$raisonRefus,PDO::PARAM_STR);
            $requete3 ->bindValue(":idNoteFrais",$idNoteFraisRefus,PDO::PARAM_STR);
            $requete3 ->bindValue(":matriculeRefus",$_SESSION["MATRICULE"],PDO::PARAM_STR);
            $requete3->execute();
            header("Location: index.php");
        }
    }  
    else{
        header("Location: connexion.php");
    }
?>