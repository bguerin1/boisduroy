let input=document.querySelector('.mdp input');
let showBtn = document.querySelector('.mdp i');
showBtn.onclick=function(){
    if(input.type==="password"){
        input.type = "text";
        showBtn.classList.add('active');
    } else{
        input.type ="password";
        showBtn.classList.remove('active');
    }
}