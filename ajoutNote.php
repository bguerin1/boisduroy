<?php
    session_start();
    if(!isset($_SESSION["IDSESSION"]))
    {
        header("Location: connexion.php");
    }
    else{
        if($_SESSION["IDSESSION"] != session_id())
        {
            header("Location: connexion.php");
        }
        else{
            if(isset($_POST["btnCopie"]) && isset($_POST["idNoteFrais"]))
            {
                $idNoteFrais = htmlspecialchars($_POST["idNoteFrais"]);
                if($idNoteFrais == "" || $idNoteFrais == 0 || $idNoteFrais < 0)
                {
                    header("Location:index.php");
                }
                else{
                    require("Model/infoBDD.php");
                    
                    // DONNEE NOTEFRAIS 

                    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                    $requete7= $conn->prepare("SELECT DATENOTEFRAIS FROM NOTEFRAIS WHERE NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
                    $requete7 ->bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                    $requete7->execute();
                    $data = $requete7 -> fetchALL(PDO::FETCH_ASSOC);
                   
                    // DONNEE LIGNENOTE

                    // FRAIS KILOMETRIQUES 
                    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
                    $requeteFrais = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 1 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
                    $requeteFrais ->bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                    $requeteFrais->execute();
                    $dataFrais = $requeteFrais -> fetchALL(PDO::FETCH_ASSOC);



                    // REPAS MIDI 
                    $requeteRepasMidi = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 2 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
                    $requeteRepasMidi ->bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                    $requeteRepasMidi->execute();
                    $dataRepasMidi = $requeteRepasMidi -> fetchALL(PDO::FETCH_ASSOC);



                    // REPAS SOIR 
                    $requeteRepasSoir = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 3 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
                    $requeteRepasSoir ->bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                    $requeteRepasSoir->execute();
                    $dataRepasSoir = $requeteRepasSoir -> fetchALL(PDO::FETCH_ASSOC);



                    // SOIR HORS PARIS 
                    $requeteHorsParis = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 4 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
                    $requeteHorsParis ->bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                    $requeteHorsParis->execute();
                    $dataHorsParis = $requeteHorsParis -> fetchALL(PDO::FETCH_ASSOC);


                    // SOIR PARIS
                    $requeteSoirParis = $conn->prepare("SELECT QUANTITE, COUT FROM NOTEFRAIS JOIN LIGNENOTE ON LIGNENOTE.IDNOTEFRAIS = NOTEFRAIS.IDNOTEFRAIS WHERE LIGNENOTE.IDLIGNENOTE = 5 AND NOTEFRAIS.IDNOTEFRAIS =:idNoteFrais;");
                    $requeteSoirParis ->bindValue(":idNoteFrais",$idNoteFrais,PDO::PARAM_STR);
                    $requeteSoirParis->execute();
                    $dataSoirParis = $requeteSoirParis -> fetchALL(PDO::FETCH_ASSOC);

                    foreach($data as $donnee)
                    {
                        $dateNoteFrais = $donnee["DATENOTEFRAIS"];
                    }

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
                        $quantiteSoirHorsParis = $donneeHorsParis["QUANTITE"];
                        $coutHorsParis = $donneeHorsParis["COUT"];
                    }
                    foreach($dataSoirParis as $donneeSoirParis)
                    {
                        $quantiteSoirParis = $donneeSoirParis["QUANTITE"];
                        $coutSoirParis = $donneeSoirParis["COUT"];
                    }
                }
            }
            }
        }    
?>
<?php
    require("View/AjoutNote/headerAjoutNote.php");
?>
    <br><br>
        <?php
            require("View/AjoutNote/formAjoutNote.php");
        ?>
    <br>
<?php
    require("View/Connexion/footerConnexion.php");
?>
