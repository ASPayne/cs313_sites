<?PHP
require '../vendor/autoload.php';
use mtgsdk\Card;


$card = Card::find($_GET['id']);

echo "<img src=" . $card->imageUrl . " alt=" . $card->name . " style='float:left;margin-right:15px;'>";
echo "<h1>";
    echo $card->name;
echo "</h1>";
echo "<p>" . $card->originalText . "</p>";
?>