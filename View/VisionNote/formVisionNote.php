<?php
    try{
        // Connexion à la base de donnée 
        $servername="192.168.10.16";
        $dbname="guerin2_bryan_boisduroy";
        $username="guerin2_bryan";
        $pwd="Bs9IP91a";
        
        $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
        $requete=$conn ->prepare("SELECT MATRICULE,MDPCOMPTE FROM EMPLOYE WHERE MATRICULE = :matricule AND MDPCOMPTE=PASSWORD(:mdp);");
        // On lie la variable $email définie au-dessus au paramètre :mail de la requête préparée
        $requete->bindValue(':matricule', $_SESSION["MATRICULE"] , PDO::PARAM_STR);
        $requete->bindValue(':mdp',$_SESSION["MDP"] , PDO::PARAM_STR);
        //On exécute la requête
        $requete->execute();
        // On récupère le résultat
        if ($requete->fetch()) {
            if(isset($_GET["idNoteFrais"]))
            {
                // CAS A PREVOIR 
                $requete2 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS AS IDNOTEFRAIS,DATENOTEFRAIS, TYPEFRAIS, QUANTITE, COUTTOTAL, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON NOTEFRAIS.IDNOTEFRAIS = LIGNENOTE.IDNOTEFRAIS JOIN TYPEFRAIS ON TYPEFRAIS.IDTYPEFRAIS = LIGNENOTE.IDTYPEFRAIS WHERE MATRICULE = :matricule AND NOTEFRAIS.IDNOTEFRAIS=:idNoteFrais;");
                $requete2 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                $requete2 ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
                $requete2->execute();
                $data = $requete2 -> fetchALL(PDO::FETCH_ASSOC);
            }
            else{
                header("Location: index.php");
                exit();
            }
        } else {
            header("Location: index.php");
            exit();
        }
        //Fermeture de la connexion
        $conn=null;
     }
     catch(PDOException $e){
         echo "Erreur :" . $e ->getMessage();
         echo "Le numéro de l'erreur est : " . $e ->getCode();
         die;
     }
?>
<?php 
    foreach($data as $donnee)
    {
        $dateNoteFrais = $donnee["DATENOTEFRAIS"];
        $typeFrais = $donnee["TYPEFRAIS"];
        $quantite = $donnee["QUANTITE"];
        $coutTotal = $donnee["COUTTOTAL"];
        $cout = $donnee["COUT"];
    }
