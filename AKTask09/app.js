let n1;
let n2;

let result = document.getElementById('out');

function plus() {
    n1 = document.getElementById('n1').value;
    n1 = parseInt(n1)
    n2 = document.getElementById('n2').value;
    n2 = parseInt(n2)

    let res = n1 + n2;
    checkNanAndInfinity(res);
    result.value = res;
}

function minus() {
    n1 = document.getElementById('n1').value;
    n1 = parseInt(n1)
    n2 = document.getElementById('n2').value;
    n2 = parseInt(n2)

    let res = n1 - n2;
    checkNanAndInfinity(res);
    result.value = res;
}

function multiplication() {
    n1 = document.getElementById('n1').value;
    n1 = parseInt(n1)
    n2 = document.getElementById('n2').value;
    n2 = parseInt(n2)

    let res = n1 * n2;
    checkNanAndInfinity(res);
    result.value = res;
}

function division() {
    n1 = document.getElementById('n1').value;
    n1 = parseInt(n1);
    n2 = document.getElementById('n2').value;
    n2 = parseInt(n2);

    let res = n1 / n2;
    checkNanAndInfinity(res);
    result.value = res;
}

function clearResult(){
    document.getElementById('n1').value = "";
    document.getElementById('n2').value = "";

    result.style.border = "2px solid #ccc";
    result.value = "";
}


function checkNanAndInfinity(res){
    if (!isFinite(res))
    {
        result.style.border = "2px solid #DC143C";
    }
    else {
        result.style.border = "2px solid #00FA9A";
    }
}