<?PHP
session_start();
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
<?PHP
include 'header.php';

$current_file = basename($_SERVER['PHP_SELF']);

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
?>

<body>
    <div class="deckview">
        <?php
        include 'databaseconnect.php';
        include 'removefromdeck.php';

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
                <th>CardName</th>
                <th>Cost</th>
                <th>Remove</th>
            </tr>

            <?PHP
            foreach ($rows as $card) {
                for ($i=0; $i < $card['num_owned']; $i++) {                 
                    echo "<tr>";
                    echo '<a href="/cardview.php?id=' . $card['multiverseid'] . '">';
                    //echo "<td>" . $card['num_owned'] . "</td>";
                    echo "<td>" . $card['cardname'] . "</td>";
                    echo "<td>" . $card['manacost'] . "</td>";
                    
                    echo '<td><button onclick="">X</button></td>';
                    
                    echo "</a>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</body>

<?PHP
include 'footer.php';
?>

</html>
<script>
/* THIS IS NOT CURRENTLY WORKING
* --skipping confirmation to delete for simplicity and time


function promptthenremove(userid, cardid) {
  var r = confirm("are you sure you want to remove this card from your deck?");
  if (r == true) {
    <?PHP #removefromdeck($userid, $cardid) ?>
  } else {
    txt = "You pressed Cancel!";
  }
}
*/
</script>