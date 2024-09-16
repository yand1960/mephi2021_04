function getCourses() {
    var url = "https://www.cbr-xml-daily.ru/daily_json.js";

    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, false);
    xhr.send();
    var result = JSON.parse(xhr.response);
    console.log(result);
    document.getElementById("time").innerText = result.Timestamp
    const tableContainer = document.getElementById("tableContainer")
    const tableHeader = document.getElementById("tableHeader")

    let isHeaderReady = false;
    const getNewCell = (el, container) => {
        const cell = document.createElement("td");
        cell.innerText = el;
        container.appendChild(cell);
    }
    for (const [key, value] of Object.entries(result.Valute)){
        if(!isHeaderReady){
            Object.keys(value).forEach(el => {
                getNewCell(el, tableHeader)
            })
            isHeaderReady = true;
        }
        const child = document.createElement("tr");
        Object.values(value).forEach(el => {
            getNewCell(el, child)
        })
        tableContainer.appendChild(child)
    }
}

getCourses();