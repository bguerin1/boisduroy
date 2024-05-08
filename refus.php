<?php
    require("Controler/verifSession.php");
?>
<?php
    require("View/AjoutNote/headerAjoutNote.php");
?>
<?php 
    if(isset($_POST["textAreaRefus"]))
    {
        $raisonRefus = htmlspecialchars($_POST["textAreaRefus"]);

        require("Model/infoBDD.php");
        $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
        $requete3 = $conn->prepare("UPDATE ETAPE_VALIDATION JOIN VALIDER ON VALIDER.IDETAPVALID = ETAPE_VALIDATION.IDETAPVALID SET IDSTATUT=3, RAISONREFUS=:raisonRefus WHERE IDNOTEFRAIS=:idNoteFrais;");
        $requete3 ->bindValue(":raisonRefus",$raisonRefus,PDO::PARAM_STR);
        $requete3 ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
        $requete3->execute();
    }
?>
    <br><br>
    <div class="divdivCentralRefus">
        <form action="" method="post">
            <h1> Raison du refus de la note de frais :</h1>
            <div class="centralsectionRefus">
                <textarea name="textAreaRefus" id="" cols="10" rows="10" class="textareaRefus" placeholder="Ecrivez votre commentaire ici..."></textarea>
            </div>
            <br>
            <div class="btnRefus">
                <button name="btnRefus" id="btnRefus" class="buttonAll">Confirmer le refus</button>
            </div>  
        </form>      
    </div>
</body>
</html>
