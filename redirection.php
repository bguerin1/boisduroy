<?php
    session_start();
    $id_Session=session_id();
    if (!isset($_POST["matricule"]) || !isset($_POST["mdp"]) || !isset($id_Session)) {
        echo "Le matricule, le mot de passe ou l'id de session sont vides !";
        usleep(2);
        header("Location: index.php");
        exit();
    }
    else{
        $_SESSION["IDSESSION"]=$id_Session;
        $matricule=htmlspecialchars($_POST["matricule"]);
        $mdp=htmlspecialchars($_POST["mdp"]);
        if($matricule=="")
        {
            echo "L'adresse mail est vide";
            usleep(2);
            header("Location: index.php");
            exit();
        }
        else if($mdp=="")
        {
            echo "Le mot de passe est vide";
            usleep(2);
            header("Location: index.php");
            exit();
        }
        else{
            $_SESSION["IDSESSION"]=$id_Session;
            $_SESSION["MATRICULE"] = $matricule;
            $_SESSION["MDP"] = $mdp;
            header("Location: pageConnexion.php");
        }
    }
?>