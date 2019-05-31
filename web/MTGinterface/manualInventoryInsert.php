<?PHP
$CardName = $_POST['CardName'];
$CardType = $_POST['CardType'];
$MultiverseId = '0';//$_POST['MultiverseId'];
$CardText = $_POST['CardText'];

require("databaseconnect.php");

try{

$query = 'INSERT INTO customInventory(id, cardname, cardtype, multiverseId, cardtext , created_by     	, creation_date  	, last_updated_by , last_update_date)VALUES(DEFAULT, :name, :type, :mID, :text, 1, statement_timestamp(), 1, statement_timestamp());';


$statement = $db->prepare($query);

$statement->bindValue(':name', $CardName, PDO::PARAM_STR);
$statement->bindValue(':type', $CardType, PDO::PARAM_INT);
$statement->bindValue(':mID', $MultiverseId, PDO::PARAM_INT);
$statement->bindValue(':text', $CardText, PDO::PARAM_STR);

$statement->execute();
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}


$stmt = $db->prepare('SELECT cardname, cardtype from customInventory');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table id='deckviewtable'>";

echo "<tr>";
echo "<th>CardName</th>";
echo "<th>CardType</th>";
echo "</tr>";
#foreach ($db->query('SELECT d.num_owned, cs.cardname, cs.manacost, cs.multiverseid from CardStorage cs join deck d on cs.id = d.card_num where d.deck_owner = 2') as $row)
foreach ($rows as $card) 
{
  echo "<tr>";
  echo "<td>" . $card['cardname'] . "</td>";
  echo "<td>" . $card['cardtype'] . "</td>";
  echo "</a>";
  echo "</tr>";
}


 echo "</table>";

//header("Location: manualCardAdd.php");

?>