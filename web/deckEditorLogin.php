<?PHP
// Start the session
session_start();

if (isset($_SESSION['userid'])) {
    header('Refresh: 0; URL = deckedit_view.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<?PHP
include 'header.php';
?>

<body>

    <h3>Who are you?</h3>
    <?PHP echo $_SESSION['userid']; ?>
    <form method="POST" action="validateCredentials.php">
        <select name="userid">
            <?PHP
            try {
                include 'databaseconnect.php';
                foreach ($db->query('SELECT id, display_name FROM public.user') as $row) {
                    echo '<option value="' . $row['id'] . '">' . $row['display_name'] . '</option>';
                }
            } catch (Exception $ex) {
                echo "Error with DB. Details: $ex";
                die();
            }
            ?>
        </select>

        <button type="submit" value="Submit">EDIT MY DECK!</button>
    </Form>
</body>
<?PHP
include 'footer.php';
?>

</html>

<?php
?>