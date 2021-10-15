function GetRate(){
    var url = "https://www.cbr-xml-daily.ru/daily_json.js";
    var xhr = new XMLHttpRequest();
    console.log(xhr);
    xhr.open("GET",url, false);
    xhr.send();
    var result = xhr.responseText;
    console.log(result);
    var money = JSON.parse(result);
    console.log(money);

    var AUD = (money.Valute.AUD.Value);
    var s1 = "<p>Курс австралийского доллара: " + AUD + "</p>";
    document.getElementById("store1").innerHTML = s1;

    var CZK = (money.Valute.CZK.Value);
    var s2 = "<p>Курс чешской кроны: " + CZK + "</p>";
    document.getElementById("store2").innerHTML = s2;

    var JPY = (money.Valute.JPY.Value);
    var s3 = "<p>Курс японской иены: " + JPY + "</p>";
    document.getElementById("store3").innerHTML = s3;
}