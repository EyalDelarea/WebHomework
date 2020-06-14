<?php
include('itemsArray.php')
?>

<div id="store">
    <form id=\"form\" method='post' action='shoppingCart.php'>
    <div class="row">


            <?php
            for ($x = 0; $x < 6; $x++) {


                echo "
               
                <div class=\"col-lg-4 col-md-4 col-sm-12\">
            <div class=\"item\">
                <div class=\"item_photo\">
                    <img class=\"itemPhoto\"
                         src=\"{$shopItems[$x]["picture"]}\">

                </div>
                <div class=\"description\">
                    <div class=\"itemTitle\"><p>{$shopItems[$x]['name']}</p></div>
                    <div class=\"itemPrice\">{$shopItems[$x]['price']}$</div>
                    <div class=\"itemDescription\">{$shopItems[$x]['description']}
                    </div>

                      <input class='cart-quantity-input' name='quantity$x' type='text' value='0'>
                   <input type=\"hidden\" name=\"title$x\" value=\"' {$shopItems[$x]['name']} '\" />
                   <input type=\"hidden\" name=\"price$x\" value=\"'{$shopItems[$x]['price']}'\" />
                   <input type=\"hidden\" name=\"description$x\" value=\"' {$shopItems[$x]['description']} '\" />
                   <input type=\"hidden\" name=\"photoURL$x\" value=\"' {$shopItems[$x]['picture']} '\" />
                
                   
                </div>
            </div>
        </div>
        

            
            ";




                if ($x == 2) {
                    echo "
                    </div>

                    <div class=\"row\">
                ";
                }

            }
            ?>




    </div>
        <div class="row">
            <button id="purchaseButton" class=" btn btn-dark button btn-purchase justify-content-center ">Purchse Now </button>
        </div>

    </form>



</div>

</body>