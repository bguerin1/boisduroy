<div class="central-sectionFormSaisie">
        <form action="ajoutNote.php" method="post">
            <h1 class="central">Saisie des notes de frais :</h1>
            <table class="tableauFormSaisie">
                <tr>
                    <th><label for="date">Date :</label></th>
                    <td>    
                        <div>
                            <input type="Date" name="DATENOTEFRAIS" id="date" required class="inputSaisie">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th><label for="employé">Employé :</label></th>
                    <td>
                        <div>
                            <input type="text" name="employé" id="employé" class="inputSaisie" value=<?=$_SESSION["MATRICULEEMPLOYE"]?> readonly>
                        </div>
                    </td>
                </tr>
            </table>
            <h1 class="central"> Liste des frais à rembourser : </h2>
            <table class="tableauFormSaisie">
                <tr>
                    <th>    
                        <button name="AjoutLigne" class="ajoutLigne"> <img src="img/PLUS copy.png" alt=""> </button>
                        <label for="typeFrais">Type de frais</label>
                    </th>
                    <th><label for="typeFrais">Quantité</label></th>
                    <th> <label for="coutNoteFrais">Coûts</label></th>
                </tr>
                <tr>
                    <td>
                        <div>
                            <select name="typeFrais" id="typefrais" required class="inputSaisie">
                            <option value="1">Frais Kilométriques</option>
                            <option value="2">Repas midi</option>
                            <option value="3">Repas soir</option>
                            <option value="4">Soir hors Paris</option>
                            <option value="5">Soir Paris</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="number" name="quantite" id="quantite" required class="inputSaisie">
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="text" name="cout" id="coutNoteFrais" required class="inputSaisie">
                        </div>
                    </td>
                </tr>
            </table>
            <table class="tableauFormSaisie">
                <tr>
                    <th><label for="coutTotal">Coût Total : </label></th>
                    <td>
                        <div>
                            <input type="number" name="coutTotal" id="coutTotal" class="inputSaisie">
                        </div>
                    </td>
                    <td>
                        <div>
                            <button name="btnConnexion" id="btnConnexion" class="buttonAll"> <a href="index.php">Annuler</a></button>
                        </div>
                    </td>
                    <td>
                        <div>
                            <button type="submit" name="btnAjout" id="btnAjout" class="buttonAll">Envoyer la fiche</button>
                        </div>
                        <?php
                            if(isset($_POST["AjoutLigne"]))
                            {
                                echo "<div class='wrapper'>";
                                    echo "<div>";

                                    echo "</div>"; 

                                    echo "<div>";
                                        echo "<select name='typeFrais' id='typefrais' required>";
                                            echo "<option value='1'>Frais Kilométriques</option>";                            
                                            echo "<option value='2'>Repas midi</option>";
                                            echo "<option value='3'>Repas soir</option>";
                                            echo "<option value='4'>Soir hors Paris</option>";
                                            echo "<option value='5'>Soir Paris</option>";
                                        echo "</select>";
                                    echo "</div>";
                                    echo "<div>";
                                        echo "<input type='number' name='quantite' id='quantite' required>";
                                        echo "<br>";
                                    echo "</div>";
                                    echo "<div>";
                                        echo "<input type='text' name='coutNoteFrais' id='coutNoteFrais' required>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<br>";
                            }
                        ?>
                    </td>
                </tr>
            </table> 
        </form>
    </div>