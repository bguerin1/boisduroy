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
            if($_SESSION["NBNOTE"] == 0)
            {
                echo "SOS FANTOME ALERTE";
            }
            else{
                foreach($data as $donnee)
                {
                    $id=$donnee["IDNOTEFRAIS"];
                    echo "<tr>";
                        echo "<td>";
                            echo "<div>";
                                //echo "<input type='checkbox' name='chkNote' id='chkNote' value='1' class='checkbox' />";
                            echo "</div>";
                        echo "</td>";     
                        echo "<td>";
                            echo "<div>";
                                echo "<a href='visionNote.php?idNoteFrais=$id' class='lienNote'><p>Note de frais de " . $donnee['PRENOM'] . " " . $donnee['NOM']. "</p> </a>";
                            echo "</div>";
                        echo "</td>"; 
                        echo "<td>";
                            echo "<div>";
                                echo "<p>" . $donnee['NOMSTATUT'] . "</p>";
                            echo "</div>";
                        echo "</td>";
                        echo "<td>";
                            echo "<div>";
                                echo "<p>" . $donnee['DATENOTEFRAIS'] . "</p>";
                            echo "</div>";
                        echo "</td>";
                        echo "<td>";
                            echo "<div>";
                                echo "<p>" . $donnee["COUTTOTAL"] . "€" . "</p>";
                            echo "</div>";
                        echo "</td>";
                        echo "<td>";
                            echo "<form method ='post' action='ajoutNote.php'>";
                            echo "<div>";
                                echo "<input type='hidden' name='idNoteFrais' value=$id/>";
                                echo "<button name='btnCopie' class='btnCopie'>Copier</button>";
                            echo "</div>";
                            echo "</form>";
                        echo "</td>";
                    echo "</tr>";
                } 
            }
        ?>
    </table>
</div>