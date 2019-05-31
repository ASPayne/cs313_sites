<?PHP
session_start();
$id = "";
$url = "";
function find($id)
{
    $resourceName = "cards";

    $GLOBALS['url'] = sprintf("%s/%s/%s", "https://api.magicthegathering.io/v1", $resourceName, $id);
    $response = fetch($GLOBALS['url'], substr($resourceName, 0, strlen($resourceName) - 1));

    return $response;
}

function findbyname($name)
{
    $resourceName = "cards";

    $GLOBALS['url'] = sprintf('%s/%s?name="%s"', "https://api.magicthegathering.io/v1", $resourceName, $name);
    $response = fetch($GLOBALS['url'], $resourceName);
echo $response;
    return $response;
}

function fetch($loc, $resourceName)
{
    $response = json_decode(file_get_contents($loc), true);

    return $response[$resourceName];
}

if (isset($_GET["id"])) {
    $cardIdNum = $_GET["id"];
    $card = find($cardIdNum);
    $_SESSION['card']=$card;
}
elseif(isset($_GET["name"])){
    $cardName = $_GET["name"];
    $cards = findbyname($cardName);
    if (sizeof($cards) > 1){
    $card = $cards[(sizeof($cards)-1)];
    }
    else {$card=$cards[0];}
    $_SESSION['card']=$card;
}
else{
    $cardIdNum = 433014;
    $card = find(433014);
    $_SESSION['card']=$card;
}
?>