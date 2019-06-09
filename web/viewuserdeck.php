<?php
session_start();
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

echo "<tr>";
echo "<th>NumberInDeck</th>";
echo "<th>CardName</th>";
echo "<th>Cost</th>";
echo "</tr>";
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