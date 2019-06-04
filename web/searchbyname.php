<?PHP
require '../vendor/autoload.php';
use mtgsdk\Card;

try{
    $cards = Card::where(['name' => $_GET['name']])->all();
/*foreach($cards as $card){
    echo "<br /> <br />";

        var_dump($card);
}*/
}catch (Exception $ex)
{
    echo "<br><br><b>Error with DB. Details:</b><br> $ex";
    die();
}

echo '<table id="cardlist">';
echo "<th>multiverseId</th>";
echo "<th>Card Set</th>";
echo "<th>Card Name</th>";
echo "<th>ManaCost</th>";
foreach ($cards as $card) {
    if (isset($card->multiverseid)){
    echo "<tr>";
    echo "<td>" . $card->multiverseid . "</td>";
    echo "<td>" . $card->set . "</td>";
    echo "<td>" . $card->name . "</td>";
    echo "<td>" . $card->manaCost . "</td>";
    echo "</tr>";
    }
}
echo "</table>";


//echo $card->name;
