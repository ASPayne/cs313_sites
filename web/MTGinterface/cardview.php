
<?PHP
session_start();
include 'cardquery.php';
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
?>

<body>
<div class="cardview">    
<img src="<?PHP echo $card['imageUrl'];?>" alt="<?PHP echo $card['name'];?>" style="float:left;margin-right:15px;">
<h1> <?PHP echo $card['name'];?> </h1>
<br/>
<p> <?PHP echo $card['text'];?> </p>
<br/><br/><br/><br/>

<br>
<form class="form" action="addCardToDeck.php" method="POST">

<input type="button" name="action" value="add to deck2">

</form>

</div>


</body>

<?PHP
include '../footer.php';
?>

</html>