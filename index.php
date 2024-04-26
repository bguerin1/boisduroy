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
            require("Model/infoBDD.php");
            require("Model/trycatchBDD.php");
        }
    }
?>
<?php
    require("Model/infoRequeteBDD.php");
?>
<?php
    require("View/Index/headerIndex.php");
?>
<br>
<h1 class='central'>Bienvenue <?= $donnee['PRENOM'] . " " . $donnee['NOM'] . " " . "(" . $donnee['MATRICULE'] . ")" ?> !</h1>
<?php
    require("View/Index/boutonIndex.php");
?>
<?php
    require("View/Index/affichageRequete.php");
?>
<?php
    require("View/Connexion/footerConnexion.php");
?>