<?PHP
session_start();

require '../vendor/autoload.php';
use mtgsdk\Card;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/main.css">
    <title>DeckViewer</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>

    <div class="column" style="background-color:#aaa;">
        <script>
            function jscardlistrequest() {
                //var xmlhttp = new XMLHttpRequest();
                var x = "q=" + document.getElementById("cardsearch").value;
                var url = "https://api.scryfall.com/cards/search?" + escapeHtml(x);

                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myArr = JSON.parse(this.responseText);
                        displaylist(myArr);
                    }
                };
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function displaylist(arr) {
                var out = "";
                var i;

                out += '<table id="cardlist" style="width:auto">';
                out += '<th>Card Name</th>';
                out += '<th>ManaCost</th>';

                for (i in arr.data) {
                    out += '<tr>';
                    out += '<td>' + arr.data[i].name + '</td>';
                    out += '<td>' + arr.data[i].mana_cost + '</td>';
                    out += '</tr>';
                }
                out += "</table>";
                document.getElementById("listofcards").innerHTML = out;
            }

            function escapeHtml(text) {
                var map = {
                    ' ': '+',
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                };

                return text.replace(/[ &<>"']/g, function(m) {
                    return map[m];
                });
            }
            /*
            echo '<table id="cardlist">';
            echo "<th>multiverseId</th>";
            echo "<th>Card Set</th>";
            echo "<th>Card Name</th>";
            echo "<th>ManaCost</th>";
            foreach ($cards as $card) {
                if (isset($card->multiverseid)){
                echo "<tr>";
                echo "<td>" . $card->multiverseid . "</td>";
                echo "<td>" . $card->set . "</td>";
                echo "<td>" . $card->name . "</td>";
                echo "<td>" . $card->manaCost . "</td>";
                echo "</tr>";
                }
            }
            echo "</table>";
            */

            /*function showCardList() {
                var x;
                x = document.getElementById("cardsearch").value;

                if (x == "a") {
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
                    }
                };
                xmlhttp.open("GET", "searchbyname.php?name=" + x, true);
                xmlhttp.send();
            }*/
        </script>
        <!--<form name="myForm" onsubmit="return showCardList(this.cname)" method="post">-->
        search card Name: <input id="cardsearch">

        <button type="button" onclick="jscardlistrequest()">Submit</button>
        <!--   <input type="submit" value="Submit">-->
        </form>
        <div id="listofcards">test</div>
    </div>
</body>