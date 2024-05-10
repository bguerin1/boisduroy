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
                $id=$donnee["IDNOTEFRAIS"];
                echo "<tr>";
                    echo "<td>";
                        echo "<div>";
                        echo "</div>";
                    echo "</td>";     
                    echo "<td>";
                        echo "<form action='visionNote.php' method='post'>";
                        echo "<div>";
                            echo "<input type='hidden' name='idNoteFrais' value=$id>";
                            echo "<button class='btnIndexVision' name='btnVision'>" . "Note de frais de " . $donnee['PRENOM'] . " " .  $donnee['NOM']. "</button>";
                        echo "</div>";
                        echo "</form>";
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
                            echo "<p>" .  $donnee["COUTTOTAL"] ."€" . "</p>";
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
        ?>
    </table>
</div>