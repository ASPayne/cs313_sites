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
            function showCardList() {
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
            }
        </script>
        <!--<form name="myForm" onsubmit="return showCardList(this.cname)" method="post">-->
            search card Name: <input id="cardsearch">

            <button type="button" onclick="showCardList()">Submit</button>
         <!--   <input type="submit" value="Submit">-->
        </form>
        <div id="listofcards">test</div>
    </div>
</body>