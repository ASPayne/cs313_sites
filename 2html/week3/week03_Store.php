<?PHP session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../../style/main.css">
    <link rel="stylesheet" type="text/css" href="store.css">
    <title>Store</title>
</head>

<body>
    <?php
    include '../header.php';
    include 'store_contents.php';
    ?>
    <main>
    <br>
    <h3 style="color:gray; margin:auto;">Welcome to the</h3>
    <h1 style="color:brown; margin:auto; font-size:300%;">MAGIC SHOPPE</h1>
    </header>
    <hr>
    <br>

    <!--Table on page-->

    <h2 style="text-align:center">What magical items do you wish to purchase?</h2>
    <br>
    <table class="store_table">
        <tbody>
            <?PHP
            $arrlength = count($Store_Items);

            for ($item_count = 0; $item_count < $arrlength; $item_count++) {


                if ($item_count & 1) {
                    echo "<tr>";
                } else {
                    echo  "<tr style='background-color:lightgray'>";
                }

                //echo "<td>", "<input type='checkbox' name='items[]' id='magic_items' value=0 onchange='total_cost()'></td>";
                echo "<td><img src='", $Store_Items[$item_count]['image_location'], "'></td>";
                echo "<td><h1>", $Store_Items[$item_count]['item_name'], "</h1>";
                echo "<p>", $Store_Items[$item_count]['short_item_discription'], "</p>";
                echo "cost: $", $Store_Items[$item_count]['price'], "<br>";
                echo "<a href='itemView.php?item=", $item_count, "'>click here for more info</a>";

                echo "</td></tr>";
            }
            ?>
        </tbody>
        <br>


    </table>

    <div class="action_links">
        <a href="checkout.php">checkout</a>
    </div>
        </main>
    <!--
    <div>
        <a href="#" style="buffer:10px;">
            <div style="width: 200px; height:200px; background-color:Yellow; display:block; float:left; position:relative;">
            </div>
        </a>
        <a href="#" style="buffer:10px;">
            <div style="width: 200px; margin:6px; padding:4px; height:200px; background-color:Blue; display:block; float:left; position:relative;">
            </div>
        </a>
        <a id="test" class="testItem" href="#">
										<div class="product-box">
											<div class="product-image">
												<img id="ctl00_cpContent_rpProducts_ctl00_rpProductsContent_ctl05_imgProduct" class="img-responsive" onerror="this.src = 'https://elmsprodcdnendpoint.azureedge.net/images/placeholder_sm.png'" src="https://elmsprodcdnendpoint.azureedge.net/attachments/9/cefa5ce4-6178-45b4-881b-0ec576825d61/f85b56f5-fb85-4314-a516-60220350a1df.jpg?t=636909402655970000" alt="IBM® SPSS® Statistics 26 GradPacks - Small product image" style="border-width:0px;">
											</div>
											<div class="product-name">
												<bdi><span id="ctl00_cpContent_rpProducts_ctl00_rpProductsContent_ctl05_lblProduct">IBM® SPSS® Statistics 26 GradPacks</span></bdi>
												<div class="as-low-as">
													<span id="ctl00_cpContent_rpProducts_ctl00_rpProductsContent_ctl05_lblAsLowAs"></span>
												</div>
											</div>
										</div>
									</a>
    </div>
            -->

    <?php
    include '../footer.php';
    ?>
</body>

</html>