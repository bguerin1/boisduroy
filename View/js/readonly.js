function readOnly(){
    const dateNoteFrais = document.getElementById("dateVision");
    const typeFrais = document.getElementById("typeFrais");
    const quantite = document.getElementById("quantite");
    const cout = document.getElementById("coutNoteFrais");
    const coutTotal = document.getElementById("coutTotal");

    const validerContainer = document.getElementById('valider'); // Assuming it's a container element

    // Create the button HTML as a string
    const buttonHTML = "<button id='validationButton' name='validationButton' class='buttonAll'>Valider</button>";
    
    // Set the innerHTML of the container
    validerContainer.innerHTML = buttonHTML;
    
    if(dateNoteFrais.readOnly){
        dateNoteFrais.removeAttribute("readonly")
    }
    else{
        dateNoteFrais.setAttribute("readonly");
    }
    if(typeFrais.readOnly){
        typeFrais.removeAttribute("readonly")
    }
    else{
        typeFrais.setAttribute("readonly");
    }
    if(quantite.readOnly){
        quantite.removeAttribute("readonly")
    }
    else{
        quantite.setAttribute("readonly");
    }
    if(cout.readOnly){
        cout.removeAttribute("readonly")
    }
    else{
        cout.setAttribute("readonly");
    }
    if(coutTotal.readOnly){
        coutTotal.removeAttribute("readonly")
    }
    else{
        coutTotal.setAttribute("readonly");
    }
    
    
}