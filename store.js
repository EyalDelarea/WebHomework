/**
 * 1.    Cart system:
 ○    Clicking on the "add to cart" button will add the item to the cart
 ○    If a user clicks on an item that is already in the cart - that item’s count should be increased (any item should not appear more than once in the list).
 ○    When clicking on the cart icon, a popup with the items ordered should be displayed.
 ○    In the bottom part of the popup will be:
 ■    The total price to pay
 ■    A place order button - start disabled and enabled when the cart is not empty.
 ○    (7 points bonus) - Add a remove option to the items in the cart. The quantity for the item should be decreased, and if it reaches 0, the item will be deleted from the cart. Also, it is possible to make the cart completely empty. The total price should always be updated upon removal of an item.
 2.    Implement the css hover pseudo class as js function for the table - when hovering over a table cell, the cell’s background color will change.
 3.    Goodbye message - when the mouse gets out of the window - pop up a message. (only once)

 */

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {


    document.getElementById("purchaseButton").addEventListener('click',sendForms);

}

function sendForms(){
    window.location.href = "http://localhost/webhomework/shoppingCart.php";
    document.getElementById('form0').submit();
    document.getElementById('form2').submit();
    document.getElementById('form3').submit();
    document.getElementById('form4').submit();
    document.getElementById('form5').submit();


}

function purchaseClicked() {
    alert('Thank you for your purchase')
    var cartItems = document.getElementsByClassName('cart')[0];
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild)
    }
    updateCartTotal()
}

function removeCartItem(event) {

    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}


/**
 *
 * @param event
 */
function addToCartClicked(event) {


    var button = event.target;
    var shopItem = button.parentElement;
    var shopImage = button.parentElement.parentElement.childNodes[1];
    var title = shopItem.getElementsByClassName('itemTitle')[0].innerText;
    var price = shopItem.getElementsByClassName('itemPrice')[0].innerText;
    var image = shopImage.getElementsByClassName("itemPhoto")[0].src;

    addItemToCart(title, price, image);
    updateCartTotal();
    window.alert("Your item has been added to your cart");


}

/**
 *
 * @param title
 * @param price
 * @param imageSrc
 */
function addItemToCart(title, price, imageSrc) {

    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart')[0];
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title');

    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == title) {

            var quantityElement = cartItemNames[i].parentElement.parentElement;
            var elemt = quantityElement.getElementsByClassName("cart-quantity-input")[0];
            var currentValue = elemt.value;
            var temp = parseFloat(currentValue);
            temp++;
            elemt.value = temp;
            updateCartTotal();
            return
        }
    }
    var cartRowContents = `
        <div class="cart-item cart-column">
            <img class="cart-item-image" src="${imageSrc}" width="100" height="100">
            <span class="cart-item-title">${title}</span>
        </div>
        <span class="cart-price cart-column">${price}</span>
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn removeButton" type="button">REMOVE</button>
        </div>`;
    cartRow.innerHTML = cartRowContents;
    cartItems.append(cartRow);
    cartRow.getElementsByClassName('removeButton')[0].addEventListener('click', removeCartItem);
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
    cartRow.addEventListener("mouseover", function () {
        cartRow.style.backgroundColor = "gray";

    })
    cartRow.addEventListener("mouseleave", function () {
        cartRow.style.backgroundColor = "white";

    })
}

/**
 *
 */
function updateCartTotal() {
//     var cartItemContainer = document.getElementsByClassName('cart')[0];
//     var cartRows = cartItemContainer.getElementsByClassName('cart-row');
//     var total = 0
//     for (var i = 0; i < cartRows.length; i++) {
//         var cartRow = cartRows[i]
//         var priceElement = cartRow.getElementsByClassName('cart-price')[0];
//         var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0];
//         var price = parseFloat(priceElement.innerText.replace('$', ''));
//         var quantity = quantityElement.value
//         total = total + (price * quantity)
//     }
//     total = Math.round(total * 100) / 100
//     document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total
// }
}