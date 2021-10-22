function fPlus(){
    let x = document.getElementById("x").value;
    let y = document.getElementById("y").value;
    document.getElementById("ErrorBlock").classList.add("hide");
    let z = parseInt(x)+parseInt(y);
    let el = document.getElementById("result");
    el.classList.add("animate__shakeX");
    document.getElementById("hh").classList.add("animate__flip");
    el.addEventListener('animationend', () => {
        el.classList.remove("animate__shakeX");
        document.getElementById("hh").classList.remove("animate__flip");
      });
    el.value = z;
}

function fMinus(){
    let x = document.getElementById("x").value;
    let y = document.getElementById("y").value;
    document.getElementById("ErrorBlock").classList.add("hide");
    let z = parseInt(x)-parseInt(y);
    let el = document.getElementById("result");
    el.classList.add("animate__shakeX");
    document.getElementById("hh").classList.add("animate__flip");
    el.addEventListener('animationend', () => {
        el.classList.remove("animate__shakeX");
        document.getElementById("hh").classList.remove("animate__flip");
      });
    el.value = z;
}

function fMultiplication(){
    let x = document.getElementById("x").value;
    let y = document.getElementById("y").value;
    document.getElementById("ErrorBlock").classList.add("hide");
    let z = parseInt(x)*parseInt(y);
    let el = document.getElementById("result");
    el.classList.add("animate__shakeX");
    document.getElementById("hh").classList.add("animate__flip");
    el.addEventListener('animationend', () => {
        el.classList.remove("animate__shakeX");
        document.getElementById("hh").classList.remove("animate__flip");
      });
    el.value = z;
}

function fDivision(){
    let x = document.getElementById("x").value;
    let y = document.getElementById("y").value;
    document.getElementById("ErrorBlock").classList.add("hide");
    if (y==0){
        document.getElementById("ErrorBlock").classList.remove("hide");
        animate__hinge;
    }
    else{
        let z = parseInt(x)/parseInt(y);
        let el = document.getElementById("result");
        el.classList.add("animate__shakeX");
        document.getElementById("hh").classList.add("animate__flip");
        el.addEventListener('animationend', () => {
            el.classList.remove("animate__shakeX");
            document.getElementById("hh").classList.remove("animate__flip");
          });
        el.value = z;
    }
    
}

