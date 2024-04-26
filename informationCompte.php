<?php
    require("Controler/verifSession.php");
?>
<?php
    require("View/AjoutNote/headerAjoutNote.php");
?>
    <br>
    <div class="divdivCentralRefus">
        <h1>Informations du compte :</h1>
        <div class="central-sectionInfoCompte">
            <?php
                require("View/Information/tableauInfo.php");
            ?>
        </div>
    </div>
</body>
</html>
