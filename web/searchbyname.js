function showCardList() {
  var x;
  x = document.getElementById("cardsearch").value;

  hideCards();

  if (x == "") {
    document.getElementById("listofcards").innerHTML = "no cards found";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("listofcards").innerHTML = this.responseText;
      addRowHandlers();
    }
  };
  xmlhttp.open("GET", "searchbyname.php?name=" + x, true);
  xmlhttp.send();
}

function addRowHandlers() {
  var table = document.getElementById("cardlist");
  var rows = table.getElementsByTagName("tr");
  for (i = 0; i < rows.length; i++) {
    var currentRow = table.rows[i];
    var createClickHandler = function(row) {
      return function() {
        var cell = row.getElementsByTagName("td")[0];
        var id = cell.innerHTML;
        showCardInfo(id);
      };
    };
    currentRow.onclick = createClickHandler(currentRow);
  }
}

function hideCards() {
  document.getElementById("listofcards").innerHTML =
    "Searches may take time before anything shows up.";
}

function showCardInfo(cardid) {
  if (cardid == "") {
    document.getElementById("cardview").innerHTML =
      "Search for a card on the left to view.";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myArr = JSON.parse(this.responseText);
      displaycard(myArr);
      /*document.getElementById("cardview").innerHTML = this.responseText;*/
    }
  };
  xmlhttp.open(
    "GET",
    "https://api.scryfall.com/cards/named?fuzzy=" + cardid,
    true
  );
  //xmlhttp.open("GET", "cardInfoDisplay.php?id=" + cardid, true);
  xmlhttp.send();
}

function addToDeck(mid, qty) {
  var url = "jsaddCardToDeck.php";
  var params = "mid=" + mid + "&qty=" + qty;

  //Send the proper header information along with the request
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementById("cardview").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("POST", url, true);
  xmlhttp.send(params);
}

/*javascript json request from scryfall*/
function jscardlistrequest() {
  var x = "q=" + document.getElementById("cardsearch").value;
  var url = "https://api.scryfall.com/cards/search?" + escapeHtml(x);

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myArr = JSON.parse(this.responseText);
      displaylist(myArr);
      addRowHandlers();
    }
  };
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}

function displaylist(arr) {
  var out = "";
  var i;

  out += '<table id="cardlist" style="width:auto">';
  out += "<th>Card Name</th>";
  out += "<th>ManaCost</th>";

  for (i in arr.data) {
    out += "<tr>";
    out += "<td>" + arr.data[i].name + "</td>";
    out += "<td>" + arr.data[i].mana_cost + "</td>";
    out += "</tr>";
  }
  out += "</table>";
  document.getElementById("listofcards").innerHTML = out;
}

function escapeHtml(text) {
  var map = {
    " ": "+",
    "&": "&amp;",
    "<": "&lt;",
    ">": "&gt;",
    '"': "&quot;",
    "'": "&#039;"
  };

  return text.replace(/[ &<>"']/g, function(m) {
    return map[m];
  });
}

function displaycard(arr) {
  var out = "";
  out +=
    "<img src=" +
    arr.image_uris.small +
    " alt=" +
    arr.name +
    " style='float:left;margin-right:15px;'>";
  out += "<h1 id='cardname'>" + arr.name + "</h1>";
  out += "<p>" + arr.oracle_text + "</p>";

  document.getElementById("cardview").innerHTML = out; 
}


function jsaddToDeck() {
    var url = "jsaddCardToDeck.php";
    var cardname = document.getElementById("cardname").innerHTML;
    var qty = document.getElementById("quantity").value;
    var params = "cardname=" + escapeHtml(cardname) + "&qty=" + qty;
  
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("cardview").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", url + "?" + params, true);
    xmlhttp.send(params);
  }