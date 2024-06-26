<table class="tableauFormConn">
    <tr>
        <td>
            <div>
                <button class="buttonAll"> <a href="ajoutNote.php">+ Ajouter une fiche</a> </button>
            </div>
        </td>
        <?php
            if($_SESSION["ADMINI"]==1)
            {
                $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                $requete5 = $conn->prepare("SELECT COUNT(NOTEFRAIS.IDNOTEFRAIS) AS NBNOTEFRAIS FROM NOTEFRAIS JOIN EMPLOYE ON EMPLOYE.MATRICULE = NOTEFRAIS.MATRICULE JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON ETAPE_VALIDATION.IDSTATUT = STATUT.IDSTATUT WHERE NOMSTATUT = 'En cours de validation Responsable' AND MATRICULE_ETRE_RESPONSABLE=:matricule;");
                $requete5 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                $requete5->execute();
                $data1 = $requete5->fetch();
                $conn = null;
                echo "<form action='' method='post'>";
                    echo "<td>";
                        echo "<div>";
                            echo "<button name='btnAttente' class='buttonAll'>En attente de validation" . " (" .$data1['NBNOTEFRAIS'] . ")" . "</button>";
                        echo "</div>";
                    echo "</td>";
                echo "</form>";

                if(isset($_POST["btnAttente"]))
                {
                    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                    $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS,DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, PRENOM, NOM, COUTTOTAL FROM NOTEFRAIS JOIN EMPLOYE ON EMPLOYE.MATRICULE = NOTEFRAIS.MATRICULE JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOMSTATUT = 'En cours de validation Responsable' AND MATRICULE_ETRE_RESPONSABLE=:matricule;");
                    $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                    $requete3->execute();
                    $data= $requete3->fetchALL(PDO::FETCH_ASSOC);
                    $conn = null;
                }
            }
        ?>
        <form action="" method="post" name="formA">
        <?php
            if($_SESSION["ADMINI"]==1){
                echo "<td>";
                    echo "<select name='listeDeroulantePersonne' id='listeDeroulantePersonne'>";
                        echo "<option value='0'>Vous</option>";
                        echo "<option value='1'>Les salariés</option>";
                    echo "</select>";
                echo "</td>";
            }
        ?>
        <td>
            <div>
                <select name="listeDeroulante" id="listeDeroulante">
                    <option value="1">Date</option>
                    <option value="2">Coût Total</option>
                </select>
                <?php
                    if(isset($_POST["listeDeroulantePersonne"]) && isset($_POST["listeDeroulante"]))
                    {
                        $listeDeroulantePersonne = htmlspecialchars($_POST["listeDeroulantePersonne"]);
                        $listeDeroulante = htmlspecialchars($_POST["listeDeroulante"]);

                        if($listeDeroulante == "" || $listeDeroulante !=1 && $listeDeroulante!=2)
                        {
                            header("Location: connexion.php");
                            exit();
                        } 
                        else if($listeDeroulantePersonne == "" || $listeDeroulantePersonne != 0 && $listeDeroulantePersonne !=1)
                        {
                            header("Location: connexion.php");
                            exit();
                        }
                        else{
                            if($_SESSION["ADMINI"] == 1){
                                
                                if($listeDeroulantePersonne ==0){
                                    
                                    switch($listeDeroulante)
                                    {
                                        case 1:
                                            $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                            
                                            $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS,DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, PRENOM, NOM, COUTTOTAL FROM NOTEFRAIS JOIN EMPLOYE ON EMPLOYE.MATRICULE = NOTEFRAIS.MATRICULE JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE = :matricule ORDER BY EXTRACT(YEAR FROM DATENOTEFRAIS) DESC, EXTRACT(MONTH FROM DATENOTEFRAIS) DESC, EXTRACT(DAY FROM DATENOTEFRAIS) DESC;");
                                            $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                            $requete3->execute();
                                            $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                            $conn = null;
                                            break;
                                        case 2:
                                            $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                            $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, PRENOM, NOM, COUTTOTAL FROM NOTEFRAIS JOIN EMPLOYE ON EMPLOYE.MATRICULE = NOTEFRAIS.MATRICULE JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE = :matricule ORDER BY COUTTOTAL DESC;");
                                            $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                            $requete3->execute();
                                            $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                            $conn = null;
                                            break;
                                    }
                                }
                                else{
                                    switch($listeDeroulante)
                                    {
                                        case 1:
                                            $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                            $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, PRENOM, NOM, COUTTOTAL FROM NOTEFRAIS JOIN EMPLOYE ON EMPLOYE.MATRICULE = NOTEFRAIS.MATRICULE JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE EMPLOYE.MATRICULE_ETRE_RESPONSABLE = :matricule ORDER BY EXTRACT(YEAR FROM DATENOTEFRAIS) DESC, EXTRACT(MONTH FROM DATENOTEFRAIS) DESC, EXTRACT(DAY FROM DATENOTEFRAIS) DESC;");
                                            $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                            $requete3->execute();
                                            $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                            $conn = null;
                                            break;
                                        case 2:
                                            $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                            $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, PRENOM, NOM, COUTTOTAL FROM NOTEFRAIS JOIN EMPLOYE ON EMPLOYE.MATRICULE = NOTEFRAIS.MATRICULE JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE EMPLOYE.MATRICULE_ETRE_RESPONSABLE = :matricule ORDER BY COUTTOTAL DESC;");
                                            $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                            $requete3->execute();
                                            $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                            $conn = null;
                                            break;
                                    }
                                }
                            }
                        }
                    }
                    else if(isset($_POST["listeDeroulante"]))
                    {
                        $listeDeroulante = htmlspecialchars($_POST["listeDeroulante"]);

                        if($listeDeroulante == "" || $listeDeroulante !=1 && $listeDeroulante!=2)
                        {
                            header("Location: connexion.php");
                            exit();
                        }
                        else{
                            switch($listeDeroulante)
                            {
                                case 1:
                                    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                    $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, COUTTOTAL, PRENOM, NOM FROM NOTEFRAIS JOIN EMPLOYE ON EMPLOYE.MATRICULE = NOTEFRAIS.MATRICULE JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE = :matricule ORDER BY EXTRACT(YEAR FROM DATENOTEFRAIS) DESC, EXTRACT(MONTH FROM DATENOTEFRAIS) DESC, EXTRACT(DAY FROM DATENOTEFRAIS) DESC;");
                                    $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                    $requete3->execute();
                                    $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                    $conn = null;
                                    break;
                                case 2:
                                    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                    $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, COUTTOTAL, PRENOM, NOM  FROM NOTEFRAIS JOIN EMPLOYE ON EMPLOYE.MATRICULE = NOTEFRAIS.MATRICULE JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE = :matricule ORDER BY COUTTOTAL DESC;");
                                    $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                    $requete3->execute();
                                    $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                    $conn = null;
                                    break;
                            }
                        } 
                    }
                ?>
            </div>
        </td>
        <td>
            <div>
                <button class="buttonListe"> <img src="img/loupe.png" alt="loupe"></button>
            </div>
        </td>
        </form>
    </tr>
</table>