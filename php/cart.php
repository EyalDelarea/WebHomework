<div class="row">
    <?php


    $counter = false;
    $totalPrice = 0;

    for ($i = 0; $i < 6; $i++) {


        $title = ($_POST['title' . $i]);
        $desc = ($_POST['description' . $i]);
        $price = ($_POST['price' . $i]);
        $photoURL = ($_POST['photoURL' . $i]);
        $quantity = ($_POST['quantity' . $i]);


        if ($quantity != 0) {
            $shortString = substr($price, 1, -1);
            $flatValue = (float)$shortString;
            $flatValue = $flatValue * $quantity;
            $totalPrice += $flatValue;


            $counter = true;

            echo "
<div class=\"col-lg-4 col-md-4 col-sm-12\">
<div class=\"item\">
    <div class=\"item_photo\">
        <img class=\"itemPhoto\"
             src=$photoURL\"></div>
    <div class=\"description\">
        <div class=\"itemTitle\"><p>{$title}</p></div>
        <div class=\"itemPrice\">{$price}</div>
      
        </div>
               <div class='cart-quantity'>Amount  : {$quantity}</div>
               
                     </div>
            </div>
      
        ";

            if ($i == 2) {
                echo "
                    </div>

                    <div class=\"row\">
                ";
            }

        }

        //end of loop
        //if cart is empty show message
    }
    if ($counter == false) {
        echo "
    <div class='container'
    <div class='row justify-content-center emptyText'\"><b>Cart is empty  good luck with your next heatburn</b>
    <img 
             src=\"https://media.istockphoto.com/photos/empty-shopping-cart-picture-id185307364\" ></div >
    </div>
    </div>
    ";
    }

    //show total price

    echo "
</div>



    <br><br><br><br><br>
   
    <div style='text-align: center'>
        <button id=\"checkout\" class=\" btn btn-dark button btn-purchase justify-content-center \">Check Out</button>
     <button  class=\" btn btn-dark button btn-purchase justify-content-center \">Total : {$totalPrice}$</button>
  </div>
  
    

    ";
    ?>





    <br><br><br><br><br><br><br><br><br><br><br><br>