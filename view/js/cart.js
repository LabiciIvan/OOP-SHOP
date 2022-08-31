
window.onload = checkCartItem();


document.querySelectorAll('.product-button-cart').forEach(buy => buy.addEventListener('click', queryDataBaseForProducts));
document.querySelector('.detail-button').addEventListener('click', queryDataBaseForProducts);


function queryDataBaseForProducts(index) {

    // console.log('work;');
    let productId = index.target.value;
    
    
    
    // AJAX REQUEST TO DELETE AN IMAGE
    xhr = new XMLHttpRequest();
    
    xhr.open("GET", `../includes/cart.handler.php?addButton=${productId}`, true);
    
    xhr.onload  = function() {
        
        
        if(this.status == 200) {
            
            cart = this.responseText;
          
            cartChecker(cart);

        } else {
            
            console.log("REQUEST FAILED");
        }
    }

    xhr.send();
}

function cartChecker(cart) {

    let element = document.getElementById('cartIcon');
    let element2 = document.getElementById('cartIcon2');


    itemsInCart = JSON.parse(cart);
    let cartPage = document.querySelector('.cart-page');
    // console.log(cartPage);


    
    // console.log(itemsInCart.length);
    let cartLength = itemsInCart.length;
    element.innerHTML = "&nbsp;" + cartLength;
    element2.innerHTML = "&nbsp;" + cartLength;
    
    if(cartPage != null) {
        
        displayCart(cart);
    }


}

function checkCartItem() {   

    // AJAX REQUEST TO DELETE AN IMAGE
    xhr = new XMLHttpRequest();

    xhr.open("GET", `../includes/cart.handler.php?cartItems`, true);
    
    xhr.onload  = function() {
        
        
        if(this.status == 200) {
            
            cart = this.responseText;

            // let cartItems = JSON.parse(cart);
          

            cartChecker(cart);

        } else {
            
            console.log("REQUEST FAILED");
        }
    }

    xhr.send();
}

function displayCart(cart) {
    let cartItems = JSON.parse(cart);

    let cartPage = document.querySelector('.cart-page');
    cartPage.innerHTML = '';

 
    if(cartItems.length === 0) {
        let emptyElement = `<div class='cart-page-empty'>
                                 <div class='cart-empty'> Your cart is empty!</div>
                            </div>`;

        cartPage.innerHTML = emptyElement;
        return;
    }
    for (let key in cartItems) {
    let productHTML = `<div class='cart-wrapper'>
                            <div class='cart-info'>
                                <a class='cart-info-1'href='./productDetails.php?productId=${cartItems[key]['id']}'>
                                    <img class='cart-image' src='./uploads/${cartItems[key]['thumb_nail']}' alt=''>
                                </a>
                                <div class='cart-info-2'>
                                    <h4 class='info'>${cartItems[key]['name']}</h4>
                                    <h4 class='info'>${cartItems[key]['price']} $ x ${cartItems[key]['quantity']} = ${cartItems[key]['totalProduct']} $</h4>
                                </div>
                            </div>
                            <div class='cart-quantity'>
                                <form class='cart-commands-form' action='' method='POST'>
                                    <button type='button' class='cart-commands-button-plus' name='increase-cart-button' value=${cartItems[key]['id']}  ><i class='fa-solid fa-plus'></i></button>
                                </form>
                                ${cartItems[key]['quantity']} 
                                <form class='cart-commands-form' action='' method='POST'>
                                    <button type='button' class='cart-commands-button-minus' name='decrease-cart-button' value=${cartItems[key]['id']} ><i class='fa-solid fa-minus'></i></button>
                                </form>
                            </div>
                            <div class='cart-commands'>
                                <form class='cart-commands-form' action='' method='POST'>
                                <button type='button' class='cart-commands-button-remove' name='remove-cart-button' value=${cartItems[key]['id']}  ><i class='fa-solid fa-trash'></i></button>
                                </form>
                                </div>
                                </div>`;

                                document.querySelector('.cart-page').innerHTML += productHTML;
                                
                            }

                            let checkoutDiv = document.createElement('div');
                            checkoutDiv.className = 'cart-checkout';

                            let checkoutButton = document.createElement('a');
                            checkoutButton.className = 'checkout-button';
                            checkoutButton.href = './checkout.php';
                            checkoutButton.innerHTML = 'Checkout';

                            checkoutDiv.append(checkoutButton);

                            document.querySelector('.cart-page').append(checkoutDiv);

                            
                            document.querySelectorAll('.cart-commands-button-minus').forEach(minus => minus.addEventListener('click', requestDecreaseQuantity))
                            document.querySelectorAll('.cart-commands-button-plus').forEach(plus => plus.addEventListener('click', requestIncreaseQuantity))
                            document.querySelectorAll('.cart-commands-button-remove').forEach(deleteIcon => deleteIcon.addEventListener('click', deleteProductFromCart))

}









function requestDecreaseQuantity(index) {
    
    // console.log('-');
    // console.log(index.target);
    
    let productId = index.target.closest('.cart-commands-button-minus').value;
    
    xhr = new XMLHttpRequest();
    
    xhr.open("GET", `../includes/cart.handler.php?cartDecrease=${productId}`, true);
    
    xhr.onload  = function() {
        
        
        if(this.status == 200) {
            
            // console.log(this.responseText);
            checkCartItem();
            
        } else {
            
            console.log("REQUEST FAILED");
        }
    }
    
    xhr.send();
    
    // console.log(productId);
    
}

function requestIncreaseQuantity(index) {
    
    let productId = index.target.closest('.cart-commands-button-plus').value;
    
    xhr = new XMLHttpRequest();
    
    xhr.open("GET", `../includes/cart.handler.php?cartIncrease=${productId}`, true);
    
    xhr.onload  = function() {
        
        
        if(this.status == 200) {

            checkCartItem();
            
        } else {
            
            console.log("REQUEST FAILED");
        }
    }
    
    xhr.send();

}


function deleteProductFromCart(index) {

    let productId = index.target.closest('.cart-commands-button-remove').value;

    
    
    xhr.open("GET", `../includes/cart.handler.php?cartRemove=${productId}`, true);
    
    xhr.onload  = function() {
        
        
        if(this.status == 200) {
            
            checkCartItem();

            
        } else {
            
            console.log("REQUEST FAILED");
        }
    }
    
    xhr.send();

}