
let elements = document.querySelectorAll('.product-img.carousel').forEach(box => { box.addEventListener("click", test) });
// console.log(elements);

function test(index) {


    let elementImage = index.target;
    let imageSource = elementImage.getAttribute('src');

    document.querySelector('.product-image').innerHTML = "";
    
    let imageElement = document.createElement('img');

        imageElement.className = "product-img";
        imageElement.src = imageSource;

    document.querySelector('.product-image').append(imageElement);
}


document.querySelector('.detail-button').addEventListener('click', addCartMessage);





function addCartMessage() {

    console.log(window.innerWidth);
    let tl = gsap.timeline({defaults: {ease: "power4.inOut", duration: 2}});


    tl.to('.add-cart-message', {

        x: -100,
        opacity: 1,
        duration: 1
    }, "+= 0.8").to('.add-cart-message', {
        x: 100,
        opacity: 0,
        duration: 1,
    })
}

