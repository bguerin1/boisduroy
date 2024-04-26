<div class="divdivCentralVision">
    <h1>Note de frais du 15/03/2024</h1>
    <div class="central-sectionVisionNote">
        <form action="" method="post">
            <table class="tableauFormSaisie">
                <tr>
                    <th><label for="date">Date :</label></th>
                    <td>    
                        <div>
                            <input type="Date" name="date" id="date" required class="inputVision">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th><label for="employé">Employé :</label></th>
                    <td>
                        <div>
                            <input type="text" name="employé" id="employé" required class="inputVision">
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
                    <th> <label for="coutNoteFrais">Coûts</label></th>
                </tr>
                <tr>
                    <td>
                        <div>
                            <select name="typeFrais" id="typefrais" required class="inputVision">
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
                            <input type="number" name="quantite" id="quantite" required class="inputVision">
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="text" name="coutNoteFrais" id="coutNoteFrais" required class="inputVision">
                        </div>
                    </td>
                </tr>
            </table>
            <table class="tableauFormSaisie">
                <tr>
                    <th><label for="coutTotal">Coût Total : </label></th>
                    <td>
                        <div>
                            <input type="number" name="coutTotal" id="coutTotal" class="inputVision">
                        </div>
                    </td>
                    <td>
                        <div>
                            <button name="btnConnexion" id="btnConnexion" class="buttonAll"> <a href="pageConnexion.php">Annuler</a></button>
                        </div>
                    </td>
                    <td>
                        <div>
                            <button type="submit" name="btnConnexion" id="btnConnexion" class="buttonAll">Valider</button>
                        </div>
                    </td>
                </tr>
            </table> 
        </form> 
    </div>
</div>