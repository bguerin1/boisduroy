<table class="tableauInformation">
    <tr>
        <th>Prénom :</th>
        <td>
            <div>
                <input type="text" value=<?= $_SESSION["PRENOM"] ?> class="inputSaisie" readonly>
            </div>
        </td>
    </tr>
    <tr>
        <th>Nom :</th>
        <td> 
            <input type="text" value=<?=  $_SESSION["NOM"] ?> class="inputSaisie" readonly>
        </td>
    </tr>
    <tr>
        <th>Matricule</th>
        <td>
            <div>
                <input type="text" value=<?=$_SESSION["MATRICULEEMPLOYE"]?> class="inputSaisie" readonly>
            </div>
        </td>
    </tr>
    <tr>
        <th>Date Naiss :</th>
        <td>
            <div>
                <input type="text" value=<?=  $_SESSION["DATENAISS"] ?> class="inputSaisie" readonly>
            </div>
        </td>
    </tr>
    <tr>
        <th>Responsable :</th>
        <td>
            <div>
                <input type="text" value=<?=  $_SESSION["RESPONSABLE"] ?> class="inputSaisie" readonly>
            </div>
        </td>
    </tr>
</table>