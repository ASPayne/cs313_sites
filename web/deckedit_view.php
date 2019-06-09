<?PHP
session_start();
#require 'vendor/autoload.php';
#require '../vendor/autoload.php';

#use mtgsdk\Card;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/main.css">
    <title>DeckViewer</title>
</head>

<script src="searchbyname.js"></script>

<?PHP
include 'header.php';

$current_file = basename($_SERVER['PHP_SELF']);

$NavEditBarActive = array("ADD" => " ",
"VIEW" => " ",
"REMOVE" => " ");

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
        $NavEditBarActive = array("ADD" => " ",
        "VIEW" => " ",
        "REMOVE" => " ");
}
?>

<body>
    <div class="deckview" >
        <?php
        /*
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
        */?>
        <ul class="navbar">
            <li class="navitem<?PHP echo ($NavEditBarActive["ADD"]); ?> ">
                <a href="deckedit_add.php">ADD</a></li>
            <li class="navitem<?PHP echo $NavEditBarActive["VIEW"]; ?> ">
                <a href="deckedit_view.php">VIEW</a></li>
            <li class="navitem<?PHP echo $NavEditBarActive["REMOVE"]; ?> ">
                <a href="deckedit_remove.php">REMOVE</a></li>
        </ul>
        
        <table id='deckviewtable'> 
            <script> showUserDeck()</script>

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
</body>

<?PHP
include 'footer.php';
?>

</html>