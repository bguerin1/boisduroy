<?php
if($_SESSION["NBNOTE"]==0)
{
    echo "ljkndtfljkrnegljknrlik";
}
else{
    foreach($data as $donnee)
    {
        $dateNoteFrais = $donnee["DATENOTEFRAIS"];
        $nomStatut = $donnee["NOMSTATUT"];
        // Variable de session 
        $_SESSION["DATENOTEFRAIS"] = $dateNoteFrais;
        $_SESSION["NOMSTATUT"] = $nomStatut;
    }
    foreach($data1 as $donnee1)
    {
        $coutTotal = $donnee1["COUTTOTAL"];
        //Variable de session 
        $_SESSION["COUTTOTAL"] = $coutTotal;
    }
    foreach($data2 as $donnee2)
    {
        $prenom=$donnee2["PRENOM"];
        $nom=$donnee2["NOM"];
        $matriculeEmploye=$donnee2["MATRICULE"];
        $dateNaiss=$donnee2["DATENAISS"];
        $responsable=$donnee2["MATRICULE_ETRE_RESPONSABLE"];
        $admin = $donnee2["ADMINI"];
        // Variable de sessions à utiliser pour la page des informations du compte
        $_SESSION["PRENOM"]=$prenom;
        $_SESSION["NOM"]=$nom;
        $_SESSION["MATRICULEEMPLOYE"]=$matriculeEmploye;
        $_SESSION["DATENAISS"]=$dateNaiss;
        $_SESSION["RESPONSABLE"]=$responsable;
        $_SESSION["ADMINI"] = $admin;
        $_SESSION["DATENOTEFRAIS"] = $dateNoteFrais;
    }
}


?>