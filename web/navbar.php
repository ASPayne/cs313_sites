<link rel="stylesheet" type="text/css" href="style/main.css">
<?PHP
$current_file = basename($_SERVER['PHP_SELF']);

$NavBarActive = array("Home" => " ",
"About" => " ",
"Pages" => " ",
"login" => " ", 
"CardView" => " ", 
"DeckView" => " ");

switch ($current_file) {
    case "home.php":
    case "index.php";
        $NavBarActive["Home"] = " active";
        break;
    case "about-us.php":
        $NavBarActive["About"] = " active";
        break;
    case "login.php":
        $NavBarActive["Login"] = " active";
        break;
    case "pages.php":
        $NavBarActive["Pages"] = " active";
        break;
    case "cardview.php":
        $NavBarActive["CardView"] = " active";
        break;
    case "deckview.php":
        $NavBarActive["DeckView"] = " active";
        break;
    default:
        $NavBarActive = array("Home" => " ",
        "About" => " ",
        "Pages" => " ",
        "login" => " ", 
        "CardView" => " ", 
        "DeckView" => " ");
}
?>

<ul class="navbar">
    <li class="navitem<?PHP echo($NavBarActive["Home"]);  ?> ">
        <a href="/home.php">Home</a></li>
    <li class="navitem<?PHP echo $NavBarActive["About"];  ?> ">
        <a href="/about-us.php">About Us</a></li>
    <li class="navitem<?PHP echo $NavBarActive["CardView"]; ?> ">
        <a href="/MTGinterface/cardview.php">Card Viewer</a></li>
    <li class="navitem<?PHP echo $NavBarActive["DeckView"]; ?> ">
        <a href="/MTGinterface/deckview.php">Deck Viewer</a></li>
    <li class="navitem<?PHP echo $NavBarActive["Pages"]; ?> ">
        <a href="/pages.php">Pages</a></li>
    <li  class="navitem login<?PHP echo $NavBarActive["Login"]; ?>">
        <a href="/login.php">Login</a></li>
</ul>