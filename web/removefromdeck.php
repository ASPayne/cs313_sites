<?PHP
include 'databaseconnection.php';
function removefromdeck($userid, $cardid){

$query =
'DO $$
BEGIN
IF 
(select num_owned from public.deck d join public.cardstorage cs
    on d.card_num = cs.id
    and cs.multiverseid = :cardid
    and (d.deck_owner = :userid)) > 1
THEN
  UPDATE public.deck
  SET num_owned = (num_owned -1),
      last_updated_by = :userid,
	  last_update_date = statement_timestamp()
  FROM public.cardstorage cs
  WHERE
     deck.card_num = cs.id
    and cs.multiverseid = :cardid
    and deck.deck_owner = :userid;
ELSE
  DELETE FROM public.deck d
  WHERE d.card_num = (SELECT cs.id FROM public.cardstorage cs
					 where cs.multiverseid = :cardid)
		             and d.deck_owner = :userid;
END IF;
END $$;
';

$stmt = $db->prepare($query);
$stmt->bindValue(':cardid', $cardid, PDO::PARAM_INT);
$stmt->bindValue(':userid', $userid, PDO::PARAM_INT);
$stmt->execute();

    //$stmt = $db->prepare('DELETE from deck d on cs.id = d.card_num where d.deck_owner = ?');
    //$stmt->bindValue('1', $deckIdNum, PDO::PARAM_INT);
    //$stmt->execute();

    header('Location: deckedit_remove.php');
}
?>