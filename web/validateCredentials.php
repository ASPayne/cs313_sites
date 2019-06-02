<?PHP
session_start();
if (isset($_POST['userid'])){
    $_SESSION['userid'] = $_POST['userid'];
    header('Location: deckedit_view.php');
}
else{
    header('Refresh: 0; URL = deckEditorLogin.php');
}
