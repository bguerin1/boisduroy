<?php
    session_start();
    if(!isset($_SESSION["IDSESSION"]))
    {
        header("Location: index.php");
    }
    else{
        if($_SESSION["IDSESSION"] != session_id())
        {
            header("Location: index.php");
        }
        else{
            // Connexion à la base de donnée 
            $servername="192.168.10.16";
            $dbname="guerin2_bryan_boisduroy";
            $username="guerin2_bryan";
            $pwd="Bs9IP91a";
            try{
                $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                $requete=$conn ->prepare("SELECT MATRICULE,MDPCOMPTE FROM EMPLOYE WHERE MATRICULE = :matricule AND MDPCOMPTE=PASSWORD(:mdp);");
                // On lie la variable $email définie au-dessus au paramètre :mail de la requête préparée
                $requete->bindValue(':matricule', $_SESSION["MATRICULE"] , PDO::PARAM_STR);
                $requete->bindValue(':mdp',$_SESSION["MDP"] , PDO::PARAM_STR);
                //On exécute la requête
                $requete->execute();
                // On récupère le résultat
                if ($requete->fetch()) {
                    $requete2 = $conn->prepare("SELECT IDNOTEFRAIS, PRENOM, NOM, EMPLOYE.MATRICULE, DATEVALID, NOMSTATUT, DATENAISS, MATRICULE_ETRE_RESPONSABLE FROM NOTEFRAIS JOIN EMPLOYE ON EMPLOYE.MATRICULE = NOTEFRAIS.MATRICULE JOIN ETAPE_VALIDATION ON ETAPE_VALIDATION.MATRICULE = EMPLOYE.MATRICULE JOIN STATUT ON ETAPE_VALIDATION.IDSTATUT = STATUT.IDSTATUT WHERE EMPLOYE.MATRICULE = :matricule AND MDPCOMPTE=PASSWORD(:mdp);");
                    $requete2 ->bindValue(":matricule",$_SESSION["MATRICULE"],PDO::PARAM_STR);
                    $requete2 ->bindValue(":mdp",$_SESSION["MDP"],PDO::PARAM_STR);
                    $requete2->execute();
                    $data = $requete2->fetchALL(PDO::FETCH_ASSOC);
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
        }
    }
?>
<?php
    foreach($data as $donnee)
    {
        $prenom=$donnee["PRENOM"];
        $nom=$donnee["NOM"];
        $matriculeEmploye=$donnee["MATRICULE"];
        $dateNaiss=$donnee["DATENAISS"];
        $responsable=$donnee["MATRICULE_ETRE_RESPONSABLE"];
        
        // Variable de sessions à utiliser pour la page des informations du compte

        $_SESSION["PRENOM"]=$prenom;
        $_SESSION["NOM"]=$nom;
        $_SESSION["MATRICULEEMPLOYE"]=$matriculeEmploye;
        $_SESSION["DATENAISS"]=$dateNaiss;
        $_SESSION["RESPONSABLE"]=$responsable;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Bois Du Roy</title>
</head>
<body>
    <header>
        <nav class="menu" role="navigation">
            <div class="inner">
                <div class="m-left">
                    <h1 class="logo">Bois Du Roy</h1>
                </div>
                <div class="m-left2">
                    <a href="pageConnexion.php"> <img src="img/arbre.png" alt="" class="imageLogo"></a>
                </div>

                <div class="m-right">
                    <div class="dropdown">
                        <button class="mainmenubtn"> <?= $donnee['PRENOM'] . " " .$donnee['NOM'] ?> </button>
                        <div class="dropdown-child">
                            <a href="informationCompte.php">Compte</a>
                            <a href="deconnexion.php">Déconnexion</a>
                        </div>
                    </div>             
                </div>
            </div>
        </nav>
    </header>
    <br>
    <h1 class='central'>Bienvenue <?= $donnee['PRENOM'] . " " . $donnee['NOM'] . " " . "(" . $donnee['MATRICULE'] . ")" ?> !</h1>
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
    <div class="central-sectionNote">
        <table class="tableNote">
            <tr>
                <th> <p>  </p></th>
                <th>Notes :</th>
                <th>État :</th>
                <th>Date :</th>
                <th>Coût Total :</th>
            </tr>
            <?php
                foreach($data as $donnee)
                {
                    echo "<tr>";
                        echo "<td>";
                            echo "<div>";
                                echo "<input type='checkbox' name='contact' id='contact_email' value='1' class='checkbox' />";
                            echo "</div>";
                        echo "</td>";     
                        echo "<td>";
                            echo "<div>";
                                echo "<p>Note de frais de " . $donnee['PRENOM'] . " " . $donnee['NOM']. "</p>";
                            echo "</div>";
                        echo "</td>"; 
                        echo "<td>";
                            echo "<div>";
                                echo "<p>" . $donnee['NOMSTATUT'] . "</p>";
                            echo "</div>";
                        echo "</td>";
                        echo "<td>";
                            echo "<div>";
                                echo "<p>" . $donnee['DATEVALID'] . "</p>";
                            echo "</div>";
                        echo "</td>";
                        echo "<td>";
                            echo "<div>";
                                echo "<p>1000 €</p>";
                            echo "</div>";
                        echo "</td>";
                    echo "</tr>";
                } 
            ?>
        </table>
    </div>
</body>
</html>