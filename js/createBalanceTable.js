'use strict';

var tableBody = document.querySelector('tbody');
var buttonsArea = document.getElementById('buttons');

var requestURL = '../components/data.json';
var request = new XMLHttpRequest();
var tableData = void 0;
var chunk = 10;

var getNumberOfPage = function getNumberOfPage(data, slices) {
  return data.length / slices;
};

var createButtons = function createButtons(numberOfPage) {
  for (var i = 0; i < numberOfPage; i += 1) {
    var button = document.createElement('button');
    var page = i + 1;

    button.textContent = page;
    button.setAttribute('type', 'button');
    button.classList.add('btn');
    button.classList.add('btn-outline-dark');
    button.setAttribute('onclick', 'createTable(tableData,$ {  page  },$ {  chunk  })');

    buttonsArea.appendChild(button);
  }
};

var createTable = function createTable(tableInfo, pageNumber, slices) {
  var elem = tableBody;
  elem.innerHTML = '';
  var start = void 0;
  var end = void 0;
  if (pageNumber === 1) {
    start = 0;
    end = slices;
  } else {
    start = slices * (pageNumber - 1);
    end = slices * pageNumber;
  }

  for (; start < end; start += 1) {
    var guid = document.createElement('th');
    var tableRow = document.createElement('tr');
    var balance = document.createElement('td');
    var date = document.createElement('td');

    guid.textContent = tableInfo[start].guid;
    balance.textContent = tableInfo[start].balance;
    date.textContent = tableInfo[start].date;

    tableBody.appendChild(tableRow);
    tableRow.appendChild(guid);
    tableRow.appendChild(balance);
    tableRow.appendChild(date);
  }
};

request.open('GET', requestURL);
request.responseType = 'json';
request.send();
request.onload = function () {
  tableData = request.response;
  var numberOfPages = getNumberOfPage(tableData);

  createTable(tableData, 1, chunk);
  createButtons(numberOfPages);
};