
<?php
/**
 * This is the cart content page which get loaded from the database
 */
require_once("sql_connect.php");


{
    $query = "SELECT * FROM `product` WHERE 1";
    if (isset($dbc)) {
        $result = @mysqli_query($dbc, $query);
    }
    //loop each row in the DB
    while ($row = mysqli_fetch_array($result)) {

        echo "
             <li class=\"items\">

                <div class=\"infoWrap\">
                    <div class='cartSection '>  
                          <div  data-balloon-length='fit' aria-label='{$row['description']}' data-balloon-pos='up'> 
                <img class='itemPhoto'   src={$row['picture']} alt='No Image available'>                        
                </div>
                        <h3>{$row["name"]}</h3>

                        <p> <input onchange='totalPrice({$row['id']})' type=\"text\" id='{$row['id']}'  class=\"qty\" value=\"0\"/> x  </p>
                        <p id='price{$row['id']}'> {$row['price']} $</p> 

                        <p class=\"stockStatus\"> In Stock</p>
                    </div>

                    <div id='{x}'>
                    <div id ='id' class=\"prodTotal cartSection\">
                        <p class='itemTotal' id='totalPrice{$row['id']}' >0$</p>
                    </div>
                  </div>
                    <div>
                        <div style=\"text-align: center\">
                            <a href='process.php?delete={$row['id']}' data-toggle='modal' data-target='#deleteModal{$row['id']}' \" class=\"btn btn-white button \">Delete</a>
                                 <div class=\"modal fade\" id='deleteModal{$row['id']}' role=\"dialog\">
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
                        
                        <div style=\"text-align: center\">
                            <a href='index.php?update={$row['id']}' data-toggle='modal' data-target='#myModal{$row['id']} ' class=\"btn btn-white button \">Update</a>
                            <div class=\"modal fade\" id=\"myModal{$row['id']}\" role=\"dialog\">
<div class='modal-dialog justify-content-md-center' >

    <div class='modal-content' >
        <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
            <h4 class=\"modal-title\">Update Values</h4>
        </div>
        <div class=\"modal-body\">
       <p><br>Please insert the following info in order<br>to update the info in the database</p>
                                <form method='POST' action='process.php' >
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
                                    <input type=\"submit\"name='update' value=\"Update\" class=\"btn btn-success\" />
                                </form>
        </div> <!--Modal Body-->
        <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-default
            \" data-dismiss=\"modal\">Close</button>
        </div><!--Modal header-->
    </div><!--Modal content-->
</div><!--Modal dialog-->
</div>
</div>
</li>
          
            ";

    }
}