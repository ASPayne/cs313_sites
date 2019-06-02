<?PHP
include 'databaseconnect.php';
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
      <?php
      // define variables and set to empty values
      $CardNameErr = $CardTypeErr = $genderErr = $websiteErr = "";
      $CardName = $CardType = $CustomActualProxy = $comment = $website = "";
      $MultiverseId = $CardText ="";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["CardName"])) {
          $CardNameErr = "CardName is required";
        } else {
          $CardName = test_input($_POST["CardName"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/", $CardName)) {
            $CardNameErr = "Only letters and white space allowed";
          }
        }

        if (empty($_POST["CardType"])) {
          $CardTypeErr = "CardType is required";
        } else {
          $CardType = test_input($_POST["CardType"]);
        }

        if (empty($_POST["CardText"])) {
          $CardText = "";
        } else {
          $CardText = test_input($_POST["CardText"]);
        }

        if (empty($_POST["MultiverseId"])) {
          $MultiverseId = "0";
        } else {
          $MultiverseId = test_input($_POST["MultiverseId"]);
        }

      }

      function test_input($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      ?>

      <p><span class="error">* required field</span></p>

      <form method="POST" action="manualInventoryInsert.php">
        CardName: <input type="text" name="CardName" value="<?php echo $CardName; ?>">
        <span class="error">* <?php echo $CardNameErr; ?></span>
        <br><br>
        CardType:
        <select name="CardType">
          <?PHP
          try
          {
          foreach ($db->query('SELECT id, card_types FROM card_types') as $row) {
            echo '<option value="' . $row['id'] . '">' . $row['card_types'] . '</option>';
          }
        } CATCH (Exception $ex)
        {
          echo "Error with DB. Details: $ex";
      	die();
        }
          ?>
        </select>
        <!--MultiverseId: <input type="text" name="MultiverseId" value="<?php echo $MultiverseId; ?>" style="width:50px">
        --><br><br>
        CardText: <textarea name="CardText" rows="5" cols="40"><?php echo $CardText; ?></textarea>
        <br><br>
         CustomActualProxy:
        <input type="radio" name="CustomActualProxy" <?php if (isset($CustomActualProxy) && $CustomActualProxy == "Actual") echo "checked"; ?> value="Actual">Actual
        <input type="radio" name="CustomActualProxy" <?php if (isset($CustomActualProxy) && $CustomActualProxy == "Custom") echo "checked"; ?> value="Custom">Custom
        <input type="radio" name="CustomActualProxy" <?php if (isset($CustomActualProxy) && $CustomActualProxy == "Proxy") echo "checked"; ?> value="Proxy">Proxy
        <span class="error">* <?php echo $CustomActualProxyErr; ?></span>
        <br><br>
        <button type="submit" value="Submit">insert</button>
      </form>

    <br />
    <hr><br />

<?PHP
include 'cardquery.php';
?>

    <img src="<?PHP echo $card['imageUrl']; ?>" alt="<?PHP echo $card['name']; ?>" style="float:left;margin-right:15px;">
    <h1>
      <?PHP echo $card['name']; ?>
    </h1>
    <br />
    <p>
      <?PHP echo $card['text']; ?>
    </p>
    <br /><br />

    <p style="clear:both"></p>
<br>
    <?PHP


$stmt = $db->prepare('SELECT cardname, cardtype from customInventory');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table id='deckviewtable'>";

echo "<tr>";
echo "<th>CardName</th>";
echo "<th>CardType</th>";
echo "</tr>";
#foreach ($db->query('SELECT d.num_owned, cs.cardname, cs.manacost, cs.multiverseid from CardStorage cs join deck d on cs.id = d.card_num where d.deck_owner = 2') as $row)
foreach ($rows as $card) 
{
  echo "<tr>";
  echo "<td>" . $card['cardname'] . "</td>";
  echo "<td>" . $card['cardtype'] . "</td>";
  echo "</a>";
  echo "</tr>";
}
 echo "</table>";

?>


    <br /><br />
    <br>
  </div>
</body>

<?PHP
include '../footer.php';
?>

</html>