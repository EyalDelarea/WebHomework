$SHIPPING_PRICE = 5;


$(document).ready(function () {

    //update total price when load
    updateSubTotal();


    /**
     * Reloads the products table from the database
     * #refresh - button ID
     * #load into div with ID #cartContent cart.php file
     */
    $('#refresh').on("click",function(){
        $("#cartContent").load("cart.php",function(){
            alert("Data has been refreshed from the database!");
        });

    })


    /**
     * Dynamic search function using ajax
     */
    $("#search_text").on("keyup", function () {
        let value = $(this).val();
        //update search result
        //each item is in cartWrap class which is li (unique item)
        $(".cartWrap li").each(function () {
            let id = $(this).find("h3").text();
            if (id.indexOf(value) !== 0 && id.toLowerCase()
                .indexOf(value.toLowerCase()) < 0) {
                $(this).hide();
            } else {
                $(this).show();
            }

        })
    })

});

/**
 * update subtotal price of an item on change of quantity value
 * @param id
 */
function totalPrice(id) {

    let update = document.getElementById("totalPrice" + id);
    let price = document.getElementById('price' + id).innerText;
    //trim to be 2 digits price
    price = price.slice(0, 2);
    let quantity = document.getElementById(id).value
    update.innerText = (price * quantity) + "$";


    updateSubTotal();


}

/**
 * update the subTotal values of the entire cart
 */
function updateSubTotal() {

    let sum = 0;
    let totalPriceToUpdate = document.getElementById("subTotal");
    let doneTotal = document.getElementById("finishTotal");

    //loop for each itemTotal
    $(".itemTotal").each(function () {
        //get price as string for each of itemTotal elements
        let text = this.innerText.substring(0, this.innerText.length - 1);
        let number = parseFloat(text);
        sum += number;
    })

    //update value
    totalPriceToUpdate.innerText = sum + " $";
    //shipping price is a const.
    doneTotal.innerText = (sum + $SHIPPING_PRICE) + " $";
}

/**
 * Only effect for checkout experience
 */
function checkoutEffect() {
    alert("Thank you for your purchase!");
    window.location.reload();

}


