
document.querySelector('.fa-solid.fa-angles-down').addEventListener('click', animateWhatYouGet);

let reverse = false;


let tl = gsap.timeline({defaults: {ease: "power4.inOut", duration: 2}});

let tl2 = gsap.timeline({duration: 0.5, repeat: -1})

tl2.to('.fa-solid.fa-angles-down', {
    color: '#00c4ff',
    duration: 0.5,
    ease: "power1.out",
    y: 5
}, "-=0.3").to('.fa-solid.fa-angles-down', {
    color: '#eb92f5',
    duration: 0.5,
    ease: "power1.out",
    y: 0
}, "-=0.2")


let tl4 = gsap.timeline({duration: 1})

tl4.from('.map-content-title', {
    duration: 1,
    opacity: 0,
    y: -50
}).from('.map-instruction', {
    duration: 1,
    opacity: 0,
    x: 200
}, "-=0.8").from('.map-helper', {
    duration: 1,
    opacity: 0,
    x: -200
}, "-=0.8")


function animateWhatYouGet() {


    if(reverse === false) {
        reverse = true;
        tl.to('.animate-points-1', {

            'clip-path': 'polygon(0 0, 100% 0, 100% 100%, 0% 100%)',
            y: 100,
            opacity: 1,
            duration: 1
        }).to('.animate-points-2', {
        
            'clip-path': 'polygon(0 0, 100% 0, 100% 100%, 0% 100%)',
            y: 100,
            opacity: 1,
            duration: 1
        }, "-=0.5").to('.animate-points-3', {
        
            'clip-path': 'polygon(0 0, 100% 0, 100% 100%, 0% 100%)',
            y: 100,
            opacity: 1,
            duration: 1
        }, "-=0.5").to('.animate-points-4', {
        
            'clip-path': 'polygon(0 0, 100% 0, 100% 100%, 0% 100%)',
            y: 100,
            opacity: 1,
            duration: 1
        }, "-=0.5")

        console.log('animate first')

    } else {
        reverse = false;

        tl.to('.animate-points-1', {

            'clip-path': 'polygon(0 0, 100% 0, 100% 100%, 0% 100%)',
            y: -100,
            opacity: 0,
            duration: 1
        }).to('.animate-points-2', {
        
            'clip-path': 'polygon(0 0, 100% 0, 100% 100%, 0% 100%)',
            y: -100,
            opacity: 0,
            duration: 1
        }, "-=0.5").to('.animate-points-3', {
        
            'clip-path': 'polygon(0 0, 100% 0, 100% 100%, 0% 100%)',
            y: -100,
            opacity: 0,
            duration: 1
        }, "-=0.5").to('.animate-points-4', {
        
            'clip-path': 'polygon(0 0, 100% 0, 100% 100%, 0% 100%)',
            y: -100,
            opacity: 0,
            duration: 1
        }, "-=0.5")
        console.log('animate reverse')
    }


}



// tl.from('.animate-points', {

//     'clip-path': 'polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%)',
//     y: -100,
//     x: 30,
//     duration: 1
// })