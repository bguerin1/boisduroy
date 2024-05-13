<?php
    if($_SESSION["PREMIERECONNEXION"]!=1)
    {
        header("Location: connexion.php");
    }
    else{
        if(isset($_POST["1erConnexionMdp"])){
            $mdpChange = htmlspecialchars($_POST["1erConnexionMdp"]);
            if($mdpChange == "")
            {
                echo "Mot de passe vide !";
            }
            else{
                // UPDATE MDP ET BOOLEEN PREMIERECONNEXION
                require("infoBDD.php");
                $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                $requeteMdpChange = $conn->prepare("UPDATE EMPLOYE SET MDPCOMPTE=:mdp, PREMIERECONNEXION =:premiereConnexion WHERE MATRICULE = :matricule;");
                $requeteMdpChange ->bindValue(":mdp",$mdpChange,PDO::PARAM_STR);
                $requeteMdpChange ->bindValue(":premiereConnexion",0,PDO::PARAM_STR);
                $requeteMdpChange ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                $requeteMdpChange->execute();
                header("Location: connexion.php");
            }
        }
    }
   
?>