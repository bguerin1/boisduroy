<?php
    require("Controler/verifSession.php");
?>
<?php
    require("View/AjoutNote/headerAjoutNote.php");
?>
<?php 
    if(isset($_POST["btnRefus"]))
    {

    }
?>
    <br><br>
    <div class="divdivCentralRefus">
        <form action="" method="post">
            <h1> Raison du refus de la note de frais :</h1>
            <div class="centralsectionRefus">
                <textarea name="" id="" cols="10" rows="10" class="textareaRefus" placeholder="Ecrivez votre commentaire ici..."></textarea>
            </div>
            <br>
            <div class="btnRefus">
                <button name="btnRefus" id="btnRefus" class="buttonAll">Confirmer le refus</button>
            </div>  
        </form>      
    </div>
</body>
</html>
