let form = document.getElementById('form-container');
let seta = document.getElementById('seta');
count = 0;
function registrar(){
    if(count == 0){
        seta.style.transform ="rotate(90deg)";
        form.style.display = "block";
        count = 1;
    }else if(count == 1){
        seta.style.transform ="rotate(360deg)";
        form.style.display = "none";
        count = 0;
    }
}