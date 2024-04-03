/*let cardNumInput = document.querySelector('#cardNum');
  
cardNumInput.addEventListener('keyup', () => { 
    let cNumber = cardNumInput.value; 
    cNumber = cNumber.replace(/\s/g, ""); 
  
    if (Number(cNumber)) { 
        cNumber = cNumber.match(/.{1,4}/g); 
        cNumber = cNumber.join(" "); 
        cardNumInput.value = cNumber; 
    } 
})*/

function confirmPayment() {
    var Name = document.getElementById('name');
    var email = document.getElementById('email');
    var address = document.getElementById('address');
    var city = document.getElementById('city');
    var state = document.getElementById('state');
    var zip = document.getElementById('zip');
    var cardName = document.getElementById('cardName');
    var cardNumber = document.getElementById('cardNum');
    var month = document.getElementById('expMonth');
    var year = document.getElementById('expYear');
    var cvv = document.getElementById('cvv');

    if (Name.value === '' || email.value === '' || address.value === '' || city.value === '' || state.value === '' || zip.value === '' || cardName.value === '' || cardNumber.value === '' || month.value === '' || year.value === '' || cvv.value === '') {
        var fail = "Enter Valid Information";
        alert(fail);
    }
    else {
        var success = "Payment Successful";
        alert(success);
        window.close("checkout.php");
        window.open("Cart.php");


    }

}

function removeAll() {
    var cartItems = document.getElementById('cart-items')[0]
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild);
    }
}

function checkout_complete() {
    if (Name.value === '' || email.value === '' || address.value === '' || city.value === '' || state.value === '' || zip.value === '' || cardName.value === '' || cardNumber.value === '' || month.value === '' || year.value === '' || cvv.value === '') {
        var fail = "Enter Valid Information";
        alert(fail);
    }
    else {
        var success = "Payment Successful";
        alert(success);
        window.close("checkout.php");
        window.open("Cart.php");


    }
}