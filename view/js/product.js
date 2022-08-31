
document.querySelectorAll('.product-button-cart').forEach(button => button.addEventListener('click', displayAddCartMessage))


function displayAddCartMessage() {
    
    console.log('log from products page');

    let tl = gsap.timeline({defaults: {ease: "power4.inOut", duration: 2}});


    tl.to('.add-cart-message', {

        x: -40,
        opacity: 1,
        duration: 1

    }, "+= 0.8").to('.add-cart-message', {
  
        x: 100,
        opacity: 0,
        duration: 1
    })
}