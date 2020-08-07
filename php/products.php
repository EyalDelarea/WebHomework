<?php
require_once 'process.php';
require_once ("sql_connect.php");
?>

<div class="wrap cf">
    <br><Br>
    <div class="heading cf">
        <p>Filter:</p>
        <label for="search_text"></label><input type="text" id="search_text" placeholder="Search Products">
        <?php
        //adds label messages (failure \ success
        if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <?php echo
                $_SESSION['message'];
                ?>
            </div>
        <?php endif; ?>
        <?php unset($_SESSION['message']); ?>
    </div>

    <div id="cart" class="cart">
        <ul class="cartWrap" id="cartContent">
            <?php
                include("./cart.php");
            ?>
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
                <button class="btn btn-dark button" onclick="checkoutEffect()" id="checkOutButton">Checkout</button>
            </li>
        </ul>
    </div>
</div>





