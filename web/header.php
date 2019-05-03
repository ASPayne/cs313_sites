<link rel="stylesheet" type="text/css" href="style/main.css">
<?PHP
$current_file = basename($_SERVER['PHP_SELF']);

$NavBarActive = array("Home"=>"", "About"=>"", "login"=>"");
/*echo "Peter is " . $age['Peter'] . " years old.";*/
 
switch ($current_file) {
    case "home.php":
        $NavBarActive["Home"] = " active";
        //$home_active = true;
        break;
    case "about-us.php":
    $NavBarActive["About"] = " active";
        //$about_active = true;
        break;
    case "login.php":
    $NavBarActive["Login"] = " active";
        //$login_active = true;
        break;
    default:
    $NavBarActive = array("Home"=>"", "About"=>"", "login"=>"");
        //$home_active = false;
        //$about_active = false;
        //$login_active = false;
}

//<ul class="navbar" style="top: 0px; position: relative;">
//    <li class="navitem<?PHP echo $NavBarActive["Home"] /*if ($home_active) {echo " active";}*/ ">
//        <a href="/home.php">Home</a></li>
//    <li class="navitem<?PHP echo $NavBarActive["About"]/*if ($about_active) { echo " active";}*/ ">
//        <a href="/about-us.php">About Us</a></li>
//    <li class="navitem<?PHP echo $NavBarActive["Login"]/*if ($login_active) {echo " active";}*/ ">
//        <a href="/login.php">login</a></li>
//</ul>
?>


<header>
    <?PHP include 'navbar.php'; ?>
    <div class=topbanner> 
        <bannerlogo style="color:mediumblue; font-family:'Times New Roman', Times, serif; font-size:60px; display:block;">Think.</bannerlogo>
        <p style="float:right; letter-spacing:2px; display:block;">A COMPANY TO THINK ABOUT</p>
    </div>

</header>