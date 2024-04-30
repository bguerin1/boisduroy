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
                    
                    echo "<tr>";
                        echo "<td>";
                            echo "<div>";
                                echo "<input type='checkbox' name='contact' id='contact_email' value='1' class='checkbox' />";
                            echo "</div>";
                        echo "</td>";     
                        echo "<td>";
                            echo "<div>";
                                echo "<a href='visionNote.php' class='lienNote'><p>Note de frais de " . $donnee['PRENOM'] . " " . $donnee['NOM']. "</p> </a>";
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
                                echo "<p>1000 €</p>";
                            echo "</div>";
                        echo "</td>";
                    echo "</tr>";
                } 
            }
        ?>
    </table>
</div>