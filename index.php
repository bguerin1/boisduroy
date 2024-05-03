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
<?php
    if($_SESSION["NBNOTE"] !=0)
    {
        echo "<h1 class='central'>Bienvenue" . " " . $_SESSION['PRENOM'] . " " . $_SESSION['NOM'] . " " . "(" . $_SESSION['MATRICULE'] . ")" . "! </h1>";    
    }
    else{
        echo "<h1 class='central'>Bienvenue !</h1>";
    }
?>
<?php
    require("View/Index/boutonIndex.php");
?>
<?php
    require("View/Index/affichageRequete.php");
?>
<?php
    require("View/Connexion/footerConnexion.php");
?>