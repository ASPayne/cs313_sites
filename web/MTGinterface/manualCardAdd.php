
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
    <title>ManualCardAdd</title>
</head>


<?PHP
include '../header.php';
?>

<body>

<div class="cardview">    

<form>


<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  CardName: <input type="text" name="CardName" value="<?php echo $CardName;?>">
  <span class="error">* <?php echo $CardNameErr;?></span>
  <br><br>
  CardType: <input type="text" name="CardType" value="<?php echo $CardType;?>">
  <span class="error">* <?php echo $CardTypeErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  MultiverseId: <input type="text" name="MultiverseId" value="<?php echo $MultiverseId;?>">
  (Optional)
  <br><br>
  CardText: <textarea name="CardText" rows="5" cols="40"><?php echo $CardText;?></textarea>
  <br><br>
  CustomActualProxy:
  <input type="radio" name="CustomActualProxy" <?php if (isset($CustomActualProxy) && $CustomActualProxy=="Actual") echo "checked";?> value="Actual">Male
  <input type="radio" name="CustomActualProxy" <?php if (isset($CustomActualProxy) && $CustomActualProxy=="Custom") echo "checked";?> value="Custom">Female
  <input type="radio" name="CustomActualProxy" <?php if (isset($CustomActualProxy) && $CustomActualProxy=="Proxy") echo "checked";?> value="Proxy">Other  
  <span class="error">* <?php echo $CustomActualProxyErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</form>

<br/><hr><br/>
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