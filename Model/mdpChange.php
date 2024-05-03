<?php
    if($_SESSION["PREMIERECONNEXION"]!=1)
    {
        header("Location: connexion.php");
    }
    else{
        if(isset($_POST["1erConnexionMdp"])){
            require("infoBDD.php");
            $mdpChange = htmlspecialchars($_POST["1erConnexionMdp"]);
            // function mdp à mettre pour vérification du paramètre
            
            // UPDATE MDP ET BOOLEEN PREMIERECONNEXION
    
            $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
            $requeteMdpChange = $conn->prepare("UPDATE EMPLOYE SET MDPCOMPTE=PASSWORD(:mdp), PREMIERECONNEXION =:premiereConnexion WHERE MATRICULE = :matricule;");
            $requeteMdpChange ->bindValue(":mdp",$mdpChange,PDO::PARAM_STR);
            $requeteMdpChange ->bindValue(":premiereConnexion",0,PDO::PARAM_STR);
            $requeteMdpChange ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
            $requeteMdpChange->execute();
            header("Location: connexion.php");
        }
    }
   
?>