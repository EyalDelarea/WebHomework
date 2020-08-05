<?php

require_once 'process.php';
//require ('sql_connect.php');


?>


<div class="wrap cf">
    <br><Br>
    <div class="heading cf">
        <p>Filter:</p>
        <label for="search_text"></label><input type="text" id="search_text" placeholder="Search Products">
        <?php
        if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <?php echo $_SESSION['message']; ?>
            </div>
        <?php endif; ?>
        <?php unset($_SESSION['message']); ?>
    </div>

    <div id="cart" class="cart">
        <ul class="cartWrap">


            <?php
            {
                $query = "SELECT * FROM `product` WHERE 1";
                if (isset($dbc)) {
                    $result = @mysqli_query($dbc, $query);
                }
                //counter
                $x = 0;
                //loop each row in the DB
                while ($row = mysqli_fetch_array($result)) {

                    echo "
             <li class=\"items odd\">

                <div class=\"infoWrap\">
                    <div class=\"cartSection\">             
                <img class='itemPhoto'  src={$row['picture']} alt='No Image avialable'>
               
                        
                        <h3 >{$row["name"]}</h3>

                        <p> <input onchange='totalPrice({$x})' type=\"text\" id='{$x}'  class=\"qty\" value=\"0\"/> x  </p>
                        <p id='price{$x}'> {$row['price']} $</p> 

                        <p class=\"stockStatus\"> In Stock</p>
                    </div>

                    <div id='{x}'>
                    <div id ='id' class=\"prodTotal cartSection\">
                        <p class='itemTotal' id='totalPrice{$x}' >0$</p>
                    </div>
                  </div>
                    <div>
                        <div style=\"text-align: center\">
                            <a href='process.php?delete={$row['id']}' data-toggle='modal' data-target='#deleteModal{$x}' \" class=\"btn btn-white button \">Delete</a>
                                 <div class=\"modal fade\" id='deleteModal{$x}' role=\"dialog\">
                    <div class=\"modal-dialog\">
                        <!-- Modal content-->
                        <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                <h4 class=\"modal-title\">Delete item</h4>
                            </div>
                            <div class=\"modal-body\">
                                <p>Are you sure you want to delete?<br> This action cannot be restored </p>
                                    <a href='process.php?delete={$row['id']}' class=\"btn btn-default
            \">YES</a >
                            </div>
                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
                        <div style=\"text-align: center\">
                        
                            <a href='index.php?update={$row['id']}' data-toggle='modal' data-target='#myModal{$x}' class=\"btn btn-white button \">Update</a>
                            <div class=\"modal fade\" id=\"myModal{$x}\" role=\"dialog\">
<div class='modal-dialog justify-content-md-center' >

    <div class='modal-content' >
        <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
            <h4 class=\"modal-title\">Update Values</h4>
        </div>
        <div class=\"modal-body\">
       <p><br>Please insert the following info in order<br>to update the info in the database</p>
                                <form method=\"POST\" action='index.php' >
                                    <label>Enter item Name</label>
                                   <input type=\"text\" name='name'  class=\"form-control\" value='{$row['name']}' />
                                    <br />
                                    <label>Enter Item Description</label>
                                    <textarea name='description'  class=\"form-control\"'>{$row['description']}</textarea>
                                    <br />
                                    <label>Enter price</label>
                                    <input type=\"number\" name='price' value='{$row['price']}'> $
                                    <br />
                                    <label>Enter PhotoURL</label>
                                    <input type=\"text\" name='photoURL' value='{$row['picture']}' class=\"form-control\" />
                                    <br />

                                    <input type=\"hidden\" name=\"id\" value='{$row['id']}'  />
                                    <input type=\"submit\" name='update' value=\"Update\" class=\"btn btn-success\" />
                                </form>
        </div>
        <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-default
            \" data-dismiss=\"modal\">Close</button>
        </div>
    </div>
</div>
</div>
</div>
</li>
            
            ";
                    $x++;
                }
            }


            ?>


            <!--<li class="items even">Item 2</li>-->

        </ul>
    </div>


    <div>
        <div class="subtotal">
            <ul>
                <li class="totalRow">
                    <button class="btn btn-dark button" id="refresh"
                    ">Refresh</button>
                </li>
                <li class="totalRow">
                    <button class="btn btn-dark button" data-toggle='modal' data-target='#CreateItemModal'>Create New
                        Item
                    </button>
                    <div class="modal fade" id="CreateItemModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Create Item</h4>

                                </div>
                                <div class="modal-body">
                                    <p><br>Please insert the following info in order<br>to insert a new item to the
                                        database
                                    </p>

                                    <form method="POST" action="process.php"
                                    ">
                                    <label>Enter item Name</label>
                                    <input type="text" name="name" id="name" class="form-control"/>
                                    <br/>
                                    <label>Enter Item Description</label>
                                    <textarea name="description" id="address" class="form-control"></textarea>
                                    <br/>
                                    <label>Enter price</label>
                                    <input type="number" name="price" value="0">
                                    <br/>
                                    <label>Enter PhotoURL</label>
                                    <input type="text" name="photoURL" id="URL" class="form-control"/>
                                    <br/>
                                    <input type="submit" name="create" id="create" value="Create"
                                           class="btn btn-success"/>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default\
                             " data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>

        </li>
        </ul>
    </div>

    <div class="subtotal">
        <ul>
            <li class="totalRow"><span class="label">Subtotal</span><span class="value" id="subTotal">$35.00</span></li>

            <li class="totalRow"><span class="label">Shipping</span><span class="value" id="shippingTotal">5.00$</span>
            </li>

            <li id="totalFinal" class="totalRow final"><span class="label">Total</span><span class="value"
                                                                                             id="finishTotal">$40.00</span>
            </li>
            <li class="totalRow">
                <button class="btn btn-dark button" id="checkOutButton">Checkout</button>
            </li>
        </ul>
    </div>
</div>





