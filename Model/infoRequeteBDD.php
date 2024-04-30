<?php
if($_SESSION["NBNOTE"]==0)
{
    echo "ljkndtfljkrnegljknrlik";
}
else{
    foreach($data as $donnee)
    {
        $prenom=$donnee["PRENOM"];
        $nom=$donnee["NOM"];
        $matriculeEmploye=$donnee["MATRICULE"];
        $dateNaiss=$donnee["DATENAISS"];
        $dateNoteFrais = $donnee["DATENOTEFRAIS"];
        $responsable=$donnee["MATRICULE_ETRE_RESPONSABLE"];
        
        $admin = $donnee["ADMINI"];
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