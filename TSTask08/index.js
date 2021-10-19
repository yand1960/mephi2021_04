"use strict";

const DATA_URL = "https://www.cbr-xml-daily.ru/daily_json.js";

const USDVALUE = 71.28;
const EURVALUE = 82.77;
const GBPVALUE = 97.90;

// Get json from URL
let getJSON = function (url, callback) {
  let request = new XMLHttpRequest();
  request.open("GET", url);
  request.responseType = "json";
  request.onload = function () {
    var status = request.status;
    if (status === 200) {
      callback(null, request.response);
    } else {
      callback(status, request.response);
    }
  };
  request.send();
};

let setValuteCourse = function (err, data) {
  let USD = document.getElementById("USD-value");
  let EUR = document.getElementById("EUR-value");
  let GBP = document.getElementById("GBP-value");

  let usdValue;
  let eurValue;
  let gbpValue;

  if (err !== null) {
    usdValue = USDVALUE;
    eurValue = EURVALUE;
    gbpValue = GBPVALUE;
  }
  else {
    usdValue = data.Valute.USD.Value;
    eurValue = data.Valute.EUR.Value;
    gbpValue = data.Valute.GBP.Value;
  }

  USD.innerText = "USD " + usdValue;
  EUR.innerText = "EUR " + eurValue;
  GBP.innerHTML = "GBP " + gbpValue;
}

// Get course of exchange from URL
getJSON(DATA_URL, function (err, data) {
  if (err !== null) {
    return 0;
  } else {
    return data.Valute.Value;
  }
});

// Refresh course after load package
document.addEventListener(
  "DOMContentLoaded",
  getJSON(DATA_URL, callFunctions)
);

function currentTime() {
  let date = new Date(); /* creating object of Date class */
  let hour = date.getHours();
  let min = date.getMinutes();
  let sec = date.getSeconds();
  hour = updateTime(hour);
  min = updateTime(min);
  sec = updateTime(sec);
  document.getElementById("clock").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */
    let t = setTimeout(function(){ currentTime() }, 1000); /* setting timer */
}

function updateTime(k) {
  if (k < 10) {
    return "0" + k;
  }
  else {
    return k;
  }
}

function callFunctions() {
  setValuteCourse();
  currentTime();
}
