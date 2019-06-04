<?PHP
session_start();
require 'databaseconnect.php';
require '../../vendor/autoload.php';

use mtgsdk\Card;

echo '<div id="loader"></div>';

$cardid = $_POST['cardID'];

$card = Card::find($cardid);

echo '<br> '. $card->multiverseid;
echo '<br> '. $card->name;
echo '<br> Types: '. $card->type /*. '  vardump:  ' . var_dump($card->types)*/;
echo '<br> '. $card->manaCost;
echo '<br> '. $card->cmc;

echo '<br> Power: ';
if (isset($card->power)){ echo $card->power;}


echo '<br> Toughness: ';
if (isset($card->toughness)){echo $card->toughness;}
echo '<br> '. $card->text;

try{
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
			, (select id from card_types where card_types = :types)
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
	$statement->bindValue(':multiverseid', $card->multiverseid, PDO::PARAM_INT);
	$statement->bindValue(':name', $card->name);

if (is_array($card->types)){
	$statement->bindValue(':types', $card->types[0]);
}
else{
	$statement->bindValue(':types', $card->types);
}
	$statement->bindValue(':manaCost', $card->manaCost);
	$statement->bindValue(':cmc', $card->cmc, PDO::PARAM_INT);
	if (isset($card->power)){$statement->bindValue(':power', $card->power);} else $statement->bindValue(':power', NULL);
	if (isset($card->toughness)){$statement->bindValue(':toughness', $card->toughness);} else $statement->bindValue(':toughness', NULL);
	$statement->bindValue(':text', $card->text);
	$statement->execute();
	$statement->closeCursor();

		}catch (Exception $ex)
		{
			echo "<br><br><b>Error with DB. Details:</b><br> $ex";
			die();
		}

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
, (select id from public.USER where username = ' . "'TESTUSER'" .')
, :qty
, (SELECT id FROM public.user where username = ' . "'SYSADMIN'" .')
, statement_timestamp()
, (SELECT id FROM public.user where username = ' . "'SYSADMIN'" .')
, statement_timestamp()
)';

$statement = $db->prepare($query2);
$statement->bindValue(':multiverseid', $card['multiverseid']);
$statement->bindValue(':qty' , $_POST['qty']);
$statement->execute();
$statement->closeCursor();


header("Location: cardview.php?id=". $card->multiverseid);

?>
