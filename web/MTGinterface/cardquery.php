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
else{
    $cardIdNum = 433014;
    $card = find(433014);
    $_SESSION['card']=$card;
}
?>