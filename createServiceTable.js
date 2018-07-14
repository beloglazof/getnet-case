var tableBody = document.querySelector('tbody');
var buttonsArea = document.getElementById('buttons');
      
var requestURL = 'https://beloglazof.github.io/services.json'
var request = new XMLHttpRequest();
var tableData;
var chunk = 10;
      
request.open('GET', requestURL);
request.responseType = 'json';
request.send();
request.onload = function() {
  tableData = request.response;

  createTable(tableData, pageNumber = 1, chunk);
  var numberOfPages = getNumberOfPage(tableData, chunk);
  createButtons(numberOfPages);
}

function createTable(table_info, pageNumber, chunk) {
  tableBody.innerHTML = '';
  var start, end;
  if (pageNumber === 1) {
    start = 0;
    end = chunk;
  } else {
    start = chunk * (pageNumber - 1);
    end = chunk * pageNumber;
  }


  for (; start < end; start += 1) { 
    var guid = document.createElement('th'),
        tableRow = document.createElement('tr'),
        company = document.createElement('td'),
        description = document.createElement('td'),
        balance = document.createElement('td'),
        date = document.createElement('td');
        


        guid.textContent = table_info[start].guid;
        balance.textContent = table_info[start].balance;
        company.textContent = table_info[start].company;
        description.textContent = table_info[start].description;
        date.textContent = table_info[start].date;
            
        tableBody.appendChild(tableRow);
        tableRow.appendChild(guid);
        tableRow.appendChild(balance);
        tableRow.appendChild(company);
        tableRow.appendChild(description);
        tableRow.appendChild(date);
  }
}

function getRandomInt(min,max) {
  return Math.floor(Math.random() * (max - min)) + min;
}

function getNumberOfPage(data, chunk) {
  return data.length / chunk;
}

function createButtons(numberOfPage) {
  for (var i = 0; i < numberOfPage; i += 1) {
    var button = document.createElement('button');
    var page = i + 1;

    button.textContent = page;
    button.setAttribute('type', 'button');
    button.classList.add('btn');
    button.classList.add('btn-outline-dark');
    button.setAttribute('onclick', 'createTable(tableData,' + page + ',' + chunk + ')');

    buttonsArea.appendChild(button);

  }
}