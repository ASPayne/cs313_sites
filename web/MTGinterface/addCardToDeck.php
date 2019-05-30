<?PHP
session_start();
require('databaseconnect.php');

$query1 = 'INSERT INTO CardStorage(multiverseid, CardName, CardTypes) VALUES ("'. $card['multiverseid'] .'", "' . $card['name'] . '", "' . $card['types'] . '")';
$card = $_SESSION['card'];
$db->query($query1);

	global $db;
	
	$query = 'INSERT INTO CardStorage(multiverseid, CardName, CardTypes) VALUES ( :multiverseid, :name, :types)';
	$statement = $db->prepare($query);
	$statement->bindValue(':multiverseid', $card['multiverseid']);
	$statement->bindValue(':name', $card['name']);
	$statement->bindValue(':types', $card['types']);
	$statement->execute();
	$statement->closeCursor();


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
, 1
, (SELECT id FROM public.user where username = ' . "'SYSADMIN'" .')
, statement_timestamp()
, (SELECT id FROM public.user where username = ' . "'SYSADMIN'" .')
, statement_timestamp()
)';

$statement = $db->prepare($query2);
$statement->bindValue(':multiverseid', $card['multiverseid']);
$statement->execute();
$statement->closeCursor();

	

?>