?>
<div class="divdivCentralVision">
    <h1>Note de frais du <?= $donnee["DATENOTEFRAIS"]?></h1>
    <div class="central-sectionVisionNote">
        <form action="" method="post">
            <table class="tableauFormSaisie">
                <tr>
                    <th><label for="date">Date :</label></th>
                    <td>    
                        <div>
                            <input type="Date" name="dateVision" id="dateVision" class="inputVision" value=<?=$donnee["DATENOTEFRAIS"] ?> required readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th><label for="employé">Employé :</label></th>
                    <td>
                        <div>
                            <input type="text" name="employé" id="employé" class="inputVision" value=<?= $_SESSION["MATRICULE"]?> readonly required>
                        </div>
                    </td>
                </tr>
            </table>
            <h1 class="central"> Liste des frais à rembourser : </h2>
            <table class="tableauFormSaisie">
                <tr>
                    <th>    
                        <label for="typeFrais">Type de frais</label>
                    </th>
                    <th><label for="typeFrais">Quantité</label></th>
                    <th> <label for="coutNoteFrais">Coûts</label></th>
                </tr>
                <tr>
                    <td>
                        <div>
                            <!--<select name="typeFrais" id="typefrais" required class="inputVision" value=>
                            <option value="1">Frais Kilométriques</option>
                            <option value="2">Repas midi</option>
                            <option value="3">Repas soir</option>
                            <option value="4">Soir hors Paris</option>
                            <option value="5">Soir Paris</option>
                            </select>
                        -->
                        <input type="text" name="typeFrais" id="typeFrais" class="inputVision" value=<?= $typeFrais?> readonly required>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="number" name="quantite" id="quantite" class="inputVision" value=<?= $quantite?> readonly required>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="text" name="coutNoteFrais" id="coutNoteFrais" class="inputVision" value=<?= $cout?> required readonly>
                        </div>
                    </td>
                </tr>
            </table>
            <table class="tableauFormSaisie">
                <tr>
                    <th><label for="coutTotal">Coût Total : </label></th>
                    <td>
                        <div>
                            <input type="number" name="coutTotal" id="coutTotal" class="inputCoutTotal" value=<?= $coutTotal?> require readonly>
                        </div>
                    </td>
                    <?php
                        if($_SESSION["ADMINI"]==1)
                        {
                            echo "<td>";
                                echo "<div>";
                                    echo "<button name='btnValiderNote' id='btnValiderNote' class='buttonAll'>Valider</button>";
                                echo "</div>";
                            echo "</td>";
                            echo "<td>";
                                echo "<div>";
                                    echo "<button name='btnRefuserNote' id='btnRefuserNote' class='buttonAll'> <a href='refus.php'>Refuser </a> </button>";
                                echo "</div>";
                            echo "</td>";
                            if(isset($_POST["btnValiderNote"]))
                            {
                                $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                $requete3 = $conn->prepare("UPDATE ETAPE_VALIDATION JOIN VALIDER ON VALIDER.IDETAPVALID = ETAPE_VALIDATION.IDETAPVALID SET IDSTATUT=2 WHERE MATRICULE = :matricule AND IDNOTEFRAIS=:idNoteFrais;");
                                $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                $requete3 ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
                                $requete3->execute();
                            }
                        }
                        else{
                            echo "<td>";
                                echo "<div>";
                                    echo "<button class='buttonAll'> <a href='index.php'>Annuler</a></button>";
                                echo "</div>";
                            echo "</td>";
                            echo "<td>";
                                echo "<div>";
                                    echo "<button type='button' name='btnModifier' id='btnModifier' class='buttonAll' onclick='readOnly()'>Modifier</button>";
                                echo "</div>";
                            echo "</td>";
                        }
                    ?>
                    <td>
                        <div id="valider">
                            <?php
                                if(isset($_POST["validationButton"]))
                                {
                                    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                    $requete2 = $conn->prepare("UPDATE NOTEFRAIS SET DATENOTEFRAIS=:dateNoteFrais WHERE MATRICULE = :matricule AND IDNOTEFRAIS=:idNoteFrais;");
                                    $requete2 ->bindValue(":dateNoteFrais",$_POST["dateVision"],PDO::PARAM_STR);
                                    $requete2 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                    $requete2 ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
                                    $requete2->execute();

                                    $requete2 = $conn->prepare("UPDATE LIGNENOTE JOIN NOTEFRAIS ON NOTEFRAIS.IDNOTEFRAIS = LIGNENOTE.IDNOTEFRAIS SET QUANTITE = :quantite, COUTTOTAL = :coutTotal, COUT=:cout WHERE MATRICULE = :matricule AND NOTEFRAIS.IDNOTEFRAIS=:idNoteFrais;");
                                    //$requete2 ->bindValue(":typefrais",$_POST["typeFrais"],PDO::PARAM_STR);
                                    $requete2 ->bindValue(":quantite",$_POST["quantite"],PDO::PARAM_STR);
                                    $requete2 ->bindValue(":coutTotal",$_POST["coutTotal"],PDO::PARAM_STR);
                                    $requete2 ->bindValue(":cout",$_POST["coutNoteFrais"],PDO::PARAM_STR);
                                    
                                    $requete2 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                    $requete2 ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
                                    $requete2->execute();
                                    
                                    $conn = null;
                                }
                            ?>
                        </div>
                    </td>
                </tr>
            </table> 
        </form>
    </div>
</div>