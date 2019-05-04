<link rel="stylesheet" type="text/css" href="style/main.css">
<?PHP
$current_file = basename($_SERVER['PHP_SELF']);

$NavBarActive = array("Home" => " ", "About" => " ", "Pages" => " ", "login" => " ");
/*echo "Peter is " . $age['Peter'] . " years old.";*/

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
    default:
        $NavBarActive = array("Home" => " ", "About" => " ", "Pages" => " ", "login" => " ");
}
?>

<ul class="navbar" style="top: 0px; position: relative;">
    <li class="navitem<?PHP echo $NavBarActive[" Home"]; /*if ($home_active) {echo " active" ;}*/ ?>">
        <a href="/home.php">Home</a></li>
    <li class="navitem<?PHP echo $NavBarActive[" About"]; /*if ($about_active) { echo " active" ;}*/ ?>">
        <a href="/about-us.php">About Us</a></li>
    <li class="navitem<?PHP echo $NavBarActive[" Pages"]; /*if ($login_active) {echo " active" ;}*/ ?>">
        <a href="/pages.php">Pages</a></li>
    <li style="float:right; background-color:teal" class="navitem<?PHP echo $NavBarActive[" Login"]; /*if ($login_active) {echo " active" ;}*/ ?>">
        <a href="/login.php">Login</a></li>
</ul>