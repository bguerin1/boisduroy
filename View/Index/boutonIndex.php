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
        <form action="" method="get" name="formA">
        <td>
            <div>
                <select name="listeDeroulante" id="listeDeroulante">
                    <option value="0">Tri des notes ...</option>
                    <option value="1">Date</option>
                    <option value="2">Coût Total</option>
                    <option value="3">État</option>
                </select>
                <?php
                    if(isset($_GET["listeDeroulante"]))
                    {
                        switch($_GET["listeDeroulante"])
                        {
                            case 1:
                                $requete3 = $conn->prepare("SELECT PRENOM,NOM, ETAPE_VALIDATION.MATRICULE AS MATRICULE,DATENOTEFRAIS,NOMSTATUT FROM EMPLOYE JOIN NOTEFRAIS ON NOTEFRAIS.MATRICULE = EMPLOYE.MATRICULE JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.MATRICULE=NOTEFRAIS.MATRICULE JOIN STATUT ON ETAPE_VALIDATION.IDSTATUT = STATUT.IDSTATUT  WHERE EMPLOYE.MATRICULE = :matricule AND MDPCOMPTE=PASSWORD(:mdp) ORDER BY DATENOTEFRAIS DESC;");
                                $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                $requete3 ->bindValue(":mdp",$_SESSION["MDP"],PDO::PARAM_STR);
                                $requete3->execute();
                                $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                break;
                            case 2:
                                $requete3 = $conn->prepare("SELECT PRENOM,NOM, ETAPE_VALIDATION.MATRICULE AS MATRICULE,DATENOTEFRAIS,NOMSTATUT FROM EMPLOYE JOIN NOTEFRAIS ON NOTEFRAIS.MATRICULE = EMPLOYE.MATRICULE JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.MATRICULE=NOTEFRAIS.MATRICULE JOIN STATUT ON ETAPE_VALIDATION.IDSTATUT = STATUT.IDSTATUT  WHERE EMPLOYE.MATRICULE = :matricule AND MDPCOMPTE=PASSWORD(:mdp) ORDER BY COUTTOTAL;");
                                $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                $requete3 ->bindValue(":mdp",$_SESSION["MDP"],PDO::PARAM_STR);
                                $requete3->execute();
                                $data = $requete2->fetchALL(PDO::FETCH_ASSOC);
                                break;
                            case 3:
                                $requete3 = $conn->prepare("SELECT PRENOM,NOM, ETAPE_VALIDATION.MATRICULE AS MATRICULE,DATENOTEFRAIS,NOMSTATUT FROM EMPLOYE JOIN NOTEFRAIS ON NOTEFRAIS.MATRICULE = EMPLOYE.MATRICULE JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.MATRICULE=NOTEFRAIS.MATRICULE JOIN STATUT ON ETAPE_VALIDATION.IDSTATUT = STATUT.IDSTATUT  WHERE EMPLOYE.MATRICULE = :matricule AND MDPCOMPTE=PASSWORD(:mdp) ORDER BY DATENOTEFRAIS DESC;");
                                $requete3 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                                $requete3 ->bindValue(":mdp",$_SESSION["MDP"],PDO::PARAM_STR);
                                $requete3->execute();
                                $data = $requete3->fetchALL(PDO::FETCH_ASSOC);
                                break;
                        }
                    }
                ?>
                <script>
                    document.getElementById('listeDeroulante').addEventListener('change', function() {
                    document.querySelector('formA').submit(); // Soumettre le formulaire
                    });
                </script>
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