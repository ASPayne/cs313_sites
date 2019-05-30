<?php
include 'databaseconnect.php';

$sql = "SELECT d.num_owned, cs.cardname, cs.manacost 
from CardStorage cs join deck d 
on cs.id = d.card_num 
where d.deck_owner = " . $_GET['user'];

echo "<table>";

foreach ($db->query($sql)
 as $row) {

echo "<tr>";
echo "<th>NumberInDeck</th>";
echo "<td>" . $row['num_owned'] . "</td>";
echo "<th>CardName</th>";
echo "<td>" . $row['cardname'] . "</td>";
echo "<th>Cost</th>";
echo "<td>" . $row['manacost'] . "</td>";
echo "</tr>";
 }

 echo "</table>";


?> 