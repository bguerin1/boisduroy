<table class="tableauFormConn">
    <tr>
        <td>
            <div>
                <button class="buttonAll"> <a href="ajoutNote.php">+ Ajouter une fiche</a> </button>
            </div>
        </td>
        <td>
            <div>
                <button class="buttonAll"> <a href="ajoutNote.php"> Copier </a></button>
            </div>
        </td>
        <?php
            if($_SESSION["ADMINI"]==1)
            {
                $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                $requete5 = $conn->prepare("SELECT COUNT(NOTEFRAIS.IDNOTEFRAIS) AS NBNOTEFRAIS FROM NOTEFRAIS JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON ETAPE_VALIDATION.IDSTATUT = STATUT.IDSTATUT WHERE NOMSTATUT = 'En cours de validation Responsable';");
                $requete5->execute();
                $data1 = $requete5->fetch();
                $conn = null;
                echo "<td>";
                    echo "<div>";
                        echo "<button class='buttonAll'>En attente de validation" . " (" .$data1['NBNOTEFRAIS'] . ")" . "</button>";
                    echo "</div>";
                echo "</td>";
            }
        ?>
        <form action="" method="get" name="formA">
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
                    <option value="0">Tri des notes ...</option>
                    <option value="1">Date</option>
                    <option value="2">Coût Total</option>
                    <option value="3">État</option>
                </select>
                <?php
                    if($_SESSION["ADMINI"]==1)
                    {
                        if(isset($_GET["listeDeroulantePersonne"]) && isset($_GET["listeDeroulante"]))
                        {
                            if($_GET["listeDeroulantePersonne"]==0){
                                switch($_GET["listeDeroulante"])
                                {
                                    case 1:
                                        $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                        // PREVOIR 
                                        $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS,DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, COUTTOTAL FROM NOTEFRAIS JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS=NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE = :matricule ORDER BY DATENOTEFRAIS DESC;");
                                        $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                        $requete3->execute();
                                        $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                        $conn = null;
                                        break;
                                    case 2:
                                        $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                        $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, COUTTOTAL FROM NOTEFRAIS JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS=NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE = :matricule ORDER BY COUTTOTAL DESC;");
                                        $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                        $requete3->execute();
                                        $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                        $conn = null;
                                        break;
                                    case 3:
                                        $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                        $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, COUTTOTAL FROM NOTEFRAIS JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS=NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE = :matricule ORDER BY NOMSTATUT;");
                                        $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                        $requete3->execute();
                                        $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                        $conn = null;
                                        break;
                                }
                            }
                            else{
                                switch($_GET["listeDeroulante"])
                                {
                                    case 1:
                                        $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                        $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, COUTTOTAL FROM NOTEFRAIS JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS=NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE != :matricule ORDER BY DATENOTEFRAIS DESC;");
                                        $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                        $requete3->execute();
                                        $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                        $conn = null;
                                        break;
                                    case 2:
                                        $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                        $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, COUTTOTAL FROM NOTEFRAIS JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS=NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE != :matricule ORDER BY COUTTOTAL DESC;");
                                        $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                        $requete3->execute();
                                        $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                        $conn = null;
                                        break;
                                    case 3:
                                        $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                        $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, COUTTOTAL FROM NOTEFRAIS JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS=NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE != :matricule ORDER BY NOMSTATUT;");
                                        $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                        $requete3->execute();
                                        $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                        $conn = null;
                                        break;
                                }
                            }
                        }
                    }
                    else{
                        if(isset($_GET["listeDeroulante"]))
                        {
                            switch($_GET["listeDeroulante"])
                            {
                                case 1:
                                    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                    $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, COUTTOTAL FROM NOTEFRAIS JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS=NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE = :matricule ORDER BY DATENOTEFRAIS DESC;");
                                    $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                    $requete3->execute();
                                    $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                    $conn = null;
                                    break;
                                case 2:
                                    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                    $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, COUTTOTAL FROM NOTEFRAIS JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS=NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE = :matricule ORDER BY COUTTOTAL DESC;");
                                    $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                    $requete3->execute();
                                    $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                    $conn = null;
                                    break;
                                case 3:
                                    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                                    $requete3 = $conn->prepare("SELECT NOTEFRAIS.IDNOTEFRAIS, DATE_FORMAT(DATENOTEFRAIS, '%d-%m-%Y') AS DATENOTEFRAIS, NOMSTATUT, COUTTOTAL FROM NOTEFRAIS JOIN VALIDER ON VALIDER.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS=NOTEFRAIS.IDNOTEFRAIS JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.IDETAPVALID = VALIDER.IDETAPVALID JOIN STATUT ON STATUT.IDSTATUT = ETAPE_VALIDATION.IDSTATUT WHERE NOTEFRAIS.MATRICULE = :matricule ORDER BY NOMSTATUT;");
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