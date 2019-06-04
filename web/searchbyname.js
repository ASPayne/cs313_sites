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
    } else { // code for IE6, IE5
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
                alert("id:" + id);
            };
        };
        currentRow.onclick = createClickHandler(currentRow);
    }
}

function hideCards() {
    document.getElementById("listofcards").innerHTML = "Searches may take time before anything shows up.";
}

function showCardInfo(cardid){    
        if (cardid == "") {
            document.getElementById("cardview").innerHTML = "Search for a card on the left to view.";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("cardview").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "cardInfoDisplay.php?id=" + cardid, true);
        xmlhttp.send();
    }
