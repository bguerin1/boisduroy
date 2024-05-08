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
                $requete2 = $conn->prepare("SELECT NOTEFRAIS.MATRICULE, RAISONREFUS, NOTEFRAIS.IDNOTEFRAIS AS IDNOTEFRAIS,DATENOTEFRAIS, IDSTATUT, COUTTOTAL FROM NOTEFRAIS JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID  WHERE NOTEFRAIS.IDNOTEFRAIS=:idNoteFrais;");
                $requete2 ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
                $requete2->execute();
                $data = $requete2 -> fetchALL(PDO::FETCH_ASSOC);

            
                // DATE DU JOUR POUR VALIDATION DE LA NOTE DE FRAIS 
                $requeteDate = $conn->prepare("SELECT CURRENT_DATE() AS DATEJOUR FROM EMPLOYE WHERE MATRICULE =:matricule");
                $requeteDate ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                $requeteDate->execute();
                $dataDate = $requeteDate -> fetch();
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
        $statut = $donnee["IDSTATUT"];
        $matricule = $donnee["MATRICULE"];
        $raisonRefus = $donnee["RAISONREFUS"];
        $cout = $donnee["COUTTOTAL"];
    }
    
    // DONNEE LIGNENOTE

    // FRAIS KILOMETRIQUES 
    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
    $requeteFrais = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 1 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
    $requeteFrais ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
    $requeteFrais->execute();
    $dataFrais = $requeteFrais -> fetchALL(PDO::FETCH_ASSOC);

                

    // REPAS MIDI 
    $requeteRepasMidi = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 2 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
    $requeteRepasMidi ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
    $requeteRepasMidi->execute();
    $dataRepasMidi = $requeteRepasMidi -> fetchALL(PDO::FETCH_ASSOC);

            

    // REPAS SOIR 
    $requeteRepasSoir = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 3 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
    $requeteRepasSoir ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
    $requeteRepasSoir->execute();
    $dataRepasSoir = $requeteRepasSoir -> fetchALL(PDO::FETCH_ASSOC);

                

    // SOIR HORS PARIS 
    $requeteHorsParis = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 4 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
    $requeteHorsParis ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
    $requeteHorsParis->execute();
    $dataHorsParis = $requeteHorsParis -> fetchALL(PDO::FETCH_ASSOC);


    // SOIR PARIS
    $requeteSoirParis = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 5 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
    $requeteSoirParis ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
    $requeteSoirParis->execute();
    $dataSoirParis = $requeteSoirParis -> fetchALL(PDO::FETCH_ASSOC);


    foreach($dataFrais as $donneeFrais)
    {
        $quantiteFrais = $donneeFrais["QUANTITE"];
        $coutFrais = $donneeFrais["COUT"];
    }

    foreach($dataRepasMidi as $donneeRepasMidi)
    {
        $quantiteRepasMidi = $donneeRepasMidi["QUANTITE"];
        $coutRepasMidi = $donneeRepasMidi["COUT"];
    }

    foreach($dataRepasSoir as $donneeRepasSoir)
    {
        $quantiteRepasSoir = $donneeRepasSoir["QUANTITE"];
        $coutRepasSoir = $donneeRepasSoir["COUT"];
    }

    foreach($dataHorsParis as $donneeHorsParis)
    {
        $quantiteHorsParis = $donneeHorsParis["QUANTITE"];
        $coutHorsParis = $donneeHorsParis["COUT"];
    }
    foreach($dataSoirParis as $donneeSoirParis)
    {
        $quantiteSoirParis = $donneeSoirParis["QUANTITE"];
        $coutSoirParis = $donneeSoirParis["COUT"];
    }

    $coutTotal = $coutFrais + $coutRepasMidi + $coutRepasSoir + $coutHorsParis + $coutSoirParis;


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
                            <input type="text" name="employé" id="employé" class="inputVision" value=<?=$matricule?> readonly required>
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
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="repasMidi">Frais Kilométriques</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="number" name="quantite" id="quantite" class="inputVision" value=<?= $donneeFrais["QUANTITE"]?> readonly required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="repasMidi">Repas Midi</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="number" name="quantite" id="quantite" class="inputVision" value=<?= $donneeRepasMidi["QUANTITE"]?> readonly required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="repasMidi">Repas Soir</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="number" name="quantite" id="quantite" class="inputVision" value=<?= $donneeRepasSoir["QUANTITE"]?> readonly required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="repasMidi">Soir Hors Paris</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="number" name="quantite" id="quantite" class="inputVision" value=<?= $donneeHorsParis["QUANTITE"]?> readonly required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="repasMidi">Soir Paris</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="number" name="quantite" id="quantite" class="inputVision" value=<?= $donneeSoirParis["QUANTITE"]?> readonly required>
                        </div>
                    </td>
                </tr>
                
            </table>
            <table class="tableauFormSaisie">
                <tr>
                    <?php
                    if($statut==3)
                    {
                        echo "<th><label for='coutTotal'>Raison du Refus : </label></th>";
                        echo "<td>";
                            echo "<div>";
                                echo "<textarea name='textAreaVision' id='' class='textareaVision' placeholder='$raisonRefus' readonly></textarea>";
                            echo "</div>";
                        echo "</td>";
                    }
                    ?>
                    <th><label for="coutTotal">Coût Total : </label></th>
                    <td>
                        <div>
                            <input type="number" name="coutTotal" id="coutTotal" class="inputCoutTotal" value=<?= $cout?> require readonly>
                        </div>
                    </td>
                    <?php
                        if($statut==3)
                        {
                            echo "<tr>";
                            echo "<th><label for='coutTotal'>Refusé par : </label></th>";
                            echo "<td>";
                                echo "<div>";
                                    echo "<input type='text' name='coutNoteFrais' id='coutNoteFrais' class='inputVision' value=$matricule required readonly>";
                                echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                    <?php
                        if($_SESSION["ADMINI"]==1)
                        {
                            if($statut ==1)
                            {
                                echo "<td>";
                                    echo "<div>";
                                        echo "<button name='btnValiderNote' id='btnValiderNote' class='buttonAll'>Valider</button>";
                                    echo "</div>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<div>";
                                        $id=$_GET["idNoteFrais"];
                                        echo "<button name='btnRefuserNote' id='btnRefuserNote' class='buttonAll'> <a href='refus.php?idNoteFrais=$id'>Refuser </a> </button>";
                                    echo "</div>";
                                echo "</td>";
                            }
                            if(isset($_POST["btnValiderNote"]))
                            {
                                $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                $requete3 = $conn->prepare("UPDATE ETAPE_VALIDATION JOIN VALIDER ON VALIDER.IDETAPVALID = ETAPE_VALIDATION.IDETAPVALID SET IDSTATUT=4, DATEVALID=:dateValid WHERE IDNOTEFRAIS=:idNoteFrais;");
                                $requete3 ->bindValue(":dateValid",$dataDate["DATEJOUR"],PDO::PARAM_STR);
                                $requete3 ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
                                $requete3->execute();
                            }
                        }
                        else{
                            echo "<td>";
                                echo "<div>";
                                    echo "<button class='buttonAll'> <a href='index.php'>Retour</a></button>";
                                echo "</div>";
                            echo "</td>";
                            echo "<td>";
                                echo "<form action='' method='post'>";
                                    echo "<div>";
                                        echo "<button type='submit' name='btnAnnuler' id='btnAnnuler' class='buttonAll'>Annuler la note</button>";
                                    echo "</div>";
                                echo "</form>";
                            echo "</td>";
                            if(isset($_POST["btnAnnuler"]))
                            {
                                $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                
                                // SUPPRESSION DANS LA TABLE LIGNENOTE 

                                $requete5 = $conn->prepare("DELETE FROM LIGNENOTE WHERE IDNOTEFRAIS=:idNoteFrais;");
                                $requete5 ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
                                $requete5->execute();

                                // SUPPRESSION DANS LA TABLE ETAPE_VALIDATION
                                $requete7 = $conn->prepare("DELETE FROM ETAPE_VALIDATION WHERE IDETAPVALID IN (SELECT IDETAPVALID FROM VALIDER WHERE IDNOTEFRAIS = :idNoteFrais);");
                                $requete7 ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
                                $requete7->execute();

                                // SUPPRESSION DE LA NOTE DE FRAIS

                                $requete4 = $conn->prepare("DELETE FROM NOTEFRAIS WHERE IDNOTEFRAIS=:idNoteFrais;");
                                $requete4 ->bindValue(":idNoteFrais",$_GET["idNoteFrais"],PDO::PARAM_STR);
                                $requete4->execute();
                            }   
                        }
                    ?>
                </tr>
            </table> 
        </form>
    </div>
</div>