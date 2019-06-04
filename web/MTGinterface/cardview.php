<?PHP
session_start();
require '../../vendor/autoload.php';
use mtgsdk\Card;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/main.css">
    <title>Cardviewer</title>
</head>

<?PHP
include '../header.php';
//include 'cardquery.php';
//echo $card['imageUrl'];
//var_dump($cards);


$card = Card::find($_GET['id']);
//echo $card->imageUrl;

echo '<br><br><br>';


//var_dump($card);
?>

<body>
    <div class="cardview">
        <img src="<?PHP echo $card->imageUrl; ?>" alt="<?PHP echo $card->name; ?>" style="float:left;margin-right:15px;">
        <h1>
            <?PHP echo $card->name; ?>
        </h1>
        <br />
        <p>
            <?PHP echo $card->originalText; ?>
        </p>
        <br /><br /><br /><br />
        <br>
        <form action="addCardToDeck.php" method="POST">
            <input type="hidden" name="cardID" value="<?PHP echo $card->multiverseid; ?>">
            <button type="submit" value="Submit">Add to CardStorage</button>
        </form>
    </div>
</body>

<?PHP
include '../footer.php';
?>

</html>