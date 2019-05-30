<?PHP session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../style/main.css">
    <link rel="stylesheet" type="text/css" href="store.css">
    <title>Item Viewer</title>
</head>

<!-- http://www.test.com/index.htm?name1=value1&name2=value2 -->

<body>
    <?php
    include '../header.php';
    include 'store_contents.php';
    $itemViewId = $_GET['item'];
    ?>

    <div class="item_view_box">

        <?PHP
        echo "<h1>", $Store_Items[$itemViewId]['item_name'], "</h1>";
        echo "<img src='", $Store_Items[$itemViewId]['image_location'], "'>";
        echo "<p>", $Store_Items[$itemViewId]['short_item_discription'], "</p>";
        echo "<p>", $Store_Items[$itemViewId]['item_discription'], "</p>";
        echo "cost: $", $Store_Items[$itemViewId]['price'];
        ?>

        <br>
        <br>
        <br>
        <div class="action_links">
            <a href="week03_Store.php">back to store</a>
            <a href="addtocart.php">add to cart</a>
            <a href="checkout.php">checkout</a>
        </div>
        <form action="/action_page.php"  method="get">
  <button type="submit">Submit</button>
  <button type="submit" formmethod="post">Submit using POST</button>
</form> 
    </div>
    <?PHP
    include '../footer.php';
    ?>
</body>

</html>