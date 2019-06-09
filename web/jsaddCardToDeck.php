<?PHP
session_start();
require 'databaseconnect.php';

//echo '<div id="loader"></div>';

$cardname = $_GET['cardname'];
$qty = $_GET['qty'];

echo "GET: cardname" . $cardname . "<br>";
echo "GET: qty" . $qty . "<br>";

function find($name)
{
	$name = preg_replace('/\s+/', '+', $name);
	$url = "https://api.scryfall.com/cards/named?fuzzy=" . $name;
	//echo $url;
	$response = fetch($url);
	//var_dump($response);
	//echo "<br><br>";
	return json_decode($response);
}

function fetch($url)
{
	$json = file_get_contents($url);
	return $json;
}

$carddata = find($cardname);

//var_dump($carddata);
//echo "<br><br>";

//$mid = $carddata->multiverse_ids;
//echo $mid[0];
//echo $carddata->type_line;

echo "mid: " . $carddata->multiverse_ids[0] . "<br>";
echo "name: " . $carddata->name . "<br>";
echo "type: " . $carddata->type_line . "<br>";
echo "manacost: " . $carddata->mana_cost . "<br>";
echo "cmc: " . $carddata->cmc . "<br>";
if (is_null($carddata->power)){$power = NULL; }else {$power = $carddata->power;}

echo "power: " . $power . "<br>";

if (is_null($carddata->toughness)){$toughness = NULL; }else {$toughness = $carddata->toughness;}
echo "toughness: " . $toughness . "<br>";


echo "text: " . $carddata->oracle_text . "<br>";

try {
	$query = "
	INSERT INTO CardStorage(
		id
		,multiverseid
		,CardName
		,CardTypes
		,ManaCost
		,CMC
		,Power
		,Toughness
		,Text
		,created_by
		,creation_date
		,last_updated_by
		,last_update_date
		) VALUES (
		    DEFAULT
			, :multiverseid
			, :name
			, :types
			, :manaCost
			, :cmc
			, :power
			, :toughness
			, :text
			, (SELECT id FROM public.user where username = 'SYSADMIN')
			, statement_timestamp()
			, (SELECT id FROM public.user where username = 'SYSADMIN')
			, statement_timestamp())
	ON CONFLICT ON CONSTRAINT unique_multiverse_id 
	DO NOTHING";

	
	$statement = $db->prepare($query);
	$statement->bindValue(':multiverseid', $carddata->multiverse_ids[0], PDO::PARAM_INT);
	$statement->bindValue(':name', $carddata->name);
	
	if (is_array($carddata->type_line)) {
		$statement->bindValue(':types',  $carddata->type_line);
	} else {
		$statement->bindValue(':types', $carddata->type_line);
	}
	
	$statement->bindValue(':manaCost', $carddata->mana_cost);
	$statement->bindValue(':cmc', $carddata->cmc, PDO::PARAM_INT);
	
		$statement->bindValue(':power', $power);
		
		
		$statement->bindValue(':toughness', $toughness);
		
		$statement->bindValue(':text', $carddata->oracle_text);
		echo "testing123";

echo "test <br>";

	$statement->debugDumpParams();

	$statement->execute();
	$statement->closeCursor();
} catch (Exception $ex) {
	echo "<br><br><b>Error with DB. Details:</b><br> $ex";
	die();
}


try {
	$query2 =
		'INSERT INTO public.deck(
id              
,card_num    	
,deck_owner	    
,num_owned   	
,created_by     	
,creation_date  	
,last_updated_by 
,last_update_date)
VALUES
(
	DEFAULT
, (select id FROM public.CardStorage where multiverseid = :multiverseid)
, :userdeck
, :qty
, (SELECT id FROM public.user where username = ' . "'SYSADMIN'" . ')
, statement_timestamp()
, (SELECT id FROM public.user where username = ' . "'SYSADMIN'" . ')
, statement_timestamp()
)';

	$statement = $db->prepare($query2);
	$statement->bindValue(':multiverseid', $carddata->multiverse_ids[0]);

	if (isset($qty)) {
		$statement->bindValue(':qty', $qty);
	} else {
		$statement->bindValue(':qty', 1);
	}

	if (isset($_SESSION["userid"])) {
		$statement->bindValue(':userdeck', $_SESSION["userid"]);
	} else {
		header('Refresh: 0; URL = deckEditorLogin.php');
	}

	$statement->execute();
	$statement->closeCursor();
} catch (Exception $ex) {
	echo "<br><br><b>Error with DB. Details:</b><br> $ex";
	die();
}
//header("Location: deckedit_add.php?id=". $card->multiverseid);
