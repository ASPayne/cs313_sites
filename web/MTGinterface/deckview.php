
<?PHP
#include 'databaseconnect.php';
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
include '../header.php';
?>
<body>
    <div class="deckview">
<?php
include 'databaseconnect.php';
/*
try {
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"], '/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
  echo 'Error!: ' . $ex->getMessage();
  die();
}
*/
if (isset($_GET["decknum"])) {
  $deckIdNum = $_GET["decknum"];
}
else{
  $deckIdNum = 1;
}
$userdecknum = $deckIdNum;

$stmt = $db->prepare('SELECT d.num_owned, cs.cardname, cs.manacost from CardStorage cs join deck d on cs.id = d.card_num where d.deck_owner = ?');
$stmt->bindValue('1', $userdecknum, PDO::PARAM_INT);
#$stmt->bindValue('cardname', $cname, PDO::PARAM_STR);
#$stmt->bindValue('manacost', $manacost, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

#$sql = "SELECT d.num_owned, cs.cardname, cs.manacost 
#from CardStorage cs join deck d 
#on cs.id = d.card_num 
#where d.deck_owner = 1";# . $_GET['user'];


echo "<table id='deckviewtable'>";

echo "<tr>";
echo "<th>NumberInDeck</th>";
echo "<th>CardName</th>";
echo "<th>Cost</th>";
echo "</tr>";
#foreach ($db->query('SELECT d.num_owned, cs.cardname, cs.manacost, cs.multiverseid from CardStorage cs join deck d on cs.id = d.card_num where d.deck_owner = 2') as $row)
foreach ($rows as $card) 
{
  echo "<tr>";
  echo '<a href="/cardview.php?id=' . $card['multiverseid'] .'">';
  echo "<td>" . $card['num_owned'] . "</td>";
  echo "<td>" . $card['cardname'] . "</td>";
  echo "<td>" . $card['manacost'] . "</td>";
  echo "</a>";
  echo "</tr>";
}

#while ($row) { 
#echo "<tr>";
#echo "<td>" . $row['num_owned'] . "</td>";
#echo "<td>" . $row['cardname'] . "</td>";
#echo "<td>" . $row['manacost'] . "</td>";
#echo "</tr>";
 #}

 echo "</table>";


?> 
    </div>
</body>

<?PHP
include '../footer.php';
?>
</html>