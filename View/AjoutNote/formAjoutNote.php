<div class="central-sectionFormSaisie">
        <form action="ajoutNote.php" method="post">
            <h1 class="central">Saisie des notes de frais :</h1>
            <table class="tableauFormSaisie">
                <tr>
                    <th><label for="date">Date :</label></th>
                    <td>    
                        <div>
                            <?php
                                if(isset($_POST["btnCopie"]) && isset($_POST["idNoteFrais"]))
                                {
                                    echo "<input type='Date' name='DATENOTEFRAIS' id='date' required class='inputSaisie' value=$dateNoteFrais>";
                                }
                                else{
                                    echo "<input type='Date' name='DATENOTEFRAIS' id='date' required class='inputSaisie'>";
                                }
                            ?>                       
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
                        <label for="typeFrais">Type de frais</label>
                    </th>
                    <th><label for="typeFrais">Quantité</label></th>
                </tr>
                <tr>
                    <td>
                        <div>
                            <?php
                                if(isset($_POST["btnCopie"]) && isset($_POST["idNoteFrais"]))
                                {
                                    echo "<label for='fraisKM'>Frais Kilométriques</label>";
                                }
                                else{
                                    echo "<label for='fraisKM'>Frais Kilométriques</label>";
                                }
                            ?>
                        </div>
                    </td>
                    <td>
                        <div>
                            <?php
                                if(isset($_POST["btnCopie"]) && isset($_POST["idNoteFrais"]))
                                {
                                    echo "<input type='number' name='quantiteFraisKM' id='quantite' required class='inputSaisie' value=$quantiteFrais>";
                                }
                                else{
                                    echo "<input type='number' name='quantiteFraisKM' id='quantite' required class='inputSaisie'>";
                                }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="repasMidi">Repas Midi</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <?php
                                if(isset($_POST["btnCopie"]) && isset($_POST["idNoteFrais"]))
                                {
                                    echo "<input type='number' name='quantiteRepasMidi' id='quantite' required class='inputSaisie' value=$quantiteRepasMidi>";
                                }
                                else{
                                    echo "<input type='number' name='quantiteRepasMidi' id='quantite' required class='inputSaisie'>";
                                }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="repasSoir">Repas Soir</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <?php
                                if(isset($_POST["btnCopie"]) && isset($_POST["idNoteFrais"]))
                                {
                                    echo "<input type='number' name='quantiteRepasSoir' id='quantite' required class='inputSaisie' value=$quantiteRepasSoir>";
                                }
                                else{
                                    echo "<input type='number' name='quantiteRepasSoir' id='quantite' required class='inputSaisie'>";
                                }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="soirHorsParis">Soir Hors Paris</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <?php
                                if(isset($_POST["btnCopie"]) && isset($_POST["idNoteFrais"]))
                                {
                                    echo "<input type='number' name='quantiteSoirHorsParis' id='quantite' required class='inputSaisie' value=$quantiteSoirHorsParis>";
                                }
                                else{
                                    echo "<input type='number' name='quantiteSoirHorsParis' id='quantite' required class='inputSaisie'>";
                                }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="soirParis">Soir Paris</label>
                        </div>
                    </td>
                    <td>
                        <div>
                                <?php
                                    if(isset($_POST["btnCopie"]) && isset($_POST["idNoteFrais"]))
                                    {
                                        echo "<input type='number' name='quantiteSoirParis' id='quantite' required class='inputSaisie' value=$quantiteSoirParis>";
                                    }
                                    else{
                                        echo "<input type='number' name='quantiteSoirParis' id='quantite' required class='inputSaisie'>";
                                    }
                                ?>
                        </div>
                    </td>
                </tr>
                
            </table>
            <table class="tableauFormSaisie">
                <tr>
                    <td>
                        <div>
                            <button name="btnConnexion" id="btnConnexion" class="buttonAll"> <a href="index.php">Annuler</a></button>
                        </div>
                    </td>
                    <td>
                        <div>
                            <button type="submit" name="btnAjout" id="btnAjout" class="buttonAll">Envoyer la fiche</button>
                        </div>
                    </td>
                </tr>
            </table> 
        </form>
    </div>