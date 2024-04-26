<?php
    require("Controler/verifSession.php");
?>
<?php
    require("View/Connexion/headerConnexion.php");
?>
<br><br><br>
<h1 class="central">Bienvenue Jean-Dupont !</h1>
<p class="central"> Pour votre première connexion, veuillez changer votre mot de passe : </p> 
<div class="central-sectionFormPremsConn">
    <?php
        require("View/Connexion1/formConnexion1.php");
    ?>
</div>
<?php
    require("View/Connexion/footerConnexion.php");
?>