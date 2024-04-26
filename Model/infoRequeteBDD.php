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