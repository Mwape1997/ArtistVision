/*
Deprecated
Authors: Mwape
*/

console.log("STEINI!!!!");
var removeFromCart = document.getElementsByClassName('btn-xs');
var disabledButton = document.getElementsByClassName('btn-dark'); //disable clicking button


for (var i = 0; i< removeFromCart.length; i++){
var butt = removeFromCart[i];
butt.addEventListener('click',function(event){
console.log("removed from cart");
    var buttClicked = event.target;
    buttClicked.parentElement.parentElement.parentElement.remove();
    TotalSync();
})
}

function TotalSync(){

    var cartContainer = document.getElementsByClassName('card-body')[0];
    var cartRows = cartContainer.getElementsByClassName('cart-row')

    console.log('CALLLED');
    for (var i = 0; i <cartRows.length; i++){
        var cartRow = cartRows[i];
        var priceE = cartRow.getElementsByClassName('text-md-right')[0];

        var price = parseFloat(priceE.innerText.replace('$', ''))

        console.log(price)
    }

}
