<?php
    require("Controler/verifSession.php");
    if(isset($_POST["btnValiderNote"]) && isset($_POST["idNoteFrais"]))
    {
        $idNoteFrais = htmlspecialchars($_POST["idNoteFrais"]);

        if($idNoteFrais == 0 || $idNoteFrais < 0 || $idNoteFrais == "")
        {
            header("Location: connexion.php");
            exit();
        }
        else{
            require("Model/infoBDD.php");
            $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                                    
            $requete3 = $conn->prepare("UPDATE ETAPE_VALIDATION JOIN VALIDER ON VALIDER.IDETAPVALID = ETAPE_VALIDATION.IDETAPVALID SET IDSTATUT=4, DATEVALID=CURRENT_DATE() WHERE IDNOTEFRAIS=:idNoteFrais;");
            $requete3 ->bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
            $requete3->execute();
            
    
            header("Location: index.php");
        }

    }   
    else{
        header("Location: connexion.php");
    }
?>