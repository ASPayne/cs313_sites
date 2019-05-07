<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../../style/main.css">
    <title>Document</title>
</head>
<body>

<?PHP
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$NAME = $_POST["Name"];
$EMAIL = $_POST["Email"];
$MAJOR = $_POST["Major"];
$COMMENT = $_POST["Comments"];

//$VISITED  = $_POST["Visited"];

}

include '../../header.php';
?>


<form method="post" action="<?PHP htmlspecialchars($_SERVER["PHP_SELF"]); ?>" > 

<input type="text" placeholder="Name" name="Name">
<br>
<input tyoe="text" placeholder="Email" name="Email">
<br>

<input type="radio" value="CS"  name="Major"> Computer Science
<input type="radio" value="WDD" name="Major"> Web Design and Development
<input type="radio" value="CIT" name="Major"> Computer Information Technology
<input type="radio" value="CE"  name="Major"> Computer Engineering

<br>
<textarea name="Comments" rows="5" cols="40" placeholder="Enter Comments Here"></textarea>
<button type="submit" name="Submit" value="Submit">Submit</button>
</form>
<br>

<p>
NAME = <?PHP echo $NAME ?> <br>
EMAIL = <?PHP echo $EMAIL ?> <br>
MAJOR = <?PHP echo $MAJOR ?>  <br>
COMMENT = <?PHP echo $COMMENT ?> <br>
<br>
<!-- visited = <?PHP //echo $VISITED ?> -->
</p>


</body>
</html>