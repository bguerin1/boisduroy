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
    }
?>