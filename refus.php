<?php
    require("Controler/verifSession.php");
?>
<?php
    require("View/AjoutNote/headerAjoutNote.php");
?>
<br><br>
<div class="divdivCentralRefus">
    <form action="redirectionRefus.php" method="post">
        <h1> Raison du refus de la note de frais :</h1>
        <div class="centralsectionRefus">
            <textarea name="textAreaRefus" id="" cols="10" rows="10" class="textareaRefus" placeholder="Ecrivez votre commentaire ici..."></textarea>
        </div>
        <br>
        <div class="btnRefus">
            <?php
            if(isset($_POST["idNoteFrais"]) && isset($_POST["btnRefuserNote"]))
            {
                $idNoteFrais = htmlspecialchars($_POST["idNoteFrais"]);
                if($idNoteFrais < 0 || $idNoteFrais =="")
                {
                    header("Location: connexion.php");
                }
                else{
                    echo "<input type='hidden' name='idNoteFraisRefus' value=$idNoteFrais>";
                }
            }
            else{
                header("Location: connexion.php");
            }
            ?>
            <button name="btnRefus" id="btnRefus" class="buttonAll">Confirmer le refus</button>
        </div>  
    </form>      
</div>
</body>
</html>
