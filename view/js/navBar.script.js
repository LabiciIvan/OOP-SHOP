
document.querySelector('.fa-solid.fa-bars').addEventListener('click', expandMenu);
document.querySelector('.fa-solid.fa-xmark').addEventListener('click', closeMenu);


function expandMenu() {
    document.querySelectorAll('.products_ordered').forEach(element =>  {
        element.style.display = 'none';
    })
    document.querySelectorAll('.fa-solid.fa-box-open').forEach(element =>  {
        element.style.color = 'rgb(101, 61, 138)';
    })

    let navbar = document.querySelector('.navbar');
        navbar.style.height = '30vh';

    let mobileLinks = document.querySelector('.navbar-items-mobile');
        mobileLinks.style.display = 'flex';

    let mobileHamburgerIcon = document.querySelector('.fa-solid.fa-bars');
        mobileHamburgerIcon.style.display = 'none';    
}

function closeMenu() {
    let mobileLinks = document.querySelector('.navbar-items-mobile');
        mobileLinks.style.display = 'none';

    let mobileHamburgerIcon = document.querySelector('.fa-solid.fa-bars');
        mobileHamburgerIcon.style.display = 'flex';  

    let navbar = document.querySelector('.navbar');
        navbar.style.height = '7vh';
}