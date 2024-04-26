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