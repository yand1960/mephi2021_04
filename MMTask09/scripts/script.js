function plus(){
    let x = document.getElementById("x").value;
    if(x==""){
        x=0;
    }
    let y = document.getElementById("y").value;
    if(y==""){
        y=0;
    }
    let z = parseInt(x) + parseInt(y);
    let element = document.getElementById("result");
    element.classList.remove("animate__zoomInUp");
    element.classList.add("animate__bounceIn");
    element.addEventListener('animationend', () => {
        element.classList.remove("animate__bounceIn");
      });
    element.value = z;
}
function minus(){
    let x = document.getElementById("x").value;
    if(x==""){
        x=0;
    }
    let y = document.getElementById("y").value;
    if(y==""){
        y=0;
    }
    let z = parseInt(x) - parseInt(y);
    let element = document.getElementById("result");
    element.classList.remove("animate__zoomInUp");
    element.classList.add("animate__bounceIn");
    element.addEventListener('animationend', () => {
        element.classList.remove("animate__bounceIn");
      });
    element.value = z;
}
