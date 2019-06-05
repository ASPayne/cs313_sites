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
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create three equal columns that floats next to each other */
        .column {
            float: left;
            width: 33.33%;
            padding: 10px;
            height: auto;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>

</head>
<?PHP
include 'header.php';

echo "test1";
$current_file = basename($_SERVER['PHP_SELF']);

echo "test2";
$NavEditBarActive = array(
    "ADD" => " ",
    "VIEW" => " ",
    "REMOVE" => " "
);

switch ($current_file) {
    case "deckedit_add.php";
        $NavEditBarActive["ADD"] = " active";
        break;
    case "deckedit_view.php":
        $NavEditBarActive["VIEW"] = " active";
        break;
    case "deckedit_remove.php":
        $NavEditBarActive["REMOVE"] = " active";
        break;
    default:
        $NavEditBarActive = array(
            "ADD" => " ",
            "VIEW" => " ",
            "REMOVE" => " "
        );
}

if (isset($_GET['id'])) {
    $card = Card::find($_GET['id']);
} else {
    $card = Card::find(433014);
}
?>

<body>

    <div class="row">

        <!-- LEFT COLUMN -->
        <div class="column" style="background-color:#aaa;">
            <script src="searchbyname.js"></script>

            search card name: <input id="cardsearch">

            <button type="button" onclick="showCardList()">Submit</button>
            </form>
            <div id="listofcards">Searches may take time before anything shows up.</div>
            <div id="loader"></div>
        </div>



        <!-- MIDDLE COLUMN -->
        <div class="column" style="background-color:#bbb;">
            <div>
                <div id="cardview" class="cardview">
                    <!--<img src="<?PHP #echo $card->imageUrl; ?>" alt="<?PHP #echo $card->name; ?>" style="float:left;margin-right:15px;">
                    <h1>
                        <?PHP #echo $card->name; ?>
                    </h1>
                    <br />
                    <p>
                        <?PHP #echo $card->originalText; ?>
                    </p>
                    <br /><br /><br /><br />
                    <br>-->
                </div>
                <input type="number" name="quantity">
                <button type="button" onclick="addToDeck()">addCardToDeck</button>
                <form action="addCardToDeck.php" method="POST">
                    <input type="hidden" name="cardID" value="<?PHP echo $card->multiverseid; ?>">
                    <button type="submit" value="Submit">Add to CardStorage</button>
                </form>
            </div>
        </div>



        <!-- RIGHT COLUMN -->
        <div class="column" style="background-color:#ccc;">
            <div class="deckview">
                <?php
                include 'databaseconnect.php';

                if (isset($_SESSION["userid"])) {
                    $deckIdNum = $_SESSION["userid"];
                } else {
                    header('Refresh: 0; URL = deckEditorLogin.php');
                }


                $stmt = $db->prepare('SELECT d.num_owned, cs.cardname, cs.manacost from CardStorage cs join deck d on cs.id = d.card_num where d.deck_owner = ?');
                $stmt->bindValue('1', $deckIdNum, PDO::PARAM_INT);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <ul class="navbar">
                    <li class="navitem<?PHP echo ($NavEditBarActive[" ADD"]); ?> ">
                        <a href="deckedit_add.php">ADD</a></li>
                    <li class="navitem<?PHP echo $NavEditBarActive[" VIEW"]; ?> ">
                        <a href="deckedit_view.php">VIEW</a></li>
                    <li class="navitem<?PHP echo $NavEditBarActive[" REMOVE"]; ?> ">
                        <a href="deckedit_remove.php">REMOVE</a></li>
                </ul>
                <table id='deckviewtable'>

                    <tr>
                        <th>NumberInDeck</th>
                        <th>CardName</th>
                        <th>Cost</th>
                    </tr>

                    <?PHP
                    foreach ($rows as $card) {
                        echo "<tr>";
                        echo '<a href="/cardview.php?id=' . $card['multiverseid'] . '">';
                        echo "<td>" . $card['num_owned'] . "</td>";
                        echo "<td>" . $card['cardname'] . "</td>";
                        echo "<td>" . $card['manacost'] . "</td>";
                        echo "</a>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

<?PHP
include 'footer.php';
?>

</html>